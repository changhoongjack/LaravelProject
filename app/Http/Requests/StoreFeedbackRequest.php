<?php

namespace App\Http\Requests;

use App\Feedback;
use Illuminate\Foundation\Http\FormRequest;

class StoreFeedbackRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('feedback_create');
    }

    public function rules()
    {
        return [
            'Issue' => [
                'required',
            ],
        ];
    }
}
