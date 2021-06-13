<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGabaritRequest;
use App\Http\Requests\StoreGabaritRequest;
use App\Http\Requests\UpdateGabaritRequest;
use App\Models\Gabarit;
use App\Models\Item;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GabaritController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('gabarit_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gabarits = Gabarit::all();

        return view('admin.gabarits.index', compact('gabarits'));
    }

    public function create()
    {
        abort_if(Gate::denies('gabarit_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::all()->pluck('nom', 'id');

        return view('admin.gabarits.create', compact('items'));
    }

    public function store(StoreGabaritRequest $request)
    {
        $gabarit = Gabarit::create($request->all());
        $gabarit->items()->sync($request->input('items', []));

        return redirect()->route('admin.gabarits.index');
    }

    public function edit(Gabarit $gabarit)
    {
        abort_if(Gate::denies('gabarit_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $items = Item::all()->pluck('nom', 'id');

        $gabarit->load('items');

        return view('admin.gabarits.edit', compact('items', 'gabarit'));
    }

    public function update(UpdateGabaritRequest $request, Gabarit $gabarit)
    {
        $gabarit->update($request->all());
        $gabarit->items()->sync($request->input('items', []));

        return redirect()->route('admin.gabarits.index');
    }

    public function show(Gabarit $gabarit)
    {
        abort_if(Gate::denies('gabarit_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gabarit->load('items', 'gabaritGestionPages', 'gabaritConfigs');

        return view('admin.gabarits.show', compact('gabarit'));
    }

    public function destroy(Gabarit $gabarit)
    {
        abort_if(Gate::denies('gabarit_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gabarit->delete();

        return back();
    }

    public function massDestroy(MassDestroyGabaritRequest $request)
    {
        Gabarit::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
