<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Material;
use App\Models\Product;
use App\Models\Season;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('product_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $products = Product::with(['material', 'brand', 'season', 'country', 'category', 'media'])->get();

        $materials = Material::get();

        $brands = Brand::get();

        $seasons = Season::get();

        $countries = Country::get();

        $categories = Category::get();

        return view('admin.products.index', compact('brands', 'categories', 'countries', 'materials', 'products', 'seasons'));
    }

    public function create()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materials = Material::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = Brand::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seasons = Season::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('brands', 'categories', 'countries', 'materials', 'seasons'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());

        if ($request->input('image', false)) {
            $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $product->id]);
        }

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_if(Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $materials = Material::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $brands = Brand::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $seasons = Season::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = Category::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('material', 'brand', 'season', 'country', 'category');

        return view('admin.products.edit', compact('brands', 'categories', 'countries', 'materials', 'product', 'seasons'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        if ($request->input('image', false)) {
            if (! $product->image || $request->input('image') !== $product->image->file_name) {
                if ($product->image) {
                    $product->image->delete();
                }
                $product->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($product->image) {
            $product->image->delete();
        }

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_if(Gate::denies('product_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->load('material', 'brand', 'season', 'country', 'category');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_if(Gate::denies('product_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        $products = Product::find(request('ids'));

        foreach ($products as $product) {
            $product->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('product_create') && Gate::denies('product_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Product();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
