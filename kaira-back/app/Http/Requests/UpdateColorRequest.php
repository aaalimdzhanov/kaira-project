<?php

namespace App\Http\Requests;

use App\Models\Color;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateColorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('color_edit');
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
                'min:7',
                'max:7',
                'required',
            ],
        ];
    }
}
