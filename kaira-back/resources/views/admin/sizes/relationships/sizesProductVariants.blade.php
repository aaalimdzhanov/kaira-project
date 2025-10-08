@can('product_variant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.product-variants.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.productVariant.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.productVariant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-sizesProductVariants">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.product_ids') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.size') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.initial_price') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.stock') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.sku') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.discount_percent') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.discount_start') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.discount_end') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.sizes') }}
                        </th>
                        <th>
                            {{ trans('cruds.productVariant.fields.colors') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productVariants as $key => $productVariant)
                        <tr data-entry-id="{{ $productVariant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $productVariant->id ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->product_ids ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\ProductVariant::SIZE_SELECT[$productVariant->size] ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->initial_price ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->price ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->stock ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->sku ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->discount_percent ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->discount_start ?? '' }}
                            </td>
                            <td>
                                {{ $productVariant->discount_end ?? '' }}
                            </td>
                            <td>
                                @foreach($productVariant->sizes as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($productVariant->colors as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('product_variant_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.product-variants.show', $productVariant->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('product_variant_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.product-variants.edit', $productVariant->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('product_variant_delete')
                                    <form action="{{ route('admin.product-variants.destroy', $productVariant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_variant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.product-variants.massDestroy') }}",
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
  let table = $('.datatable-sizesProductVariants:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection