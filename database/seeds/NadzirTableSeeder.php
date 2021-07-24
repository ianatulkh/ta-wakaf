<?php

namespace Database\Seeders;

use App\Nadzir;
use Illuminate\Database\Seeder;

class NadzirTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('nadzir')->delete();
        
        \DB::table('nadzir')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'KASID',
                'nik' => '3327020305520002',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1952-05-03',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '3',
                'pekerjaan' => 'petani',
                'kewarganegaraan' => 'Indonesia',
                'rt' => '006',
                'rw' => '001',
                'id_desa' => '3327020006',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'S5VlZSqII2v6ZosaKWhw1NcLTHDqsluqsTSSCH7x.jpg',
                'created_at' => '2021-07-19 12:52:01',
                'updated_at' => '2021-07-19 12:52:01',
            ),
            1 => 
            array (
                'id' => 2,
                'nama' => 'MIPTAHUDIN',
                'nik' => '3327020810900004',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1990-10-08',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '5',
                'pekerjaan' => 'Wiraswasta',
                'kewarganegaraan' => 'Indonesia',
                'rt' => '006',
                'rw' => '001',
                'id_desa' => '3327020006',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'C974W5LP0le0j9JXhNTbNk1EdU6YBWI7qxIhstul.jpg',
                'created_at' => '2021-07-19 12:53:27',
                'updated_at' => '2021-07-19 12:53:27',
            ),
            2 => 
            array (
                'id' => 3,
                'nama' => 'TOHIR',
                'nik' => '3327021512530001',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1953-12-15',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '3',
                'pekerjaan' => 'wiraswatsa',
                'kewarganegaraan' => 'Indonesia',
                'rt' => '006',
                'rw' => '001',
                'id_desa' => '3327020006',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'rsZX9VGYugTFkcBBqrWi5JlS5qLtvoVrjbJsmlH2.jpg',
                'created_at' => '2021-07-19 12:54:44',
                'updated_at' => '2021-07-19 12:54:44',
            ),
            3 => 
            array (
                'id' => 4,
                'nama' => 'ILIYIN',
                'nik' => '3327021106740005',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1974-06-11',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '3',
                'pekerjaan' => 'perangkat desa',
                'kewarganegaraan' => 'Indonesia',
                'rt' => '016',
                'rw' => '002',
                'id_desa' => '3327020012',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'qw83mGRSMeN7OHXW6xd0HIF3OlpXxsMV0L7O6c80.jpg',
                'created_at' => '2021-07-19 13:02:28',
                'updated_at' => '2021-07-19 13:02:28',
            ),
            4 => 
            array (
                'id' => 6,
                'nama' => 'SUROSO',
                'nik' => '3327020405870005',
                'tempat_lahir' => 'pemalang',
                'tanggal_lahir' => '1987-05-04',
                'id_agama' => '1',
                'id_pendidikan_terakhir' => '5',
                'pekerjaan' => 'wiraswasta',
                'kewarganegaraan' => 'wiraswasta Indonesia',
                'rt' => '006',
                'rw' => '001',
                'id_desa' => '3327020006',
                'kecamatan' => 'Pulosari',
                'kabupaten' => 'Kab. Pemalang',
                'provinsi' => 'Jawa Tengah',
                'ktp' => 'sHBYw9lEyr0b6a4FFdAmBSjkYEBJAihMuZoBiVnY.jpg',
                'created_at' => '2021-07-19 14:06:39',
                'updated_at' => '2021-07-19 14:06:39',
            ),
        ));
        
    }
}