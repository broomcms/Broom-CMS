<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCrmCustomerRequest;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;
use App\Models\CrmCustomer;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CrmCustomerController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('crm_customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CrmCustomer::with(['utilisateur'])->select(sprintf('%s.*', (new CrmCustomer)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'crm_customer_show';
                $editGate      = 'crm_customer_edit';
                $deleteGate    = 'crm_customer_delete';
                $crudRoutePart = 'crm-customers';

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
            $table->editColumn('first_name', function ($row) {
                return $row->first_name ? $row->first_name : "";
            });
            $table->editColumn('last_name', function ($row) {
                return $row->last_name ? $row->last_name : "";
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : "";
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : "";
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : "";
            });
            $table->editColumn('skype', function ($row) {
                return $row->skype ? $row->skype : "";
            });
            $table->editColumn('website', function ($row) {
                return $row->website ? $row->website : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->addColumn('utilisateur_name', function ($row) {
                return $row->utilisateur ? $row->utilisateur->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'utilisateur']);

            return $table->make(true);
        }

        return view('admin.crmCustomers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('crm_customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilisateurs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmCustomers.create', compact('utilisateurs'));
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        $crmCustomer = CrmCustomer::create($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function edit(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $utilisateurs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmCustomer->load('utilisateur');

        return view('admin.crmCustomers.edit', compact('utilisateurs', 'crmCustomer'));
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
        $crmCustomer->update($request->all());

        return redirect()->route('admin.crm-customers.index');
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->load('utilisateur', 'clientCommandes');

        return view('admin.crmCustomers.show', compact('crmCustomer'));
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmCustomerRequest $request)
    {
        CrmCustomer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
