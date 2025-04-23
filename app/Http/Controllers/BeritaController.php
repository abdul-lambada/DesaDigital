<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view berita')->only(['index', 'show']);
        $this->middleware('permission:create berita')->only(['create', 'store']);
        $this->middleware('permission:edit berita')->only(['edit', 'update']);
        $this->middleware('permission:delete berita')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $query = Berita::query();

            // Filter by kategori if provided
            if ($request->has('kategori')) {
                $query->where('kategori', $request->kategori);
            }

            // Filter by status if provided
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            $beritas = $query->latest()->paginate(10);
            return view('berita.index', compact('beritas'));
        } catch (\Exception $e) {
            Log::error('Error in BeritaController@index: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data berita.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'kategori' => 'required|string|max:50',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'tags' => 'nullable|string',
            ]);

            DB::beginTransaction();

            $berita = new Berita($validated);
            $berita->slug = Str::slug($validated['judul']);
            $berita->user_id = Auth::id();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $path = $file->store('berita', 'public');
                $berita->gambar_path = $path;
            }

            $berita->save();

            DB::commit();

            return redirect()->route('berita.index')
                ->with('success', 'Berita berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in BeritaController@store: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan berita.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $berita = Berita::with('user')->findOrFail($id);
            return view('berita.show', compact('berita'));
        } catch (\Exception $e) {
            Log::error('Error in BeritaController@show: ' . $e->getMessage());
            return back()->with('error', 'Berita tidak ditemukan.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $berita = Berita::findOrFail($id);
            return view('berita.edit', compact('berita'));
        } catch (\Exception $e) {
            Log::error('Error in BeritaController@edit: ' . $e->getMessage());
            return back()->with('error', 'Berita tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $berita = Berita::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'isi' => 'required|string',
                'kategori' => 'required|string|max:50',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'tags' => 'nullable|string',
                'status' => 'required|in:draft,published',
            ]);

            DB::beginTransaction();

            if ($request->hasFile('gambar')) {
                // Delete old image if exists
                if ($berita->gambar_path) {
                    Storage::disk('public')->delete($berita->gambar_path);
                }

                $file = $request->file('gambar');
                $path = $file->store('berita', 'public');
                $validated['gambar_path'] = $path;
            }

            $validated['slug'] = Str::slug($validated['judul']);
            $berita->update($validated);

            DB::commit();

            return redirect()->route('berita.index')
                ->with('success', 'Berita berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in BeritaController@update: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui berita.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $berita = Berita::findOrFail($id);

            DB::beginTransaction();

            // Delete image if exists
            if ($berita->gambar_path) {
                Storage::disk('public')->delete($berita->gambar_path);
            }

            $berita->delete();

            DB::commit();

            return redirect()->route('berita.index')
                ->with('success', 'Berita berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in BeritaController@destroy: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus berita.');
        }
    }
} 