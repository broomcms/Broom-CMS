@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.config.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.configs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.config.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.config.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gabarits">{{ trans('cruds.config.fields.gabarit') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('gabarits') ? 'is-invalid' : '' }}" name="gabarits[]" id="gabarits" multiple required>
                    @foreach($gabarits as $id => $gabarit)
                        <option value="{{ $id }}" {{ in_array($id, old('gabarits', [])) ? 'selected' : '' }}>{{ $gabarit }}</option>
                    @endforeach
                </select>
                @if($errors->has('gabarits'))
                    <span class="text-danger">{{ $errors->first('gabarits') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.config.fields.gabarit_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection