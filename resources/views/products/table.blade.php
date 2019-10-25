<div class="table-responsive" style="text-align: center;">
    <table class="table" id="products-table">
        <thead>
            <tr>
                <th>ID Producto</th>
                <th>Nombre</th>
                <th>Subcategoría</th>
                <th>Estado</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="{{ $product->status == 0 ? 'disabled' : '' }}">
                <td>{!! $product->id !!}</td>
                <td>{!! $product->name !!}</td>
            <td>{!! $subcategory[$product->subcategory_id] !!}</td>
            <td>{!!  __('selects.status')[$product->status] !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.products.destroy', $product->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.products.show', [$product->id]) !!}" class='btn btn-default btn-xs bord'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('admin.products.edit', [$product->id]) !!}" class='btn btn-default btn-xs bord'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs bord', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
