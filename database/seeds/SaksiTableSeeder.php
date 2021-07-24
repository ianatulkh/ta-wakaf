<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SaksiTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('saksi')->delete();
        
        \DB::table('saksi')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'SUGENG RIYADI',
                'nik' => '3327021303680002',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1968-03-13',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '4',
                'pekerjaan' => 'perangkat desa',
                'kewarganegaraan' => 'Indonesia',
                'rt' => '007',
                'rw' => '001',
                'id_desa' => '3327020006',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'O5aIk3GkyoGX0GHZRhgnXUJhpcWaDVO4YAJvo0aI.jpg',
                'created_at' => '2021-07-19 13:06:41',
                'updated_at' => '2021-07-19 13:06:41',
            ),
            1 => 
            array (
                'id' => 3,
                'nama' => 'YANTO',
                'nik' => '3327021902730002',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1973-02-19',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '4',
                'pekerjaan' => 'wiraswasta',
                'kewarganegaraan' => 'Indonesia',
                'rt' => '006',
                'rw' => '001',
                'id_desa' => '3327020006',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'VbVQY2hlFwDd1vMSEnriVVmp4gF9oT1hbeNO7ZVO.jpg',
                'created_at' => '2021-07-19 14:05:02',
                'updated_at' => '2021-07-19 14:05:02',
            ),
        ));
        
        
    }
}