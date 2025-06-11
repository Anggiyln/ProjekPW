<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Poli;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Konsultasi;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // User::factory(10)->create();

        $user = User::create([
            'name' => 'harun',
            'email' => 'harun@harun',
            'password' => '12345678'
        ]);

        // Daftar poli yang akan dibuat
        \App\Models\Poli::updateOrCreate([
            'nama_poli' => 'Poli Gigi',
            'deskripsi' => 'Pelayanan kesehatan gigi dan mulut'
        ]);

        // Data kedua
        \App\Models\Poli::updateOrCreate([
            'nama_poli' => 'Poli Anak',
            'deskripsi' => 'Pelayanan kesehatan untuk pasien anak-anak'
        ]);

        // Data ketiga
        \App\Models\Poli::updateOrCreate([
            'nama_poli' => 'Poli Penyakit Dalam',
            'deskripsi' => 'Pelayanan kesehatan untuk penyakit dalam'
        ]);

        // Data keempat
        \App\Models\Poli::updateOrCreate([
            'nama_poli' => 'Poli Bedah',
            'deskripsi' => 'Pelayanan kesehatan untuk tindakan bedah'
        ]);

        // Data kelima
        \App\Models\Poli::updateOrCreate([
            'nama_poli' => 'Poli Kandungan',
            'deskripsi' => 'Pelayanan kesehatan ibu dan kandungan'
        ]);

        // Data keenam (jika ingin menambah lebih banyak)
        \App\Models\Poli::updateOrCreate([
            'nama_poli' => 'Poli Saraf',
            'deskripsi' => 'Pelayanan kesehatan saraf dan neurologi'
        ]);

        // Membuat semua poli
//         foreach ($polisData as $poli) {
//         Poli::create($poli);
// }

        $pasien = Pasien::updateOrCreate([
            'user_id' => '1',
            'nama_pasien' => 'Jarjit Sin',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2000-05-15',
            'no_telp' => '08434344344',
            'alamat'=>'Jl.perintis',
        ]);

        $dokter = Dokter::updateOrCreate([
            'nama_dokter' => 'Farid',
            'id_poli' => 'POL-00001', // Dokter Farid tetap di Poli Gigi
            'jenis_kelamin_dokter' => 'Laki-laki',
            'bidang_keahlian' => 'Saraf dan Gigi',
            'no_telp_dokter' => '08434344344'
        ]);

        // Anda bisa menambahkan dokter lain untuk poli yang berbeda
        $dokter2 = Dokter::updateOrCreate([
            'nama_dokter' => 'Budi Santoso',
            'id_poli' => 'POL-00002', // Poli Anak
            'jenis_kelamin_dokter' => 'Laki-laki',
            'bidang_keahlian' => 'Spesialis Anak',
            'no_telp_dokter' => '08567890123'
        ]);

        $jadwal = Jadwal::updateOrCreatephp([
            'id_pasien' => 'PSN-00001',
            'id_dokter' =>'DKT-00001',
            'tanggal_konsultasi' => '2000-05-15'
        ]);
    }
}
