@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12" style="text-align: center">
            <h1>BIENVENID@</h1>

            @if (Auth::check())
	           	<h1>{{Auth::user()->name}}</h1>
	           	Rol Asignado: {{$rol_active}}
            @endif

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection