@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.size.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sizes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.size.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.size.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_ids_id">{{ trans('cruds.size.fields.category_ids') }}</label>
                <select class="form-control select2 {{ $errors->has('category_ids') ? 'is-invalid' : '' }}" name="category_ids_id" id="category_ids_id" required>
                    @foreach($category_ids as $id => $entry)
                        <option value="{{ $id }}" {{ old('category_ids_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category_ids'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category_ids') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.size.fields.category_ids_helper') }}</span>
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