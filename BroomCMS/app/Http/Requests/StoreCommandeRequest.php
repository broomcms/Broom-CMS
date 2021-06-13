<?php

namespace App\Http\Requests;

use App\Models\Commande;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCommandeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('commande_create');
    }

    public function rules()
    {
        return [
            'client_id'  => [
                'required',
                'integer',
            ],
            'produits.*' => [
                'integer',
            ],
            'produits'   => [
                'required',
                'array',
            ],
            'statut'     => [
                'required',
            ],
        ];
    }
}
