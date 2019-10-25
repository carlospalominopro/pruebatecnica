
@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            <b>Crear Subcategoría</b>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            @include('adminlte-templates::common.errors')
            <div class="center">
                <div class="box-body col-sm-12">
                    {!! Form::open(['route' => 'admin.subcategories.store']) !!}

                        @include('subcategories.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

