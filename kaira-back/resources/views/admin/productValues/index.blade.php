@extends('layouts.admin')
@section('content')
@can('product_value_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.product-values.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.productValue.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.productValue.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ProductValue">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.discount') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.discount_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.discount_end') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.stock') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.productValue.fields.code') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productValues as $key => $productValue)
                        <tr data-entry-id="{{ $productValue->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productValue->id ?? '' }}
                            </td>
                            <td>
                                {{ $productValue->price ?? '' }}
                            </td>
                            <td>
                                {{ $productValue->discount ?? '' }}
                            </td>
                            <td>
                                {{ $productValue->discount_start ?? '' }}
                            </td>
                            <td>
                                {{ $productValue->discount_end ?? '' }}
                            </td>
                            <td>
                                {{ $productValue->stock ?? '' }}
                            </td>
                            <td>
                                @if($productValue->image)
                                    <a href="{{ $productValue->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $productValue->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $productValue->code ?? '' }}
                            </td>
                            <td>
                                @can('product_value_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.product-values.show', $productValue->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_value_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.product-values.edit', $productValue->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_value_delete')
                                    <form action="{{ route('admin.product-values.destroy', $productValue->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('product_value_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.product-values.massDestroy') }}",
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
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-ProductValue:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection