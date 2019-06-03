<?php

use Illuminate\Database\Seeder;

class TercerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = "ABCDEFGHIJKLMN";

        $names = array(
            'Sonia',
            'Elena',
            'Lourdes',
            'Alexis',
            'Miguel',
            'Rafael',
            'Jesus',
            'Ricardo',
            'Alejandro',
            'Roberto',
            'Tina',
            'Batman',
            'Luis',
            'Lola',
        );

        //TODO: Convertir a factories

        for ($i = 0; $i < 20; $i++) {

            $name = $names[rand(0, count($names) - 1)];

            DB::table('terceros')->insert([
                'cif' => $characters[rand(0, strlen($characters) - 1)] . rand(10000000, 20000000),
                'name' => $name,
                'tel' => rand(600000000, 699999999),
                'email' => $name . '@' . $name . $i . '.com',
            ]);

        }

        DB::table('terceros')->insert([
            'cif' => 'Q12345678',
            'name' => 'Inmutable',
            'tel' => 669591448,
            'email' => 'pepe@inmutable.com',
        ]);

    }
}
