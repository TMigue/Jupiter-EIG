<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $names = array(
            'Sonia',
            'Elena',
            'Lourdes',
            'Alexis',
            'Rafael',
            'Jesus',
            'Ricardo',
            'Alejandro',
            'Roberto',
            'Tina',
            'Batman',
            'Luis',
            'Lola',
            'Miguel',
        );

        DB::table('users')->insert([
            'name' => "Miguel",
            'email' => "migue.mtm@hotmail.com",
            'password' => bcrypt('holaquetal'),
        ]);

        //mi usuario tiene que tener todos los permisos
        $user = User::find(1);

        $user->assignRole('super-admin');

        for ($i = 0; $i < 7; $i++) {

            $name = $names[$i];

            DB::table('users')->insert([
                'name' => $name,
                'password' => bcrypt($name),
                'email' => $name . '@' . $name . $i . '.com',
            ]);

        }
    }
}
