
<div class="fields">
	
	<!-- Name Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('name', 'Nombre Producto:') !!}
	    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<!-- Subcategory Id Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('subcategory_id', 'Subcategoría:') !!}
	    {!! Form::select('subcategory_id',  $subcategory ?? [], $product->subcategory_id ?? null, ['class' => 'form-control', 'required']) !!}
	</div>

	<!-- Status Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('status', 'Estado:') !!}
	    {!! Form::select('status',  __('selects.status'), null, ['class' => 'form-control', 'required']) !!}
	</div>
		

</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('admin.products.index') !!}" class="btn btn-light">Cancelar</a>
</div>
