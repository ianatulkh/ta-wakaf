<?php

use App\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'ket_status' => 'Review Data', 
        ]);
        Status::create([
            'ket_status' => 'Survei', 
        ]);
        Status::create([
            'ket_status' => 'Ikrar', 
        ]);
        Status::create([
            'ket_status' => 'Akta Ikrar', 
        ]);
    }
}
