<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone' => ['required', 'string', 'regex:/^998[0-9]{9}$/'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.id' => ['required', 'integer', 'exists:product_values,id'],
            'items.*.qty' => ['required', 'integer', 'min:1'],
            'items.*.gift_wrap' => ['nullable', 'boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Номер телефона обязателен.',
            'phone.regex' => 'Номер телефона должен быть в правильном формате.',
            'items.required' => 'Корзина не может быть пустой.',
            'items.*.id.exists' => 'Указанный товар не найден.',
            'items.*.qty.min' => 'Количество должно быть не меньше 1.',
            'items.*.gift_wrap.boolean' => 'Поле подарочной упаковки должно быть true или false.',
        ];
    }
}
