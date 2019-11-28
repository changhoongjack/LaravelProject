<?php

namespace App\Http\Requests;

use App\Content;
//use App\Storybooklibrary;
use App\ToMark;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApproveRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('tomark_edit');
    }

    public function rules()
    {
        return [
            'Comments'    => [
                'required',
            ],
            
        ];
    }
}