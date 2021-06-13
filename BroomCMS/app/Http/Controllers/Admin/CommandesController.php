<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCommandeRequest;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\Commande;
use App\Models\CrmCustomer;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('commande_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commandes = Commande::all();

        return view('admin.commandes.index', compact('commandes'));
    }

    public function create()
    {
        abort_if(Gate::denies('commande_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $produits = Product::all()->pluck('name', 'id');

        return view('admin.commandes.create', compact('clients', 'produits'));
    }

    public function store(StoreCommandeRequest $request)
    {
        $commande = Commande::create($request->all());
        $commande->produits()->sync($request->input('produits', []));

        return redirect()->route('admin.commandes.index');
    }

    public function edit(Commande $commande)
    {
        abort_if(Gate::denies('commande_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::all()->pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $produits = Product::all()->pluck('name', 'id');

        $commande->load('client', 'produits');

        return view('admin.commandes.edit', compact('clients', 'produits', 'commande'));
    }

    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        $commande->update($request->all());
        $commande->produits()->sync($request->input('produits', []));

        return redirect()->route('admin.commandes.index');
    }

    public function show(Commande $commande)
    {
        abort_if(Gate::denies('commande_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commande->load('client', 'produits');

        return view('admin.commandes.show', compact('commande'));
    }

    public function destroy(Commande $commande)
    {
        abort_if(Gate::denies('commande_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $commande->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommandeRequest $request)
    {
        Commande::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
