<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;

class PenyakitController extends Controller
{
    // Tampilkan semua data penyakit
    public function index()
    {
        $penyakits = Penyakit::all();
        return view('admin.data-penyakit', compact('penyakits'));
    }

    // Simpan data baru atau update jika ada ID
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'deskripsi' => 'required|string',
            'pertolongan_pertama' => 'nullable|string',
            'saran_lanjut' => 'nullable|string',
        ]);

        if ($request->has('id')) {
            // Proses Edit
            $penyakit = Penyakit::findOrFail($request->id);
            $penyakit->update($validated);
            $pesan = 'Data penyakit berhasil diperbarui.';
        } else {
            // Proses Tambah
            Penyakit::create($validated);
            $pesan = 'Data penyakit berhasil ditambahkan.';
        }

        return redirect()->route('penyakit.index')->with('success', $pesan);
    }


    // Hapus data penyakit
    public function destroy($id)
    {
        $penyakit = Penyakit::findOrFail($id);
        $penyakit->delete();
        return back()->with('success', 'Data penyakit berhasil dihapus.');
    }
}
