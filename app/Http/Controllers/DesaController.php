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
        $desa = Desa::first();
        return view('desa.index', compact('desa'));
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
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat_kantor' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telepon' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $desa = new Desa($request->except('logo'));
            
            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/desa'), $logoName);
                $desa->logo = 'uploads/desa/' . $logoName;
            }

            $desa->save();

            return redirect()->route('desa.index')
                ->with('success', 'Data desa berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan data desa.');
        }
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
        $request->validate([
            'nama_desa' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'provinsi' => 'required|string|max:255',
            'kode_pos' => 'required|string|max:10',
            'alamat_kantor' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'telepon' => 'required|string|max:20',
            'website' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $desa->fill($request->except('logo'));
            
            if ($request->hasFile('logo')) {
                // Hapus logo lama jika ada
                if ($desa->logo && file_exists(public_path($desa->logo))) {
                    unlink(public_path($desa->logo));
                }

                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('uploads/desa'), $logoName);
                $desa->logo = 'uploads/desa/' . $logoName;
            }

            $desa->save();

            return redirect()->route('desa.index')
                ->with('success', 'Data desa berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui data desa.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Desa $desa)
    {
        try {
            // Hapus logo jika ada
            if ($desa->logo && file_exists(public_path($desa->logo))) {
                unlink(public_path($desa->logo));
            }

            $desa->delete();

            return redirect()->route('desa.index')
                ->with('success', 'Data desa berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus data desa.');
        }
    }
} 