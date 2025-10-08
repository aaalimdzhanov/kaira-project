<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySizeRequest;
use App\Http\Requests\StoreSizeRequest;
use App\Http\Requests\UpdateSizeRequest;
use App\Models\Category;
use App\Models\Size;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SizeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('size_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sizes = Size::with(['category_ids'])->get();

        return view('admin.sizes.index', compact('sizes'));
    }

    public function create()
    {
        abort_if(Gate::denies('size_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_ids = Category::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sizes.create', compact('category_ids'));
    }

    public function store(StoreSizeRequest $request)
    {
        $size = Size::create($request->all());

        return redirect()->route('admin.sizes.index');
    }

    public function edit(Size $size)
    {
        abort_if(Gate::denies('size_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category_ids = Category::pluck('title_uz', 'id')->prepend(trans('global.pleaseSelect'), '');

        $size->load('category_ids');

        return view('admin.sizes.edit', compact('category_ids', 'size'));
    }

    public function update(UpdateSizeRequest $request, Size $size)
    {
        $size->update($request->all());

        return redirect()->route('admin.sizes.index');
    }

    public function show(Size $size)
    {
        abort_if(Gate::denies('size_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $size->load('category_ids');

        return view('admin.sizes.show', compact('size'));
    }

    public function destroy(Size $size)
    {
        abort_if(Gate::denies('size_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $size->delete();

        return back();
    }

    public function massDestroy(MassDestroySizeRequest $request)
    {
        $sizes = Size::find(request('ids'));

        foreach ($sizes as $size) {
            $size->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
