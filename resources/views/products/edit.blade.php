@extends('layouts.admin')

@section('content')
    <section class="content-header">
        <h1>
            <b>Editar Producto #{{ $product->id}}</b>
        </h1>
   </section>
   <div class="content">
              @include('adminlte-templates::common.errors')
       <div class="center">
                <div class="box-body col-sm-12">
              
                   {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'patch']) !!}

                        @include('products.fields')

                   {!! Form::close() !!}
              
           </div>
       </div>
   </div>
@endsection