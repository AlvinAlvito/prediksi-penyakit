<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Penyakit;
use App\Models\Gejala;
use App\Models\BobotGejala;

class BobotGejalaSeeder extends Seeder
{
    public function run()
    {
        // Daftar penyakit
        $penyakits = [
            'jantung', 'diabetes', 'hipertensi', 'stroke', 'asma', 'rematik', 'asam_lambung'
        ];

        // Insert penyakit (jika belum ada)
        foreach ($penyakits as $penyakit) {
            Penyakit::firstOrCreate([
                'nama' => ucfirst(str_replace('_', ' ', $penyakit)),
            ]);
        }

        // Baca file JSON
        $json = file_get_contents(database_path('data/bobot-gejala.json'));
        $data = json_decode($json, true);

        foreach ($data as $item) {
            // Insert gejala
            $gejala = Gejala::firstOrCreate([
                'kode' => $item['id'],
            ], [
                'nama' => $item['nama'],
                'jenis' => strtolower($item['jenis']) === 'dasar' ? 'Dasar' : 'Lanjutan',

            ]);

            // Insert bobot untuk tiap penyakit
            foreach ($penyakits as $penyakitKey) {
                $penyakit = Penyakit::where('nama', ucfirst(str_replace('_', ' ', $penyakitKey)))->first();

                BobotGejala::updateOrCreate([
                    'gejala_id' => $gejala->id,
                    'penyakit_id' => $penyakit->id,
                ], [
                    'bobot' => $item[$penyakitKey],
                ]);
            }
        }
    }
}
