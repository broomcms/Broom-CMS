@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gabarit.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gabarits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gabarit.fields.id') }}
                        </th>
                        <td>
                            {{ $gabarit->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gabarit.fields.nom') }}
                        </th>
                        <td>
                            {{ $gabarit->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gabarit.fields.items') }}
                        </th>
                        <td>
                            @foreach($gabarit->items as $key => $items)
                                <span class="label label-info">{{ $items->nom }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gabarits.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#gabarit_gestion_pages" role="tab" data-toggle="tab">
                {{ trans('cruds.gestionPage.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#gabarit_configs" role="tab" data-toggle="tab">
                {{ trans('cruds.config.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="gabarit_gestion_pages">
            @includeIf('admin.gabarits.relationships.gabaritGestionPages', ['gestionPages' => $gabarit->gabaritGestionPages])
        </div>
        <div class="tab-pane" role="tabpanel" id="gabarit_configs">
            @includeIf('admin.gabarits.relationships.gabaritConfigs', ['configs' => $gabarit->gabaritConfigs])
        </div>
    </div>
</div>

@endsection