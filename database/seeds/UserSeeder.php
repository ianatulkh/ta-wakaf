<?php

use App\Agama;
use App\PendidikanTerakhir;
use App\User;
use App\Wakif;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $id_pendidikan_terakhir = PendidikanTerakhir::all()->pluck('id')->toArray();
        
        for ($i=0; $i < 10; $i++) { 
            $name = $faker->name;
            
            $user = User::create([
                'id_role' => 2,
                'name' => $name,
                'email' => $faker->unique()->safeEmail,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
            ]);

            Wakif::create([
                'id_user' => $user->id,
                'nama' => $name,
                'nik' => $faker->numberBetween(1000000000000000, 9999999999999999),
                'tempat_lahir' => 'Tegal',
                'tanggal_lahir' => $faker->date('Y-m-d'),
                'id_pendidikan_terakhir' => $faker->randomElement($id_pendidikan_terakhir),
                'pekerjaan' => $faker->jobTitle,
                'alamat_singkat' => $faker->address,
                'id_desa' => $faker->randomElement(['3327020001', '3327020002', '3327020003', '3327020004', '3327020005', '3327020006', '3327020007', '3327020008', '3327020009', '3327020010', '3327020011', '3327020012' ]),
                'rt' => $faker->numberBetween(100, 999),
                'rw' => $faker->numberBetween(100, 999),
            ]);
        }
    }
}
