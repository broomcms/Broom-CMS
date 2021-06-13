<?php

namespace App\Http\Requests;

use App\Models\ItemContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreItemContentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('item_content_create');
    }

    public function rules()
    {
        return [
            'page_id' => [
                'required',
                'integer',
            ],
            'item_id' => [
                'required',
                'integer',
            ],
            'name' => [
                'string',
                'required',
            ],
            'value' => [
                'string',
                'required',
            ],
            'label' => [
                'string',
                'nullable',
            ],
        ];
    }
}
