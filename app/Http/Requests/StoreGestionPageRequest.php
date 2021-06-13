<?php

namespace App\Http\Requests;

use App\Models\GestionPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGestionPageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gestion_page_create');
    }

    public function rules()
    {
        return [
            'nom' => [
                'string',
                'required',
            ],
        ];
    }
}
