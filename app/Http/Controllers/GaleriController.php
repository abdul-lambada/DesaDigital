<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GaleriController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view galeri')->only(['index', 'show']);
        $this->middleware('permission:create galeri')->only(['create', 'store']);
        $this->middleware('permission:edit galeri')->only(['edit', 'update']);
        $this->middleware('permission:delete galeri')->only('destroy');
    }

    public function index(Request $request)
    {
        try {
            $query = Galeri::query();

            // Filter by kategori if provided
            if ($request->has('kategori')) {
                $query->where('kategori', $request->kategori);
            }

            // Filter by status if provided
            if ($request->has('status')) {
                $query->where('status', $request->status);
            }

            $galeris = $query->latest()->paginate(12);
            return view('galeri.index', compact('galeris'));
        } catch (\Exception $e) {
            Log::error('Error in GaleriController@index: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memuat data galeri.');
        }
    }

    public function create()
    {
        return view('galeri.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori' => 'required|string|max:50',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5120',
                'tags' => 'nullable|string',
            ]);

            DB::beginTransaction();

            $galeri = new Galeri($validated);
            $galeri->user_id = Auth::id();

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $path = $file->store('galeri', 'public');
                $galeri->gambar_path = $path;
            }

            $galeri->save();

            DB::commit();

            return redirect()->route('galeri.index')
                ->with('success', 'Foto berhasil ditambahkan ke galeri.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in GaleriController@store: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menyimpan foto.')
                ->withInput();
        }
    }

    public function show($id)
    {
        try {
            $galeri = Galeri::with('user')->findOrFail($id);
            return view('galeri.show', compact('galeri'));
        } catch (\Exception $e) {
            Log::error('Error in GaleriController@show: ' . $e->getMessage());
            return back()->with('error', 'Foto tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);
            return view('galeri.edit', compact('galeri'));
        } catch (\Exception $e) {
            Log::error('Error in GaleriController@edit: ' . $e->getMessage());
            return back()->with('error', 'Foto tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $galeri = Galeri::findOrFail($id);

            $validated = $request->validate([
                'judul' => 'required|string|max:255',
                'deskripsi' => 'required|string',
                'kategori' => 'required|string|max:50',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
                'tags' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);

            DB::beginTransaction();

            if ($request->hasFile('gambar')) {
                // Delete old image if exists
                if ($galeri->gambar_path) {
                    Storage::disk('public')->delete($galeri->gambar_path);
                }

                $file = $request->file('gambar');
                $path = $file->store('galeri', 'public');
                $validated['gambar_path'] = $path;
            }

            $galeri->update($validated);

            DB::commit();

            return redirect()->route('galeri.index')
                ->with('success', 'Foto berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in GaleriController@update: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat memperbarui foto.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $galeri = Galeri::findOrFail($id);

            DB::beginTransaction();

            // Delete image if exists
            if ($galeri->gambar_path) {
                Storage::disk('public')->delete($galeri->gambar_path);
            }

            $galeri->delete();

            DB::commit();

            return redirect()->route('galeri.index')
                ->with('success', 'Foto berhasil dihapus dari galeri.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error in GaleriController@destroy: ' . $e->getMessage());
            return back()->with('error', 'Terjadi kesalahan saat menghapus foto.');
        }
    }
} 