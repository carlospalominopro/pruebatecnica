<div class="fields">

	<!-- Name Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('name', 'Nombre:') !!}
	    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
	</div>

	<!-- Status Id Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('status', 'Estado:') !!}
	    {!! Form::select('status',  __('selects.status'), null, ['class' => 'form-control', 'required']) !!}
	</div>

	<!-- Category Id Field -->
	<div class="form-group col-sm-4">
	    {!! Form::label('category_id', 'Categoría:') !!}
	    {!! Form::select('category_id', $categories ?? [], $subcategory->category_id ?? null, ['class' => 'form-control', 'required']) !!}
	</div>
	
<div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
    <a href="{!! route('admin.subcategories.index') !!}" class="btn btn-light">Cancelar</a>
</div>
