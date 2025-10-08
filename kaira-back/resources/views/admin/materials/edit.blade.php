@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.material.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.materials.update", [$material->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title_ru">{{ trans('cruds.material.fields.title_ru') }}</label>
                <input class="form-control {{ $errors->has('title_ru') ? 'is-invalid' : '' }}" type="text" name="title_ru" id="title_ru" value="{{ old('title_ru', $material->title_ru) }}" required>
                @if($errors->has('title_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.title_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="title_uz">{{ trans('cruds.material.fields.title_uz') }}</label>
                <input class="form-control {{ $errors->has('title_uz') ? 'is-invalid' : '' }}" type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $material->title_uz) }}" required>
                @if($errors->has('title_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.title_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category_ids_id">{{ trans('cruds.material.fields.category_ids') }}</label>
                <select class="form-control select2 {{ $errors->has('category_ids') ? 'is-invalid' : '' }}" name="category_ids_id" id="category_ids_id">
                    @foreach($category_ids as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_ids_id') ? old('category_ids_id') : $material->category_ids->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_ids'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_ids') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.material.fields.category_ids_helper') }}</span>
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