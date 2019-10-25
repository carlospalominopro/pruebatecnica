@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            <b>Editar Categoría #{{$category->id}}</b>
        </h1>
   </section>
   <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="center">
                <div class="box-body col-sm-12">
            
                    {!! Form::model($category, ['route' => ['admin.categories.update', $category->id], 'method' => 'patch']) !!}

                        @include('categories.fields')

                   {!! Form::close() !!}
      
           </div>
       </div>
   </div>
@endsection