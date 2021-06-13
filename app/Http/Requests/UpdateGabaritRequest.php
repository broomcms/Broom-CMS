<?php

namespace App\Http\Requests;

use App\Models\Gabarit;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGabaritRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gabarit_edit');
    }

    public function rules()
    {
        return [
            'nom'     => [
                'string',
                'required',
            ],
            'items.*' => [
                'integer',
            ],
            'items'   => [
                'array',
            ],
        ];
    }
}
