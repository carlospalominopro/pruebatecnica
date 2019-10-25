<div class="table-responsive" style="text-align: center;">
    <table class="table" id="categories-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
        <th>Estado</th>
                <th colspan="3">Acción</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr class="{{ $category->status == 0 ? 'disabled' : '' }}">
                <td>{!! $category->id !!}</td>
                <td>{!! $category->name !!}</td>
            <td>{!!  __('selects.status')[$category->status] !!}</td>
                <td>
                    {!! Form::open(['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('admin.categories.show', [$category->id]) !!}" class='btn btn-default btn-xs bord'><i class="fa fa-eye"></i></a>
                        <a href="{!! route('admin.categories.edit', [$category->id]) !!}" class='btn btn-default btn-xs bord'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs bord', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
