<?php

namespace App\Http\Controllers;

use App\Models\LayananPublik;
use Illuminate\Http\Request;

class LayananPublikController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view layanan')->only('index', 'show');
        $this->middleware('permission:create layanan')->only('create', 'store');
        $this->middleware('permission:edit layanan')->only('edit', 'update');
        $this->middleware('permission:delete layanan')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = LayananPublik::paginate(10);
        return view('layanan.index', compact('layanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'biaya' => 'required|numeric',
            'estimasi_waktu' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'icon' => 'nullable|string|max:255',
        ]);

        try {
            LayananPublik::create($request->all());

            return redirect()->route('layanan.index')
                ->with('success', 'Data layanan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data layanan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(LayananPublik $layanan)
    {
        return view('layanan.show', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LayananPublik $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LayananPublik $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'persyaratan' => 'required|string',
            'biaya' => 'required|numeric',
            'estimasi_waktu' => 'required|string|max:255',
            'status' => 'required|in:aktif,nonaktif',
            'icon' => 'nullable|string|max:255',
        ]);

        try {
            $layanan->update($request->all());

            return redirect()->route('layanan.index')
                ->with('success', 'Data layanan berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data layanan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LayananPublik $layanan)
    {
        try {
            $layanan->delete();

            return redirect()->route('layanan.index')
                ->with('success', 'Data layanan berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data layanan.');
        }
    }
} 