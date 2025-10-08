@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.color.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.colors.update", [$color->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title_ru">{{ trans('cruds.color.fields.title_ru') }}</label>
                <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', $color->title_ru) }}" required>
                @if($errors->has('title_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.color.fields.title_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_uz">{{ trans('cruds.color.fields.title_uz') }}</label>
                <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $color->title_uz) }}" required>
                @if($errors->has('title_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.color.fields.title_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="key">{{ trans('cruds.color.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $color->key) }}" required>
                @if($errors->has('key'))
                    <div class="invalid-feedback">
                        {{ $errors->first('key') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.color.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection