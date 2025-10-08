@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.productValue.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.product-values.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="product_ids_id">{{ trans('cruds.productValue.fields.product_ids') }}</label>
                <select class="form-control select2 {{ $errors->has('product_ids') ? 'is-invalid' : '' }}" name="product_ids_id" id="product_ids_id" required>
                    @foreach($product_ids as $id => $entry)
                        <option value="{{ $id }}" {{ old('product_ids_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('product_ids'))
                    <div class="invalid-feedback">
                        {{ $errors->first('product_ids') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.product_ids_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.productValue.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', '') }}" step="0.01" required>
                @if($errors->has('price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="initial_price">{{ trans('cruds.productValue.fields.initial_price') }}</label>
                <input class="form-control {{ $errors->has('initial_price') ? 'is-invalid' : '' }}" type="number" name="initial_price" id="initial_price" value="{{ old('initial_price', '') }}" step="0.01" required>
                @if($errors->has('initial_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('initial_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.initial_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="old_price">{{ trans('cruds.productValue.fields.old_price') }}</label>
                <input class="form-control {{ $errors->has('old_price') ? 'is-invalid' : '' }}" type="number" name="old_price" id="old_price" value="{{ old('old_price', '0') }}" step="0.01">
                @if($errors->has('old_price'))
                    <div class="invalid-feedback">
                        {{ $errors->first('old_price') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.old_price_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.productValue.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', '0') }}" step="1">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_start">{{ trans('cruds.productValue.fields.discount_start') }}</label>
                <input class="form-control datetime {{ $errors->has('discount_start') ? 'is-invalid' : '' }}" type="text" name="discount_start" id="discount_start" value="{{ old('discount_start') }}">
                @if($errors->has('discount_start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.discount_start_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount_end">{{ trans('cruds.productValue.fields.discount_end') }}</label>
                <input class="form-control datetime {{ $errors->has('discount_end') ? 'is-invalid' : '' }}" type="text" name="discount_end" id="discount_end" value="{{ old('discount_end') }}">
                @if($errors->has('discount_end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.discount_end_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="stock">{{ trans('cruds.productValue.fields.stock') }}</label>
                <input class="form-control {{ $errors->has('stock') ? 'is-invalid' : '' }}" type="number" name="stock" id="stock" value="{{ old('stock', '1') }}" step="1" required>
                @if($errors->has('stock'))
                    <div class="invalid-feedback">
                        {{ $errors->first('stock') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.stock_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="color_id">{{ trans('cruds.productValue.fields.color') }}</label>
                <select class="form-control select2 {{ $errors->has('color') ? 'is-invalid' : '' }}" name="color_id" id="color_id" required>
                    @foreach($colors as $id => $entry)
                        <option value="{{ $id }}" {{ old('color_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('color'))
                    <div class="invalid-feedback">
                        {{ $errors->first('color') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.color_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="size_id">{{ trans('cruds.productValue.fields.size') }}</label>
                <select class="form-control select2 {{ $errors->has('size') ? 'is-invalid' : '' }}" name="size_id" id="size_id" required>
                    @foreach($sizes as $id => $entry)
                        <option value="{{ $id }}" {{ old('size_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('size'))
                    <div class="invalid-feedback">
                        {{ $errors->first('size') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.size_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.productValue.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.productValue.fields.image_helper') }}</span>
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
    url: '{{ route('admin.product-values.storeMedia') }}',
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
@if(isset($productValue) && $productValue->image)
      var file = {!! json_encode($productValue->image) !!}
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