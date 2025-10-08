@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.order.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.id') }}
                        </th>
                        <td>
                            {{ $order->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.total_amount') }}
                        </th>
                        <td>
                            {{ $order->total_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.phone') }}
                        </th>
                        <td>
                            {{ $order->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\Order::STATUS_SELECT[$order->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.order.fields.description') }}
                        </th>
                        <td>
                            {{ $order->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.orders.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#order_order_items" role="tab" data-toggle="tab">
                {{ trans('cruds.orderItem.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="order_order_items">
            @includeIf('admin.orders.relationships.orderOrderItems', ['orderItems' => $order->orderOrderItems])
        </div>
    </div>
</div>

@endsection