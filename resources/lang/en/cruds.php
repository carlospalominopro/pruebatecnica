<?php

return [
    'permission'     => [
        'title'          => 'Permisos',
        'title_singular' => 'Permisos',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Nombre',
            'title_helper'      => '',
            'created_at'        => 'Creado',
            'created_at_helper' => '',
            'updated_at'        => 'Actualizado',
            'updated_at_helper' => '',
            'deleted_at'        => 'Borrado',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Roles',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Nombre',
            'title_helper'       => '',
            'permissions'        => 'Permisos',
            'permissions_helper' => '',
            'created_at'         => 'Creado',
            'created_at_helper'  => '',
            'updated_at'         => 'Actualizado',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Borrado',
            'deleted_at_helper'  => '',
        ],
    ],
    'userManagement' => [
        'title'          => 'User Management',
        'title_singular' => 'User Management',
    ],
    'user'           => [
        'title'          => 'Usuarios',
        'title_singular' => 'Usuarios',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nombre',
            'name_helper'              => '',
            'email'                    => 'Correo',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Contraseña',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Recordar',
            'remember_token_helper'    => '',
            'created_at'               => 'Creado',
            'created_at_helper'        => '',
            'updated_at'               => 'Actualizado',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Borrado',
            'deleted_at_helper'        => '',
            'status'        => 'Estado',
        ],
    ],
];