<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGabaritRequest;
use App\Http\Requests\UpdateGabaritRequest;
use App\Http\Resources\Admin\GabaritResource;
use App\Models\Gabarit;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GabaritApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gabarit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GabaritResource(Gabarit::with(['items'])->get());
    }

    public function store(StoreGabaritRequest $request)
    {
        $gabarit = Gabarit::create($request->all());
        $gabarit->items()->sync($request->input('items', []));

        return (new GabaritResource($gabarit))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Gabarit $gabarit)
    {
        abort_if(Gate::denies('gabarit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GabaritResource($gabarit->load(['items']));
    }

    public function update(UpdateGabaritRequest $request, Gabarit $gabarit)
    {
        $gabarit->update($request->all());
        $gabarit->items()->sync($request->input('items', []));

        return (new GabaritResource($gabarit))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Gabarit $gabarit)
    {
        abort_if(Gate::denies('gabarit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gabarit->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
