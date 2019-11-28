<?php

namespace App\Http\Requests;

use App\Storybooklibrary;
use App\ToMark;
use Illuminate\Foundation\Http\FormRequest;

class StoreApproveRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('tomark_create');
    }

    public function rules()
    {
        return [
            'Comments' => [
                'required',
            ],
        ];
    }
}
