<?php

use Database\Seeders\NadzirTableSeeder;
use Database\Seeders\SaksiTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AgamaSeeder::class);
        $this->call(DesaSeeder::class);
        $this->call(PendidikanTerakhirSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(WakifSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(SaksiTableSeeder::class);
        $this->call(NadzirTableSeeder::class);
    }
}
