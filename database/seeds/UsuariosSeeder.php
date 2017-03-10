<?php

use Illuminate\Database\Seeder;
use App\Modelos\Usuario\Usuario;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre' => 'J. Daniel',
            'apellidos' => 'Salcedo Sambrano',
            'email' => 'dsalcedo@outlook.com',
            'password' => 'Google2007',
            'activo' => true
        ]);

    }
}
