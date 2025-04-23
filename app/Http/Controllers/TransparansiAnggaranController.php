<?php

namespace App\Http\Controllers;

use App\Models\TransparansiAnggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TransparansiAnggaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view anggaran')->only(['index', 'show']);
        $this->middleware('permission:create anggaran')->only(['create', 'store']);
        $this->middleware('permission:edit anggaran')->only(['edit', 'update']);
        $this->middleware('permission:delete anggaran')->only('destroy');
    }

    public function index()
    {
        try {
            $anggarans = TransparansiAnggaran::latest()->paginate(10);
            return view('anggaran.index', compact('anggarans'));
        } catch (\Exception $e) {
            Log::error('Error in TransparansiAnggaranController@index: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data anggaran.');
        }
    }

    public function create()
    {
        return view('anggaran.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
                'jenis' => 'required|string|max:255',
                'nominal' => 'required|numeric|min:0',
                'deskripsi' => 'required|string',
                'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            ]);

            DB::beginTransaction();

            $anggaran = new TransparansiAnggaran($validated);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $path = $file->store('anggaran', 'public');
                $anggaran->file_path = $path;
            }

            $anggaran->save();

            DB::commit();

            return redirect()->route('anggaran.index')
                ->with('success', 'Data anggaran berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in TransparansiAnggaranController@store: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data anggaran.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            $anggaran = TransparansiAnggaran::findOrFail($id);
            return view('anggaran.show', compact('anggaran'));
        } catch (\Exception $e) {
            Log::error('Error in TransparansiAnggaranController@show: ' . $e->getMessage());
            return back()->with('error', 'Data anggaran tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $anggaran = TransparansiAnggaran::findOrFail($id);
            return view('anggaran.edit', compact('anggaran'));
        } catch (\Exception $e) {
            Log::error('Error in TransparansiAnggaranController@edit: ' . $e->getMessage());
            return back()->with('error', 'Data anggaran tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $anggaran = TransparansiAnggaran::findOrFail($id);

            $validated = $request->validate([
                'tahun' => 'required|integer|min:2000|max:' . (date('Y') + 1),
                'jenis' => 'required|string|max:255',
                'nominal' => 'required|numeric|min:0',
                'deskripsi' => 'required|string',
                'file' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            ]);

            DB::beginTransaction();

            if ($request->hasFile('file')) {
                // Delete old file if exists
                if ($anggaran->file_path) {
                    Storage::disk('public')->delete($anggaran->file_path);
                }

                $file = $request->file('file');
                $path = $file->store('anggaran', 'public');
                $validated['file_path'] = $path;
            }

            $anggaran->update($validated);

            DB::commit();

            return redirect()->route('anggaran.index')
                ->with('success', 'Data anggaran berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in TransparansiAnggaranController@update: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data anggaran.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $anggaran = TransparansiAnggaran::findOrFail($id);

            DB::beginTransaction();

            // Delete file if exists
            if ($anggaran->file_path) {
                Storage::disk('public')->delete($anggaran->file_path);
            }

            $anggaran->delete();

            DB::commit();

            return redirect()->route('anggaran.index')
                ->with('success', 'Data anggaran berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in TransparansiAnggaranController@destroy: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus data anggaran.');
        }
    }
} 