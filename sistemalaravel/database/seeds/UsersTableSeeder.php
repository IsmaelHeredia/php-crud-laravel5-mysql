<?php

use Illuminate\Database\Seeder;
use App\User;

/**
* Agregamos un usuario nuevo a la base de datos.
*/
class UsersTableSeeder extends Seeder {
    public function run(){
        User::create(array(
            'email'     => 'admin@admin.com',
            'name'=> 'Administrator',
            'password' => Hash::make('admin') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}