<?php

use Illuminate\Database\Seeder;
use App\Modelos\Catalogo\Roles;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Roles::create(['clave'=>'su', 'titulo'=>'Super Usuario']);
        Roles::create(['clave'=>'admin', 'titulo'=>'Administrador']);
        Roles::create(['clave'=>'instructor', 'titulo'=>'Instructor']);
        Roles::create(['clave'=>'cursante', 'titulo'=>'Cursante']);
    }
}
