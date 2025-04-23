<?php

namespace App\Http\Controllers;

use App\Models\InteraksiWarga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InteraksiWargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view interaksi')->only(['index', 'show']);
        $this->middleware('permission:create interaksi')->only(['create', 'store']);
        $this->middleware('permission:edit interaksi')->only(['edit', 'update']);
        $this->middleware('permission:delete interaksi')->only('destroy');
    }

    public function index(Request $request)
    {
        try {
            $query = InteraksiWarga::query();

            // Filter by type if provided
            if ($request->has('type')) {
                $query->where('type', $request->type);
            }

            // Filter by status if provided
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            $interaksis = $query->latest()->paginate(10);
            return view('interaksi.index', compact('interaksis'));
        } catch (\Exception $e) {
            Log::error('Error in InteraksiWargaController@index: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data interaksi.');
        }
    }

    public function create()
    {
        return view('interaksi.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'type' => 'required|in:diskusi,komentar',
                'parent_id' => 'nullable|exists:interaksi_warga,id',
                'lampiran' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            ]);

            DB::beginTransaction();

            $interaksi = new InteraksiWarga($validated);
            $interaksi->user_id = Auth::id();
            $interaksi->status = 'pending';

            if ($request->hasFile('lampiran')) {
                $file = $request->file('lampiran');
                $path = $file->store('interaksi', 'public');
                $interaksi->lampiran_path = $path;
            }

            $interaksi->save();

            DB::commit();

            return redirect()->route('interaksi.index')
                ->with('success', 'Interaksi berhasil ditambahkan dan menunggu moderasi.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in InteraksiWargaController@store: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan interaksi.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            $interaksi = InteraksiWarga::with(['user', 'children'])->findOrFail($id);
            return view('interaksi.show', compact('interaksi'));
        } catch (\Exception $e) {
            Log::error('Error in InteraksiWargaController@show: ' . $e->getMessage());
            return back()->with('error', 'Interaksi tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $interaksi = InteraksiWarga::findOrFail($id);
            
            // Only allow editing own posts or if user is moderator
            if (!Auth::user()->hasRole('moderator') && $interaksi->user_id !== Auth::id()) {
                return back()->with('error', 'Anda tidak memiliki izin untuk mengedit interaksi ini.');
            }

            return view('interaksi.edit', compact('interaksi'));
        } catch (\Exception $e) {
            Log::error('Error in InteraksiWargaController@edit: ' . $e->getMessage());
            return back()->with('error', 'Interaksi tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $interaksi = InteraksiWarga::findOrFail($id);
            
            // Only allow editing own posts or if user is moderator
            if (!Auth::user()->hasRole('moderator') && $interaksi->user_id !== Auth::id()) {
                return back()->with('error', 'Anda tidak memiliki izin untuk mengedit interaksi ini.');
            }

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'type' => 'required|in:diskusi,komentar',
                'status' => 'required|in:pending,approved,rejected',
                'lampiran' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:5120',
            ]);

            DB::beginTransaction();

            if ($request->hasFile('lampiran')) {
                // Delete old file if exists
                if ($interaksi->lampiran_path) {
                    Storage::disk('public')->delete($interaksi->lampiran_path);
                }

                $file = $request->file('lampiran');
                $path = $file->store('interaksi', 'public');
                $validated['lampiran_path'] = $path;
            }

            $interaksi->update($validated);

            DB::commit();

            return redirect()->route('interaksi.index')
                ->with('success', 'Interaksi berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in InteraksiWargaController@update: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui interaksi.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $interaksi = InteraksiWarga::findOrFail($id);
            
            // Only allow deleting own posts or if user is moderator
            if (!Auth::user()->hasRole('moderator') && $interaksi->user_id !== Auth::id()) {
                return back()->with('error', 'Anda tidak memiliki izin untuk menghapus interaksi ini.');
            }

            DB::beginTransaction();

            // Delete file if exists
            if ($interaksi->lampiran_path) {
                Storage::disk('public')->delete($interaksi->lampiran_path);
            }

            $interaksi->delete();

            DB::commit();

            return redirect()->route('interaksi.index')
                ->with('success', 'Interaksi berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in InteraksiWargaController@destroy: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus interaksi.');
        }
    }
} 