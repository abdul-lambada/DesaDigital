<?php

namespace App\Http\Controllers;

use App\Models\Pemerintahan;
use Illuminate\Http\Request;

class PemerintahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view pemerintahan')->only('index', 'show');
        $this->middleware('permission:create pemerintahan')->only('create', 'store');
        $this->middleware('permission:edit pemerintahan')->only('edit', 'update');
        $this->middleware('permission:delete pemerintahan')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemerintahan = Pemerintahan::paginate(10);
        return view('pemerintahan.index', compact('pemerintahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemerintahan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
        ]);

        try {
            $pemerintahan = new Pemerintahan($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads/pemerintahan'), $fotoName);
                $pemerintahan->foto = 'uploads/pemerintahan/' . $fotoName;
            }

            $pemerintahan->save();

            return redirect()->route('pemerintahan.index')
                ->with('success', 'Data pemerintahan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data pemerintahan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemerintahan $pemerintahan)
    {
        return view('pemerintahan.show', compact('pemerintahan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemerintahan $pemerintahan)
    {
        return view('pemerintahan.edit', compact('pemerintahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemerintahan $pemerintahan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'nullable|string',
        ]);

        try {
            $pemerintahan->fill($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($pemerintahan->foto && file_exists(public_path($pemerintahan->foto))) {
                    unlink(public_path($pemerintahan->foto));
                }

                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads/pemerintahan'), $fotoName);
                $pemerintahan->foto = 'uploads/pemerintahan/' . $fotoName;
            }

            $pemerintahan->save();

            return redirect()->route('pemerintahan.index')
                ->with('success', 'Data pemerintahan berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data pemerintahan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemerintahan $pemerintahan)
    {
        try {
            // Hapus foto jika ada
            if ($pemerintahan->foto && file_exists(public_path($pemerintahan->foto))) {
                unlink(public_path($pemerintahan->foto));
            }

            $pemerintahan->delete();

            return redirect()->route('pemerintahan.index')
                ->with('success', 'Data pemerintahan berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data pemerintahan.');
        }
    }
} 