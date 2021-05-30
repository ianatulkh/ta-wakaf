<?php

use App\PendidikanTerakhir;
use Illuminate\Database\Seeder;

class PendidikanTerakhirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PendidikanTerakhir::create([
            'id' => '1',
            'tingkat' => 'Tidak/Belum Sekolah'
        ]);
        PendidikanTerakhir::create([
            'id' => '2',
            'tingkat' => 'Tidak Tamat SD/Sederajat'
        ]);
        PendidikanTerakhir::create([
            'id' => '3',
            'tingkat' => 'Tamat SD/Sederajat'
        ]);
        PendidikanTerakhir::create([
            'id' => '4',
            'tingkat' => 'SLTP/Sederajat'
        ]);
        PendidikanTerakhir::create([
            'id' => '5',
            'tingkat' => 'SLTA/Sederajat'
        ]);
        PendidikanTerakhir::create([
            'id' => '6',
            'tingkat' => 'Diploma I/II'
        ]);
        PendidikanTerakhir::create([
            'id' => '7',
            'tingkat' => 'Akademi/Diploma III/Sarjana Muda'
        ]);
        PendidikanTerakhir::create([
            'id' => '8',
            'tingkat' => 'Diploma IV/Strata I'
        ]);
        PendidikanTerakhir::create([
            'id' => '10',
            'tingkat' => 'Strata II'
        ]);
        PendidikanTerakhir::create([
            'id' => '11',
            'tingkat' => 'Strata III'
        ]);
    }
}
