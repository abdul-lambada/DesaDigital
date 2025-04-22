<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view warga')->only(['index', 'show']);
        $this->middleware('permission:create warga')->only(['create', 'store']);
        $this->middleware('permission:edit warga')->only(['edit', 'update']);
        $this->middleware('permission:delete warga')->only('destroy');
    }

    public function index()
    {
        $warga = Warga::paginate(10);
        return view('warga.index', compact('warga'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:warga',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:20',
            'status_perkawinan' => 'required|string|max:20',
            'pekerjaan' => 'required|string|max:50',
            'kewarganegaraan' => 'required|string|max:3',
        ]);

        Warga::create($validated);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan');
    }

    public function show(Warga $warga)
    {
        return view('warga.show', compact('warga'));
    }

    public function edit(Warga $warga)
    {
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, Warga $warga)
    {
        $validated = $request->validate([
            'nik' => 'required|string|size:16|unique:warga,nik,' . $warga->id,
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string',
            'agama' => 'required|string|max:20',
            'status_perkawinan' => 'required|string|max:20',
            'pekerjaan' => 'required|string|max:50',
            'kewarganegaraan' => 'required|string|max:3',
        ]);

        $warga->update($validated);

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui');
    }

    public function destroy(Warga $warga)
    {
        $warga->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus');
    }
} 