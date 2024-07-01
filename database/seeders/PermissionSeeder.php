<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        //user
        Permission::query()->create([
            'route' => '/api/user',
            'controller' => "UserController",
            'method' => 'index',
            'roles' => ['limited_admin', 'user', 'operator']
        ]);
        Permission::query()->create([
            'route' => '/api/user/{id}',
            'controller' => "UserController",
            'method' => 'show',
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/user/create',
            'controller' => "UserController",
            'method' => 'store',
            'roles' => 'limited_admin'
        ]);
        Permission::query()->create([
            'route' => '/api/user/update/{id}',
            'controller' => "UserController",
            'method' => 'update',
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/user/destroy/{id}',
            'controller' => "UserController",
            'method' => 'destroy',
            'roles' => ['limited_admin', 'user']
        ]);

        //client
        Permission::query()->create([
            'route' => '/api/client',
            'controller' => "ClientController",
            'method' => 'index',
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/client/{id}',
            'controller' => "ClientController",
            "method" => "show",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/client/store',
            'controller' => "ClientController",
            "method" => "store",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/client/update/{id}',
            'controller' => "ClientController",
            "method" => "update",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/client/delete/{id}',
            'controller' => "ClientController",
            "method" => "destroy",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/client/withCerts',
            'controller' => "ClientController",
            "method" => "clientsWithCerts",
            'roles' => ['limited_admin', 'user']
        ]);

        //certification
        Permission::query()->create([
            'route' => '/api/certificate',
            'controller' => "CertificateController",
            "method" => "index",
            'roles' => ['limited_admin', 'user', 'operator']
        ]);
        Permission::query()->create([
            'route' => '/api/certificate/show{id}',
            'controller' => "CertificateController",
            "method" => "show",
            'roles' => ['limited_admin', 'user', 'operator']
        ]);
        Permission::query()->create([
            'route' => '/api/certificate/create',
            'controller' => "CertificateController",
            "method" => "store",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/certificate/update/{id}',
            'controller' => "CertificateController",
            "method" => "update",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/certificate/delete/{id}',
            'controller' => "CertificateController",
            "method" => "destroy",
            'roles' => ['limited_admin', 'user']
        ]);

        //requests
        Permission::query()->create([
            'route' => '/api/request',
            'controller' => "RequestController",
            "method" => "index",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/request/create',
            'controller' => "RequestController",
            "method" => "store",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/request/update/{id}',
            'controller' => "RequestController",
            "method" => "update",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/request/update/status/{id}',
            'controller' => "RequestController",
            "method" => "statusUpdate",
            'roles' => ['limited_admin', 'user']
        ]);
        Permission::query()->create([
            'route' => '/api/request/delete/{id}',
            'controller' => "RequestController",
            "method" => "destroy",
            'roles' => ['limited_admin', 'user']
        ]);

        //file
        Permission::query()->create([
            'route' => '/api/file/create',
            'controller' => "FileController",
            "method" => "create",
            'roles' => ['limited_admin', 'user']
        ]);


    }
}
