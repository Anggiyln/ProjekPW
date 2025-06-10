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
        $polis = [
            [
                'nama_poli' => 'Poli Gigi',
                'deskripsi' => 'Pelayanan kesehatan gigi dan mulut'
            ],
            [
                'nama_poli' => 'Poli Anak',
                'deskripsi' => 'Pelayanan kesehatan untuk pasien anak-anak'
            ],
            [
                'nama_poli' => 'Poli Penyakit Dalam',
                'deskripsi' => 'Pelayanan kesehatan untuk penyakit dalam'
            ],
            [
                'nama_poli' => 'Poli Bedah',
                'deskripsi' => 'Pelayanan kesehatan untuk tindakan bedah'
            ],
            [
                'nama_poli' => 'Poli Kandungan',
                'deskripsi' => 'Pelayanan kesehatan ibu dan kandungan'
            ],
            [
                'nama_poli' => 'Poli Saraf',
                'deskripsi' => 'Pelayanan kesehatan saraf dan neurologi'
            ],
            [
                'nama_poli' => 'Poli Jantung',
                'deskripsi' => 'Pelayanan kesehatan jantung dan pembuluh darah'
            ],
            [
                'nama_poli' => 'Poli THT',
                'deskripsi' => 'Pelayanan kesehatan telinga, hidung, dan tenggorokan'
            ],
            [
                'nama_poli' => 'Poli Mata',
                'deskripsi' => 'Pelayanan kesehatan mata dan penglihatan'
            ],
            [
                'nama_poli' => 'Poli Kulit dan Kelamin',
                'deskripsi' => 'Pelayanan kesehatan kulit dan kelamin'
            ]
        ];

        // Membuat semua poli
        foreach ($polis as $poliData) {
            Poli::create($poliData);
        }

        $pasien = Pasien::create([
            'user_id' => '1',
            'nama_pasien' => 'Jarjit Sin',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '2000-05-15',
            'no_telp' => '08434344344',
            'alamat'=>'Jl.perintis',
        ]);

        $dokter = Dokter::create([
            'nama_dokter' => 'Farid',
            'id_poli' => 'POL-00001', // Dokter Farid tetap di Poli Gigi
            'jenis_kelamin_dokter' => 'Laki-laki',
            'bidang_keahlian' => 'Saraf dan Gigi',
            'no_telp_dokter' => '08434344344'
        ]);

        // Anda bisa menambahkan dokter lain untuk poli yang berbeda
        $dokter2 = Dokter::create([
            'nama_dokter' => 'Budi Santoso',
            'id_poli' => 'POL-00002', // Poli Anak
            'jenis_kelamin_dokter' => 'Laki-laki',
            'bidang_keahlian' => 'Spesialis Anak',
            'no_telp_dokter' => '08567890123'
        ]);

        $jadwal = Jadwal::create([
            'id_pasien' => 'PSN-00001',
            'id_dokter' =>'DKT-00001',
            'tanggal_konsultasi' => '2000-05-15'
        ]);
    }
}
