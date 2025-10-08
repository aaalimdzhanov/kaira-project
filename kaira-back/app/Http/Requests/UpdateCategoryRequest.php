<?php

namespace App\Http\Requests;

use App\Models\Category;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('category_edit');
    }

    public function rules()
    {
        return [
            'title_ru' => [
                'string',
                'required',
            ],
            'title_uz' => [
                'string',
                'required',
            ],
            'key' => [
                'string',
                'required',
            ],
        ];
    }
}
