<?php

use App\Desa;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Desa::create([
            'id' => '3327020001',
            'nama' => 'Clekatakan'
        ]);
        Desa::create([
            'id' => '3327020002',
            'nama' => 'Batursari'
        ]);
        Desa::create([
            'id' => '3327020003',
            'nama' => 'Penakir'
        ]);
        Desa::create([
            'id' => '3327020004',
            'nama' => 'Gunungsari'
        ]);
        Desa::create([
            'id' => '3327020005',
            'nama' => 'Jurangmangu'
        ]);
        Desa::create([
            'id' => '3327020006',
            'nama' => 'Gambuhan'
        ]);
        Desa::create([
            'id' => '3327020007',
            'nama' => 'Karangsari'
        ]);
        Desa::create([
            'id' => '3327020008',
            'nama' => 'Nyalembeng'
        ]);
        Desa::create([
            'id' => '3327020009',
            'nama' => 'Pulosari'
        ]);
        Desa::create([
            'id' => '3327020010',
            'nama' => 'Pagenteran'
        ]);
        Desa::create([
            'id' => '3327020011',
            'nama' => 'Siremeng'
        ]);
        Desa::create([
            'id' => '3327020012',
            'nama' => 'Cikendung'
        ]);
    }
}
