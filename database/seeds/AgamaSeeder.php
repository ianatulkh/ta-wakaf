<?php

use App\Agama;
use Illuminate\Database\Seeder;

class AgamaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Agama::create([
            'id' => '1',
            'agama' => 'Islam'
        ]);
        Agama::create([
            'id' => '2',
            'agama' => 'Kristen'
        ]);
        Agama::create([
            'id' => '3',
            'agama' => 'Katolik'
        ]);
        Agama::create([
            'id' => '4',
            'agama' => 'Hindu'
        ]);
        Agama::create([
            'id' => '5',
            'agama' => 'Buddha'
        ]);
        Agama::create([
            'id' => '6',
            'agama' => 'Khong hu cu'
        ]);

    }
}
