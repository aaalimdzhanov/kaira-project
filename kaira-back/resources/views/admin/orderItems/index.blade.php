@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.orderItem.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OrderItem">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.quantity') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.orderItem.fields.order') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($product_values as $key => $item)
                                    <option value="{{ $item->price }}">{{ $item->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($orders as $key => $item)
                                    <option value="{{ $item->phone }}">{{ $item->phone }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItems as $key => $orderItem)
                        <tr data-entry-id="{{ $orderItem->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $orderItem->id ?? '' }}
                            </td>
                            <td>
                                {{ $orderItem->product->price ?? '' }}
                            </td>
                            <td>
                                {{ $orderItem->quantity ?? '' }}
                            </td>
                            <td>
                                {{ $orderItem->code ?? '' }}
                            </td>
                            <td>
                                {{ $orderItem->order->phone ?? '' }}
                            </td>
                            <td>
                                @can('order_item_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.order-items.show', $orderItem->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-OrderItem:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection