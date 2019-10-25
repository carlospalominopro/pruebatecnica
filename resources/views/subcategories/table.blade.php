<div class="table-responsive" style="text-align: center;">
    <table class="table" id="subcategories-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Categoría</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($subcategories as $subcategory)
            <tr class="{{ $subcategory->status == 0 ? 'disabled' : '' }}">
            <td>{!! $subcategory->category_id !!}</td>
                <td>{!! $subcategory->name !!}</td>
            <td>{!! __('selects.status')[$subcategory->status] !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.subcategories.destroy', $subcategory->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.subcategories.show', [$subcategory->id]) !!}" class='btn btn-default btn-xs bord'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('admin.subcategories.edit', [$subcategory->id]) !!}" class='btn btn-default btn-xs bord'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs bord', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
