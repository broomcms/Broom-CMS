<?php

namespace App\Http\Requests;

use App\Models\GestionPage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGestionPageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gestion_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gestion_pages,id',
        ];
    }
}
