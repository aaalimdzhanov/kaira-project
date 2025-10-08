@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.season.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seasons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.id') }}
                        </th>
                        <td>
                            {{ $season->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.title_ru') }}
                        </th>
                        <td>
                            {{ $season->title_ru }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.season.fields.title_uz') }}
                        </th>
                        <td>
                            {{ $season->title_uz }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.seasons.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection