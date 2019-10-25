<?php

namespace App\Http\Controllers\Admin;

class HomeController
{
    public function index()
    {
    	$user = \Auth::user();
        $user->roles->first()->tittle;

        $rol_active = $user->roles[0]->title;

        return view('home',compact('rol_active'));
    }
}
