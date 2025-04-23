<?php

namespace App\Http\Controllers;

use App\Models\PotensiDesa;
use Illuminate\Http\Request;

class PotensiDesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view potensi')->only('index', 'show');
        $this->middleware('permission:create potensi')->only('create', 'store');
        $this->middleware('permission:edit potensi')->only('edit', 'update');
        $this->middleware('permission:delete potensi')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $potensi = PotensiDesa::paginate(10);
        return view('potensi.index', compact('potensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('potensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_potensi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        try {
            $potensi = new PotensiDesa($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads/potensi'), $fotoName);
                $potensi->foto = 'uploads/potensi/' . $fotoName;
            }

            $potensi->save();

            return redirect()->route('potensi.index')
                ->with('success', 'Data potensi desa berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data potensi desa.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(PotensiDesa $potensi)
    {
        return view('potensi.show', compact('potensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PotensiDesa $potensi)
    {
        return view('potensi.edit', compact('potensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PotensiDesa $potensi)
    {
        $request->validate([
            'nama_potensi' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        try {
            $potensi->fill($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($potensi->foto && file_exists(public_path($potensi->foto))) {
                    unlink(public_path($potensi->foto));
                }

                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads/potensi'), $fotoName);
                $potensi->foto = 'uploads/potensi/' . $fotoName;
            }

            $potensi->save();

            return redirect()->route('potensi.index')
                ->with('success', 'Data potensi desa berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data potensi desa.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PotensiDesa $potensi)
    {
        try {
            // Hapus foto jika ada
            if ($potensi->foto && file_exists(public_path($potensi->foto))) {
                unlink(public_path($potensi->foto));
            }

            $potensi->delete();

            return redirect()->route('potensi.index')
                ->with('success', 'Data potensi desa berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data potensi desa.');
        }
    }
} 