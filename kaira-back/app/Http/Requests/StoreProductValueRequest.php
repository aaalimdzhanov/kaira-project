<?php

namespace App\Http\Requests;

use App\Models\ProductValue;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProductValueRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('product_value_create');
    }

    public function rules()
    {
        return [
            'product_ids_id' => [
                'required',
                'integer',
            ],
            'price' => [
                'required',
            ],
            'initial_price' => [
                'required',
            ],
            'discount' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'discount_start' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'discount_end' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'stock' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'color_id' => [
                'required',
                'integer',
            ],
            'size_id' => [
                'required',
                'integer',
            ],
            'image' => [
                'required',
            ],
        ];
    }
}
