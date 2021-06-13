<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGestionPageRequest;
use App\Http\Requests\UpdateGestionPageRequest;
use App\Http\Resources\Admin\GestionPageResource;
use App\Models\GestionPage;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GestionPagesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gestion_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GestionPageResource(GestionPage::with(['gabarit', 'parent'])->get());
    }

    public function store(StoreGestionPageRequest $request)
    {
        $gestionPage = GestionPage::create($request->all());

        return (new GestionPageResource($gestionPage))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(GestionPage $gestionPage)
    {
        abort_if(Gate::denies('gestion_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new GestionPageResource($gestionPage->load(['gabarit', 'parent']));
    }

    public function update(UpdateGestionPageRequest $request, GestionPage $gestionPage)
    {
        $gestionPage->update($request->all());

        return (new GestionPageResource($gestionPage))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(GestionPage $gestionPage)
    {
        abort_if(Gate::denies('gestion_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gestionPage->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
