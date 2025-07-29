<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::all();
        return view('admin.data-gejala', compact('gejalas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:Dasar,Lanjutan',
        ]);

        if ($request->id) {
            // Update
            $gejala = Gejala::findOrFail($request->id);
            $gejala->update($validated);
            return redirect()->back()->with('success', 'Data gejala berhasil diperbarui.');
        } else {
            // Create
            Gejala::create($validated);
            return redirect()->back()->with('success', 'Data gejala berhasil ditambahkan.');
        }
    }

    public function destroy($id)
    {
        Gejala::destroy($id);
        return redirect()->back()->with('success', 'Data gejala berhasil dihapus.');
    }
}
