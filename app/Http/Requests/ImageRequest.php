<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules()
    {
        return [
            'post_id' => ['required', 'exists:posts'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
