<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     *peraturan untuk request
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
            {
                return [
                    'name' => ['required', 'max:255', 'unique:categories'],
                    'category_id' => ['nullable'],
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => ['required', 'max:255', 'unique:categories,name,'.$this->route()->category->id],
                    'category_id' => ['nullable'],
                ];
            }
            default: break;
        }
    }
}
