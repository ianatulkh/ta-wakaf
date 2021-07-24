<?php

use App\User;
use App\Wakif;
use Illuminate\Database\Seeder;

class WakifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'id_role' => 2,
            'email' => 'toyib@gmail.com',
            'name' => 'toyib cs',
            'password' => 'password',
            'email_verified_at' => now()
        ]);

        Wakif::create([
            'id_user' => $user->id,
            'nama' => 'toyib cs',
            'nik' => '3347020609700003',
            'tempat_lahir' => 'Pemalang',
            'tanggal_lahir' => '1970-07-17',
            'id_agama' => 1,
            'id_pendidikan_terakhir' => 5,
            'pekerjaan' => 'Perangkat Desa',
            'no_wa' => '08223123454',
            'kewarganegaraan' => 'Indonesia',
            'rt' => '001',
            'rw' => '001',
            'id_desa' => '3327020006',
            'kecamatan' => 'Pulosari',
            'kabupaten' => 'Kab. Pemalang',
            'provinsi' => 'Jawa Tengah',
            'ktp' => 'ktp.jpg',
        ]);
    }
}
