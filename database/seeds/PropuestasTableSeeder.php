<?php

use Illuminate\Database\Seeder;

class PropuestasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propuestas_gasto')->insert([
            'owner' => 1,
            'cif' => "Q12345678",
            'type' => 1,
            'shortdescription' => "Prueba",
            'description' => "Una propuesta de prueba",
            'totalamount' => 15000,
            'spentamount' => 5000,
        ]);

    }
}
