@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.material.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.id') }}
                        </th>
                        <td>
                            {{ $material->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $material->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $material->title_uz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.material.fields.category_ids') }}
                        </th>
                        <td>
                            {{ $material->category_ids->title_uz ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.materials.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection