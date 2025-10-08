<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductValueRequest;
use App\Http\Requests\StoreProductValueRequest;
use App\Http\Requests\UpdateProductValueRequest;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductValue;
use App\Models\Size;
use App\Services\CounterService;
use App\Services\ProductService;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductValuesController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_value_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productValues = ProductValue::with(['product_ids', 'color', 'size', 'media'])->get();

        return view('admin.productValues.index', compact('productValues'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_value_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_ids = Product::pluck('name_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.productValues.create', compact('colors', 'product_ids', 'sizes'));
    }

    public function store(
        StoreProductValueRequest $request,
        ProductService $productService,
        CounterService $counterService
    )
    {
        $productValue = ProductValue::create($request->all());
        $product = $productService->getProductById($productValue->product_ids_id);
        if ($product){
            $code = $counterService->generateCodeForProduct($product->category);
            $productValue->update([
                'code' => $code,
            ]);
        }
        if ($request->input('image', false)) {
            $productValue->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $productValue->id]);
        }

        return redirect()->route('admin.product-values.index');
    }

    public function edit(ProductValue $productValue)
    {
        abort_if(Gate::denies('product_value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product_ids = Product::pluck('name_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $colors = Color::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sizes = Size::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $productValue->load('product_ids', 'color', 'size');

        return view('admin.productValues.edit', compact('colors', 'productValue', 'product_ids', 'sizes'));
    }

    public function update(UpdateProductValueRequest $request, ProductValue $productValue)
    {
        $productValue->update($request->all());

        if ($request->input('image', false)) {
            if (! $productValue->image || $request->input('image') !== $productValue->image->file_name) {
                if ($productValue->image) {
                    $productValue->image->delete();
                }
                $productValue->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($productValue->image) {
            $productValue->image->delete();
        }

        return redirect()->route('admin.product-values.index');
    }

    public function show(ProductValue $productValue)
    {
        abort_if(Gate::denies('product_value_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productValue->load('product_ids', 'color', 'size');

        return view('admin.productValues.show', compact('productValue'));
    }

    public function destroy(ProductValue $productValue)
    {
        abort_if(Gate::denies('product_value_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $productValue->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductValueRequest $request)
    {
        $productValues = ProductValue::find(request('ids'));

        foreach ($productValues as $productValue) {
            $productValue->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_value_create') && Gate::denies('product_value_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ProductValue();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
