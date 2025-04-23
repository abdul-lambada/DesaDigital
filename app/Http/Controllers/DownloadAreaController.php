<?php

namespace App\Http\Controllers;

use App\Models\DownloadArea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DownloadAreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view download')->only(['index', 'show']);
        $this->middleware('permission:create download')->only(['create', 'store']);
        $this->middleware('permission:edit download')->only(['edit', 'update']);
        $this->middleware('permission:delete download')->only('destroy');
    }

    public function index(Request $request)
    {
        try {
            $query = DownloadArea::query();

            // Filter by kategori if provided
            if ($request->has('kategori')) {
                $query->where('kategori', $request->kategori);
            }

            // Filter by status if provided
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            $downloads = $query->latest()->paginate(10);
            return view('download.index', compact('downloads'));
        } catch (\Exception $e) {
            Log::error('Error in DownloadAreaController@index: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data download.');
        }
    }

    public function create()
    {
        return view('download.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori' => 'required|string|max:50',
                'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:10240',
                'tags' => 'nullable|string',
            ]);

            DB::beginTransaction();

            $download = new DownloadArea($validated);
            $download->user_id = Auth::id();

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('downloads', 'public');
                $download->file_path = $path;
                $download->file_name = $file->getClientOriginalName();
                $download->file_size = $file->getSize();
                $download->file_type = $file->getClientMimeType();
            }

            $download->save();

            DB::commit();

            return redirect()->route('download.index')
                ->with('success', 'File berhasil ditambahkan ke area download.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in DownloadAreaController@store: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan file.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            $download = DownloadArea::with('user')->findOrFail($id);
            return view('download.show', compact('download'));
        } catch (\Exception $e) {
            Log::error('Error in DownloadAreaController@show: ' . $e->getMessage());
            return back()->with('error', 'File tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $download = DownloadArea::findOrFail($id);
            return view('download.edit', compact('download'));
        } catch (\Exception $e) {
            Log::error('Error in DownloadAreaController@edit: ' . $e->getMessage());
            return back()->with('error', 'File tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $download = DownloadArea::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori' => 'required|string|max:50',
                'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,zip,rar|max:10240',
                'tags' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);

            DB::beginTransaction();

            if ($request->hasFile('file')) {
                // Delete old file if exists
                if ($download->file_path) {
                    Storage::disk('public')->delete($download->file_path);
                }

                $file = $request->file('file');
                $path = $file->store('downloads', 'public');
                $validated['file_path'] = $path;
                $validated['file_name'] = $file->getClientOriginalName();
                $validated['file_size'] = $file->getSize();
                $validated['file_type'] = $file->getClientMimeType();
            }

            $download->update($validated);

            DB::commit();

            return redirect()->route('download.index')
                ->with('success', 'File berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in DownloadAreaController@update: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui file.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $download = DownloadArea::findOrFail($id);

            DB::beginTransaction();

            // Delete file if exists
            if ($download->file_path) {
                Storage::disk('public')->delete($download->file_path);
            }

            $download->delete();

            DB::commit();

            return redirect()->route('download.index')
                ->with('success', 'File berhasil dihapus dari area download.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in DownloadAreaController@destroy: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus file.');
        }
    }
} 