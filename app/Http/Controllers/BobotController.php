<?php
// app/Http/Controllers/BobotController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BobotGejala;
use App\Models\Penyakit;
use App\Models\Gejala;

class BobotController extends Controller
{
    public function index()
    {
        $bobotGejalas = BobotGejala::with(['gejala', 'penyakit'])->get();
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('admin.data-bobot', compact('bobotGejalas', 'gejalas', 'penyakits'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'gejala_id' => 'required|exists:gejalas,id',
            'penyakit_id' => 'required|exists:penyakits,id',
            'bobot' => 'required|numeric',
        ]);

        if ($request->filled('id')) {
            $bobot = BobotGejala::findOrFail($request->id);
            $bobot->update($validated);
            return back()->with('success', 'Data bobot berhasil diperbarui.');
        } else {
            BobotGejala::create($validated);
            return back()->with('success', 'Data bobot berhasil ditambahkan.');
        }
    }


    public function destroy($id)
    {
        BobotGejala::findOrFail($id)->delete();
        return back()->with('success', 'Data bobot berhasil dihapus.');
    }
}
