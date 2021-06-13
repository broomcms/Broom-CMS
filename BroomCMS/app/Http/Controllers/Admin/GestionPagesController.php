<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Item;
use App\Models\Gabarit;
use App\Models\GestionPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreGestionPageRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\UpdateGestionPageRequest;
use App\Http\Requests\MassDestroyGestionPageRequest;

class GestionPagesController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('gestion_page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GestionPage::with(['gabarit', 'parent'])->select(sprintf('%s.*', (new GestionPage)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'gestion_page_show';
                $editGate      = 'gestion_page_edit';
                $deleteGate    = 'gestion_page_delete';
                $crudRoutePart = 'gestion-pages';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('nom', function ($row) {
                return $row->nom ? $row->nom : "";
            });
            $table->addColumn('gabarit_nom', function ($row) {
                return $row->gabarit ? $row->gabarit->nom : '';
            });

            $table->addColumn('parent_nom', function ($row) {
                return $row->parent ? $row->parent->nom : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'gabarit', 'parent']);

            return $table->make(true);
        }

        return view('admin.gestionPages.index');
    }

    public function create()
    {
        abort_if(Gate::denies('gestion_page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gabarits = Gabarit::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = GestionPage::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.gestionPages.create', compact('gabarits', 'parents'));
    }

    public function store(StoreGestionPageRequest $request)
    {
        $gestionPage = GestionPage::create($request->all());

        return redirect()->route('admin.gestion-pages.index');
    }

    public function edit(GestionPage $gestionPage)
    {
        abort_if(Gate::denies('gestion_page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gabarits = Gabarit::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = GestionPage::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $gestionPage->load('gabarit', 'parent');
        $page = $gestionPage->get()[0];

        $formulaire = Gabarit::find($page->gabarit_id)->items()->get();

        foreach($formulaire as $k=>$v){
            $datas[] = $v->id;
        }

        return view('admin.gestionPages.edit', compact('gabarits', 'parents', 'gestionPage', 'datas'));
    }

    public function update(UpdateGestionPageRequest $request, GestionPage $gestionPage)
    {

        // Page data preparation
        $json = json_encode($request->pageData);
        $gestionPage->update(array_merge($request->all(), ['pageData' => $json]));

        return redirect()->route('admin.gestion-pages.index');
    }

    public function show(GestionPage $gestionPage)
    {
        abort_if(Gate::denies('gestion_page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gestionPage->load('gabarit', 'parent', 'parentGestionPages');

        return view('admin.gestionPages.show', compact('gestionPage'));
    }

    public function destroy(GestionPage $gestionPage)
    {
        abort_if(Gate::denies('gestion_page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gestionPage->delete();

        return back();
    }

    public function massDestroy(MassDestroyGestionPageRequest $request)
    {
        GestionPage::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
