<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EmployeeTypeSeeder::class,
            GroupTypesSeeder::class,
            PaymentTypeSeeder::class,
        ]);
        // $this->call('UsersTableSeeder');

    }
}
