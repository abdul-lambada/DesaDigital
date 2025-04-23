<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view desa')->only('index', 'show');
        $this->middleware('permission:create desa')->only('create', 'store');
        $this->middleware('permission:edit desa')->only('edit', 'update');
        $this->middleware('permission:delete desa')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desas = Desa::paginate(10);
        return view('desa.index', compact('desas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kode_desa' => 'required|string|max:10|unique:desa',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_kantor' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'geografis' => 'nullable|string',
            'demografis' => 'nullable|string'
        ]);

        $desa = Desa::create($validated);

        return redirect()->route('desa.show', $desa->id_desa)
            ->with('success', 'Data desa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Desa $desa)
    {
        return view('desa.show', compact('desa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Desa $desa)
    {
        return view('desa.edit', compact('desa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Desa $desa)
    {
        $validated = $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kode_desa' => 'required|string|max:10|unique:desa,kode_desa,' . $desa->id_desa . ',id_desa',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'website' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_kantor' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'visi' => 'nullable|string',
            'misi' => 'nullable|string',
            'sejarah' => 'nullable|string',
            'geografis' => 'nullable|string',
            'demografis' => 'nullable|string'
        ]);

        $desa->update($validated);

        return redirect()->route('desa.show', $desa->id_desa)
            ->with('success', 'Data desa berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        try {
            if (!$desa) {
                return redirect()->route('desa.index')
                    ->with('error', 'Data desa tidak ditemukan');
            }

            $desa->delete();
            return redirect()->route('desa.index')
                ->with('success', 'Data desa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('desa.index')
                ->with('error', 'Gagal menghapus data desa: ' . $e->getMessage());
        }
    }
}
