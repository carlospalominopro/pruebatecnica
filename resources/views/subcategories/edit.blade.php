@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            <b>Editar Subcategoría #{{$subcategory->id}}</b>
        </h1>
   </section>
   <div class="content">
              @include('adminlte-templates::common.errors')
       <div class="center">
                <div class="box-body col-sm-12">
                   {!! Form::model($subcategory, ['route' => ['admin.subcategories.update', $subcategory->id], 'method' => 'patch']) !!}

                        @include('subcategories.fields')

                   {!! Form::close() !!}
           
           </div>
       </div>
   </div>
@endsection