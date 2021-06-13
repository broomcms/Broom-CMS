@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.commande.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commandes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.commande.fields.id') }}
                        </th>
                        <td>
                            {{ $commande->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commande.fields.client') }}
                        </th>
                        <td>
                            {{ $commande->client->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commande.fields.produits') }}
                        </th>
                        <td>
                            @foreach($commande->produits as $key => $produits)
                                <span class="label label-info">{{ $produits->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.commande.fields.statut') }}
                        </th>
                        <td>
                            {{ App\Models\Commande::STATUT_SELECT[$commande->statut] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.commandes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection