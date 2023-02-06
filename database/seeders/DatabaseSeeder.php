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
        Proveedore::create(['nombre'=>'Dante','ruc'=>'87965418','direccion'=>'xdxdxd','telefono'=>'987645123']);
        Cliente::create(['nombre'=>'Dante','dniRuc'=>'73422993','direccion'=>'XDXDXD','telefono'=>'963156080']);
        Mpago::create(['nombre'=>'Efectivo']);
        Mpago::create(['nombre'=>'Transferencia']);
        Mpago::create(['nombre'=>'Yape']);
        Mpago::create(['nombre'=>'Plin']);
        Mpago::create(['nombre'=>'Luquita']);
        Mpago::create(['nombre'=>'Tarjeta']);
        Categoria::create(['nombre'=>' Alimentos y bebidas']);
        Categoria::create(['nombre'=>' Productos electrónicos']);
        Categoria::create(['nombre'=>' Productos para el hogar y la decoración']);
        Categoria::create(['nombre'=>' Ropa y accesorios']);
        Categoria::create(['nombre'=>' Juguetes y juegos']);
        Categoria::create(['nombre'=>' Productos de belleza y cuidado personal']);
        Categoria::create(['nombre'=>' Productos deportivos y al aire libre']);
        Categoria::create(['nombre'=>' Automóviles y motocicletas']);
        Categoria::create(['nombre'=>' Libros, revistas y papelería']);
        Categoria::create(['nombre'=>' Artículos para mascotas']);
        Categoria::create(['nombre'=>' Mobiliario']);
        Categoria::create(['nombre'=>' Herramientas y materiales de construcción']);
        Categoria::create(['nombre'=>' Artículos para la jardinería']);
        Categoria::create(['nombre'=>' Suministros de oficina']);
        Categoria::create(['nombre'=>' Muebles para el hogar']);
        Categoria::create(['nombre'=>' Artículos de iluminación']);
        Categoria::create(['nombre'=>' Productos de hardware']);
        Categoria::create(['nombre'=>' Productos de limpieza y cuidado']);
        Categoria::create(['nombre'=>' Artículos de temporada (por ejemplo, decoraciones navideñas)']);
        Categoria::create(['nombre'=>' Productos para bebés y niños pequeños']);
        Categoria::create(['nombre'=>' Productos de joyería y relojes']);
        Categoria::create(['nombre'=>' Artículos de camping y senderismo']);
        Categoria::create(['nombre'=>' Productos de cámaras y fotografía']);
        Categoria::create(['nombre'=>' Productos de música y entretenimiento']);
        Categoria::create(['nombre'=>' Productos de seguridad para el hogar']);
        Categoria::create(['nombre'=>' Productos de cuidado dental']);
        Categoria::create(['nombre'=>' Productos de peluquería y estética']);
        Categoria::create(['nombre'=>' Productos de viaje']);
        Categoria::create(['nombre'=>' Artículos de cocina y comedor']);
        Categoria::create(['nombre'=>' Artículos de pesca y caza']);
        Categoria::create(['nombre'=>' Productos de bricolaje y manualidades']);
        Categoria::create(['nombre'=>' Productos de natación y playa']);
        Categoria::create(['nombre'=>' Artículos de animales de compañía']);
        Categoria::create(['nombre'=>' Productos de vino y licores']);
        Categoria::create(['nombre'=>' Productos de deportes de invierno']);
        Categoria::create(['nombre'=>' Artículos de ciencia y tecnología']);
        Categoria::create(['nombre'=>' Productos de arte y manualidades']);
        Categoria::create(['nombre'=>' Productos de jardinería y paisajismo']);
        Categoria::create(['nombre'=>' Productos de cuidado de la piel y el cuerpo']);
        Categoria::create(['nombre'=>' Productos de belleza para el cabello']);
        Categoria::create(['nombre'=>' Productos de cuidado de los pies']);
        Categoria::create(['nombre'=>' Productos de seguridad para el automóvil']);
        Categoria::create(['nombre'=>' Productos de videojuegos y consolas']);
        Categoria::create(['nombre'=>' Productos de fitness y entrenamiento']);
        Categoria::create(['nombre'=>' Productos de comida para animales de compañía']);
        Categoria::create(['nombre'=>' Productos de masaje y bienestar']);
        Categoria::create(['nombre'=>' Productos de terapia y cuidado personal']);
        Categoria::create(['nombre'=>' Productos de meditación y yoga']);
        Categoria::create(['nombre'=>' Productos de viajes y turismo']);
        Categoria::create(['nombre'=>' Productos de coleccionables y antigüedades']);
        Catalogo::factory(100)->create();
        Proveedore::factory(20)->create();
        Cliente::factory(100)->create();
    }
}
