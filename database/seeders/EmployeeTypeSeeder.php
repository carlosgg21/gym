<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EmployeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('employee_types')->insert([
            'type' => 'Entrenador',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('employee_types')->insert([
            'type' => 'Limpieza',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('employee_types')->insert([
            'type' => 'Recepcionista',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('employee_types')->insert([
            'type' => 'Contable',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
