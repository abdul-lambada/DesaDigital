<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view wilayah')->only('index', 'show');
        $this->middleware('permission:create wilayah')->only('create', 'store');
        $this->middleware('permission:edit wilayah')->only('edit', 'update');
        $this->middleware('permission:delete wilayah')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wilayah = Wilayah::paginate(10);
        return view('wilayah.index', compact('wilayah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wilayah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_wilayah' => 'required|string|max:255',
            'jenis_wilayah' => 'required|string|max:255',
            'luas_wilayah' => 'required|numeric',
            'batas_utara' => 'required|string|max:255',
            'batas_selatan' => 'required|string|max:255',
            'batas_timur' => 'required|string|max:255',
            'batas_barat' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        try {
            Wilayah::create($request->all());

            return redirect()->route('wilayah.index')
                ->with('success', 'Data wilayah berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data wilayah.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wilayah $wilayah)
    {
        return view('wilayah.show', compact('wilayah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wilayah $wilayah)
    {
        return view('wilayah.edit', compact('wilayah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wilayah $wilayah)
    {
        $request->validate([
            'nama_wilayah' => 'required|string|max:255',
            'jenis_wilayah' => 'required|string|max:255',
            'luas_wilayah' => 'required|numeric',
            'batas_utara' => 'required|string|max:255',
            'batas_selatan' => 'required|string|max:255',
            'batas_timur' => 'required|string|max:255',
            'batas_barat' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        try {
            $wilayah->update($request->all());

            return redirect()->route('wilayah.index')
                ->with('success', 'Data wilayah berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data wilayah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wilayah $wilayah)
    {
        try {
            $wilayah->delete();

            return redirect()->route('wilayah.index')
                ->with('success', 'Data wilayah berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data wilayah.');
        }
    }
} 