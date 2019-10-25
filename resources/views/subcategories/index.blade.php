@extends('layouts.admin')
@section('content')
@can('permission_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.subcategories.create") }}">
                {{ trans('global.add') }} Subcategoría
            </a>
        </div>
    </div>
@endcan

@include('flash::message')

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            {{ trans('global.list') }} Subcategorías 
        </h4>
    </div>

    <div class="card-body">
        <div class="table-responsive" style="text-align: center">
            <table class=" table table-striped table-hover datatable datatable-Permission">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds2.subcategory.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds2.subcategory.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds2.subcategory.fields.category') }}
                        </th>
                        <th>
                            Estado
                        </th>
                        <th>
                            {{ trans('global.actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subcategories as $key => $subcategories)
                        <tr data-entry-id="{{ $subcategories->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subcategories->id ?? '' }}
                            </td>
                            <td>
                                {{ $subcategories->name ?? '' }}
                            </td>

                            <td>
                                {{ $categories[$subcategories->category_id] ?? '' }}
                            </td>

                            <td>
                                {{ __('selects.status')[$subcategories->status] ?? '' }}
                                @if ($subcategories->status==1)
                                    <i class="fa fa-info-circle" style="color: green"></i>
                                @else
                                    <i class="fa fa-info-circle" style="color: red"></i>
                                @endif

                            </td>
                            
                            <td>
                                @can('subcategory_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.subcategories.show', $subcategories->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('subcategory_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.subcategories.edit', $subcategories->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('subcategory_delete')
                                    <form action="{{ route('admin.subcategories.destroy', $subcategories->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('permission_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permissions.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection

