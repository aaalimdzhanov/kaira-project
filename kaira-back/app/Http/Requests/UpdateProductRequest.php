<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'name_ru' => [
                'string',
                'required',
            ],
            'name_uz' => [
                'string',
                'required',
            ],
            'description_ru' => [
                'string',
                'required',
            ],
            'description_uz' => [
                'string',
                'required',
            ],
            'image' => [
                'required',
            ],
            'material_id' => [
                'required',
                'integer',
            ],
            'brand_id' => [
                'required',
                'integer',
            ],
            'season_id' => [
                'required',
                'integer',
            ],
            'country_id' => [
                'required',
                'integer',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
