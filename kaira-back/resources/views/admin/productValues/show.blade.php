@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.productValue.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.id') }}
                        </th>
                        <td>
                            {{ $productValue->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.product_ids') }}
                        </th>
                        <td>
                            {{ $productValue->product_ids->name_uz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.price') }}
                        </th>
                        <td>
                            {{ $productValue->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.initial_price') }}
                        </th>
                        <td>
                            {{ $productValue->initial_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.old_price') }}
                        </th>
                        <td>
                            {{ $productValue->old_price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.discount') }}
                        </th>
                        <td>
                            {{ $productValue->discount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.discount_start') }}
                        </th>
                        <td>
                            {{ $productValue->discount_start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.discount_end') }}
                        </th>
                        <td>
                            {{ $productValue->discount_end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.stock') }}
                        </th>
                        <td>
                            {{ $productValue->stock }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.color') }}
                        </th>
                        <td>
                            {{ $productValue->color->title_uz ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.size') }}
                        </th>
                        <td>
                            {{ $productValue->size->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.image') }}
                        </th>
                        <td>
                            @if($productValue->image)
                                <a href="{{ $productValue->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $productValue->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.productValue.fields.code') }}
                        </th>
                        <td>
                            {{ $productValue->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.product-values.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection