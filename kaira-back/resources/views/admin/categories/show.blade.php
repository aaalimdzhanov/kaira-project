@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.category.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.id') }}
                        </th>
                        <td>
                            {{ $category->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $category->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $category->title_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.category.fields.key') }}
                        </th>
                        <td>
                            {{ $category->key }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.categories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection