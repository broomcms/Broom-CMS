<?php

namespace App\Http\Requests;

use App\Models\ItemContent;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyItemContentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('item_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:item_contents,id',
        ];
    }
}
