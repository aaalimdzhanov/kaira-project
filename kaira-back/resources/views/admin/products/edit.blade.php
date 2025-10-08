@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name_ru">{{ trans('cruds.product.fields.name_ru') }}</label>
                <input class="form-control {{ $errors->has('name_ru') ? 'is-invalid' : '' }}" type="text" name="name_ru" id="name_ru" value="{{ old('name_ru', $product->name_ru) }}" required>
                @if($errors->has('name_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name_uz">{{ trans('cruds.product.fields.name_uz') }}</label>
                <input class="form-control {{ $errors->has('name_uz') ? 'is-invalid' : '' }}" type="text" name="name_uz" id="name_uz" value="{{ old('name_uz', $product->name_uz) }}" required>
                @if($errors->has('name_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.name_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description_ru">{{ trans('cruds.product.fields.description_ru') }}</label>
                <input class="form-control {{ $errors->has('description_ru') ? 'is-invalid' : '' }}" type="text" name="description_ru" id="description_ru" value="{{ old('description_ru', $product->description_ru) }}" required>
                @if($errors->has('description_ru'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_ru') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_ru_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description_uz">{{ trans('cruds.product.fields.description_uz') }}</label>
                <input class="form-control {{ $errors->has('description_uz') ? 'is-invalid' : '' }}" type="text" name="description_uz" id="description_uz" value="{{ old('description_uz', $product->description_uz) }}" required>
                @if($errors->has('description_uz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_uz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.description_uz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.product.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="material_id">{{ trans('cruds.product.fields.material') }}</label>
                <select class="form-control select2 {{ $errors->has('material') ? 'is-invalid' : '' }}" name="material_id" id="material_id" required>
                    @foreach($materials as $id => $entry)
                        <option value="{{ $id }}" {{ (old('material_id') ? old('material_id') : $product->material->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('material') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.material_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="brand_id">{{ trans('cruds.product.fields.brand') }}</label>
                <select class="form-control select2 {{ $errors->has('brand') ? 'is-invalid' : '' }}" name="brand_id" id="brand_id" required>
                    @foreach($brands as $id => $entry)
                        <option value="{{ $id }}" {{ (old('brand_id') ? old('brand_id') : $product->brand->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('brand'))
                    <div class="invalid-feedback">
                        {{ $errors->first('brand') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.brand_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="season_id">{{ trans('cruds.product.fields.season') }}</label>
                <select class="form-control select2 {{ $errors->has('season') ? 'is-invalid' : '' }}" name="season_id" id="season_id" required>
                    @foreach($seasons as $id => $entry)
                        <option value="{{ $id }}" {{ (old('season_id') ? old('season_id') : $product->season->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('season'))
                    <div class="invalid-feedback">
                        {{ $errors->first('season') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.season_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="country_id">{{ trans('cruds.product.fields.country') }}</label>
                <select class="form-control select2 {{ $errors->has('country') ? 'is-invalid' : '' }}" name="country_id" id="country_id" required>
                    @foreach($countries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $product->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('country'))
                    <div class="invalid-feedback">
                        {{ $errors->first('country') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.product.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $product->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.product.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Product::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $product->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.product.fields.status_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.products.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($product) && $product->image)
      var file = {!! json_encode($product->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection