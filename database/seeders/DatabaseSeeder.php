<?php

namespace Database\Seeders;

use App\Models\Catalogo;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Mpago;
use App\Models\Proveedore;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
        User::create(['name'=>'administrador','email'=>'admin@gmail.com','password'=>bcrypt('12345678')]);

        Proveedore::create(['nombre'=>'Dante','ruc'=>'1546616','direccion'=>'xdxdxd','telefono'=>'987645123']);

        Cliente::create(['nombre'=>'Dante','dniRuc'=>'73422993','direccion'=>'XDXDXD','telefono'=>'963156080']);

        Mpago::create(['nombre'=>'TARJETA']);

        Categoria::create(['nombre'=>'PELUCHE']);
    }
}
