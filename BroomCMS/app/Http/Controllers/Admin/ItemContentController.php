<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyItemContentRequest;
use App\Http\Requests\StoreItemContentRequest;
use App\Http\Requests\UpdateItemContentRequest;
use App\Models\GestionPage;
use App\Models\Item;
use App\Models\ItemContent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ItemContentController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('item_content_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ItemContent::with(['page', 'item'])->select(sprintf('%s.*', (new ItemContent())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'item_content_show';
                $editGate = 'item_content_edit';
                $deleteGate = 'item_content_delete';
                $crudRoutePart = 'item-contents';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('page_nom', function ($row) {
                return $row->page ? $row->page->nom : '';
            });

            $table->addColumn('item_nom', function ($row) {
                return $row->item ? $row->item->nom : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('value', function ($row) {
                return $row->value ? $row->value : '';
            });
            $table->editColumn('label', function ($row) {
                return $row->label ? $row->label : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'page', 'item']);

            return $table->make(true);
        }

        return view('admin.itemContents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('item_content_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = GestionPage::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = Item::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itemContents.create', compact('pages', 'items'));
    }

    public function store(StoreItemContentRequest $request)
    {
        $itemContent = ItemContent::create($request->all());

        return redirect()->route('admin.item-contents.index');
    }

    public function edit(ItemContent $itemContent)
    {
        abort_if(Gate::denies('item_content_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = GestionPage::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $items = Item::all()->pluck('nom', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itemContent->load('page', 'item');

        return view('admin.itemContents.edit', compact('pages', 'items', 'itemContent'));
    }

    public function update(UpdateItemContentRequest $request, ItemContent $itemContent)
    {
        $itemContent->update($request->all());

        return redirect()->route('admin.item-contents.index');
    }

    public function show(ItemContent $itemContent)
    {
        abort_if(Gate::denies('item_content_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemContent->load('page', 'item');

        return view('admin.itemContents.show', compact('itemContent'));
    }

    public function destroy(ItemContent $itemContent)
    {
        abort_if(Gate::denies('item_content_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itemContent->delete();

        return back();
    }

    public function massDestroy(MassDestroyItemContentRequest $request)
    {
        ItemContent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
