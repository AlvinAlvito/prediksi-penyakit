<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\Diagnosa;
use App\Models\DiagnosaGejala;
use App\Models\BobotGejala;

class DiagnosaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pasien' => 'required|string',
            'usia' => 'required|integer|min:1|max:120',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'gejala_dasar' => 'required|array',
            'gejala_lanjutan' => 'nullable|array',
        ]);

        // Gabungkan semua gejala
        $gejalaDipilih = array_merge(
            $request->gejala_dasar ?? [],
            $request->gejala_lanjutan ?? []
        );

        // Ambil semua penyakit
        $penyakits = Penyakit::all();

        // Simpan diagnosa awal
        $diagnosa = Diagnosa::create([
            'nama_pasien' => $request->nama_pasien,
            'usia' => $request->usia,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        // Simpan semua gejala yang dipilih
        foreach ($gejalaDipilih as $idGejala) {
            DiagnosaGejala::create([
                'diagnosa_id' => $diagnosa->id,
                'gejala_id' => $idGejala,
            ]);
        }

        // Naïve Bayes: Hitung skor per penyakit
        $hasil = [];
        $prior = 1 / $penyakits->count();

        foreach ($penyakits as $penyakit) {
            $prob = 1;
            foreach ($gejalaDipilih as $gejala_id) {
                $bobot = BobotGejala::where('gejala_id', $gejala_id)
                    ->where('penyakit_id', $penyakit->id)
                    ->value('bobot') ?? 0.01; // default 0.01 jika tidak ditemukan
                $prob *= $bobot;
            }
            $hasil[$penyakit->nama] = $prob * $prior;
        }

        // Normalisasi
        $total = array_sum($hasil);
        foreach ($hasil as $key => $value) {
            $hasil[$key] = round(($value / $total) * 100, 2);
        }

        // Simpan hasil tertinggi ke tabel diagnosa
        arsort($hasil);
        $hasil_tertinggi = array_key_first($hasil);
        $persentase_tertinggi = $hasil[$hasil_tertinggi];

        $diagnosa->update([
            'hasil_penyakit' => $hasil_tertinggi,
            'persentase' => $persentase_tertinggi,
        ]);

        // Kirim ke tampilan hasil
        return redirect()->route('diagnosa.hasil', $diagnosa->id);


    }
    public function hasil($id)
    {
        $diagnosa = Diagnosa::with('gejalas')->findOrFail($id);

        // Hitung ulang hasil diagnosa (jika belum disimpan sebelumnya bisa dihitung ulang di sini)
        $hasil = [];
        $penyakits = Penyakit::all();
        $gejalaDipilih = $diagnosa->gejalas->pluck('id')->toArray();
        $prior = 1 / $penyakits->count();

        foreach ($penyakits as $penyakit) {
            $prob = 1;
            foreach ($gejalaDipilih as $gejala_id) {
                $bobot = BobotGejala::where('gejala_id', $gejala_id)
                    ->where('penyakit_id', $penyakit->id)
                    ->value('bobot') ?? 0.01;
                $prob *= $bobot;
            }
            $hasil[$penyakit->nama] = $prob * $prior;
        }

        // Normalisasi
        $total = array_sum($hasil);
        foreach ($hasil as $key => $value) {
            $hasil[$key] = round(($value / $total) * 100, 2);
        }

        arsort($hasil);

        return view('hasil', [
            'diagnosa' => $diagnosa,
            'hasil' => $hasil,
        ]);
    }


    public function index()
    {
        // Untuk admin melihat semua diagnosa
        $diagnosas = Diagnosa::with('gejalas')->latest()->get();
        return view('admin.data-diagnosa', ['diagnosas' => $diagnosas]);


    }
    public function form()
    {
        $gejala_dasar = \App\Models\Gejala::where('jenis', 'Dasar')->get();
        $gejala_lanjutan = \App\Models\Gejala::where('jenis', 'Lanjutan')->get();

        $diagnosa = session('diagnosa');
        $hasil = session('hasil');

        return view('index', compact('gejala_dasar', 'gejala_lanjutan', 'diagnosa', 'hasil'));
    }



    public function destroy($id)
    {
        Diagnosa::findOrFail($id)->delete();
        return redirect()->route('/admin/data-diagnosa')->with('success', 'Data berhasil dihapus');
    }
    public function edit($id)
    {
        $diagnosa = Diagnosa::with('gejalas')->findOrFail($id);
        $gejalas = Gejala::all();
        $penyakits = Penyakit::all();

        return view('admin.edit-diagnosa', compact('diagnosa', 'gejalas', 'penyakits'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required|string',
            'usia' => 'required|integer|min:1|max:120',
            'jenis_kelamin' => 'required|in:Pria,Wanita',
            'hasil_penyakit' => 'required|string',
            'persentase' => 'required|numeric',
        ]);

        $diagnosa = Diagnosa::findOrFail($id);
        $diagnosa->update($request->only([
            'nama_pasien',
            'usia',
            'jenis_kelamin',
            'hasil_penyakit',
            'persentase'
        ]));

        return redirect()->route('admin.diagnosa.index')->with('success', 'Data diagnosa berhasil diperbarui.');
    }

}
