@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.config.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.configs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.config.fields.id') }}
                        </th>
                        <td>
                            {{ $config->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.config.fields.nom') }}
                        </th>
                        <td>
                            {{ $config->nom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.config.fields.gabarit') }}
                        </th>
                        <td>
                            @foreach($config->gabarits as $key => $gabarit)
                                <span class="label label-info">{{ $gabarit->nom }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.configs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection