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
            'status' => 'Review Data', 
        ]);
        Status::create([
            'status' => 'Survei', 
        ]);
        Status::create([
            'status' => 'Ikrar', 
        ]);
        Status::create([
            'status' => 'Akta Ikrar', 
        ]);
        Status::create([
            'status' => 'Ditolak', 
        ]);
    }
}
