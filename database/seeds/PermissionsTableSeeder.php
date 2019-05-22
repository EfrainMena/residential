<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //usuarios
        Permission::create ([
        	'name'			=>'Navegar usuarios',
        	'slug'			=>'users.index',
        	'description'	=>'Lista y navega todos los usuarios',
        	]);
        Permission::create ([
        	'name'			=>'Ver detalle de usuarios',
        	'slug'			=>'users.show',
        	'description'	=>'Ver detalles cada usuarios',
        	]);
        Permission::create ([
        	'name'			=>'Edicion usuarios',
        	'slug'			=>'users.edit',
        	'description'	=>'Editar cualquier dato de los usuarios',
        	]);
        Permission::create ([
        	'name'			=>'Eliminar usuarios',
        	'slug'			=>'users.destroy',
        	'description'	=>'Eliminar cualquier usuario del sistema',
        	]);


        //Roles
        Permission::create ([
        	'name'			=>'Navegar roles',
        	'slug'			=>'roles.index',
        	'description'	=>'Lista y navega todos los usuarios',
        	]);
        Permission::create ([
        	'name'			=>'Ver detalle de roles',
        	'slug'			=>'roles.show',
        	'description'	=>'Ver detalles cada rol',
        	]);
        Permission::create ([
        	'name'			=>'Creacion de roles',
        	'slug'			=>'roles.create',
        	'description'	=>'Crear rol',
        	]);
        Permission::create ([
        	'name'			=>'Edicion de roles',
        	'slug'			=>'roles.edit',
        	'description'	=>'Editar cualquier dato de rol',
        	]);
        Permission::create ([
        	'name'			=>'Eliminar roles',
        	'slug'			=>'roles.destroy',
        	'description'	=>'Eliminar cualquier rol',
        	]);

    }
}
