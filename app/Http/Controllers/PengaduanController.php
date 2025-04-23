<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view pengaduan')->only('index', 'show');
        $this->middleware('permission:create pengaduan')->only('create', 'store');
        $this->middleware('permission:edit pengaduan')->only('edit', 'update');
        $this->middleware('permission:delete pengaduan')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::paginate(10);
        return view('pengaduan.index', compact('pengaduan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $pengaduan = new Pengaduan($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads/pengaduan'), $fotoName);
                $pengaduan->foto = 'uploads/pengaduan/' . $fotoName;
            }

            $pengaduan->save();

            return redirect()->route('pengaduan.index')
                ->with('success', 'Pengaduan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan pengaduan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('pengaduan.show', compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit', compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori' => 'required|string|max:255',
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $pengaduan->fill($request->except('foto'));
            
            if ($request->hasFile('foto')) {
                // Hapus foto lama jika ada
                if ($pengaduan->foto && file_exists(public_path($pengaduan->foto))) {
                    unlink(public_path($pengaduan->foto));
                }

                $foto = $request->file('foto');
                $fotoName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('uploads/pengaduan'), $fotoName);
                $pengaduan->foto = 'uploads/pengaduan/' . $fotoName;
            }

            $pengaduan->save();

            return redirect()->route('pengaduan.index')
                ->with('success', 'Pengaduan berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat memperbarui pengaduan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengaduan $pengaduan)
    {
        try {
            // Hapus foto jika ada
            if ($pengaduan->foto && file_exists(public_path($pengaduan->foto))) {
                unlink(public_path($pengaduan->foto));
            }

            $pengaduan->delete();

            return redirect()->route('pengaduan.index')
                ->with('success', 'Pengaduan berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat menghapus pengaduan.');
        }
    }
} 