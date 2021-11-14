<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PaymentTypeSeeder extends Seeder
{
    // . , quis nulla hic? Autem voluptate numquam soluta. Velit!
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_types')->insert([
            'name' => 'Diario',
            'mount' => '50.00',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('payment_types')->insert([
            'name' => 'Semanal',
            'mount' => '250.00',
            'description' => 'Voluptas ab molestias vitae amet beatae.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('payment_types')->insert([
            'name' => 'Quincenal',
            'mount' => '500.00',
            'description' => 'Eaque distinctio expedita aperiam harum ducimus veniam nihil.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('payment_types')->insert([
            'name' => 'Mensual',
            'mount' => '1000.00',
            'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}
