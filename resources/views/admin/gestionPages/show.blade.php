@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.gestionPage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gestion-pages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.gestionPage.fields.id') }}
                        </th>
                        <td>
                            {{ $gestionPage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gestionPage.fields.nom') }}
                        </th>
                        <td>
                            {{ $gestionPage->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gestionPage.fields.gabarit') }}
                        </th>
                        <td>
                            {{ $gestionPage->gabarit->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.gestionPage.fields.parent') }}
                        </th>
                        <td>
                            {{ $gestionPage->parent->nom ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gestion-pages.index') }}">
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
            <a class="nav-link" href="#parent_gestion_pages" role="tab" data-toggle="tab">
                {{ trans('cruds.gestionPage.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="parent_gestion_pages">
            @includeIf('admin.gestionPages.relationships.parentGestionPages', ['gestionPages' => $gestionPage->parentGestionPages])
        </div>
    </div>
</div>

@endsection