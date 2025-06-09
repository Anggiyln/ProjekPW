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

        $poli = Poli::create([
            'nama_poli' => 'Harun',
            'deskripsi' => 'HAYOLOH'
        ]);

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
            'id_poli' => 'POL-00001',
            'jenis_kelamin_dokter' => 'Laki-laki',
            'bidang_keahlian' => 'Saraf dan Gigi',
            'no_telp_dokter' => '08434344344'
        ]);

    $jadwal = Jadwal::create([
            'id_pasien' => 'PSN-00001',
            'id_dokter' =>'DKT-00001',
            'tanggal_konsultasi' => '2000-05-15'
        ]);

    // $konsultasi = Konsultasi::create([
    //         'user_id' => '1',
    //         'id_dokter' =>'DKT-00001',
    //         'pertanyaan' => 'HAH' //,
    //         // '' => ''
        // ]);
    }
}
