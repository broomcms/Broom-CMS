@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.gestionPage.title_singular') }}
    </div>

    <form method="POST" action="{{ route("admin.gestion-pages.update", [$gestionPage->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf

        <div class="card-body">
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.gestionPage.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', $gestionPage->nom) }}" required>
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gestionPage.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gabarit_id">{{ trans('cruds.gestionPage.fields.gabarit') }}</label>
                <select class="form-control select2 {{ $errors->has('gabarit') ? 'is-invalid' : '' }}" name="gabarit_id" id="gabarit_id">
                    @foreach($gabarits as $id => $gabarit)
                        <option value="{{ $id }}" {{ (old('gabarit_id') ? old('gabarit_id') : $gestionPage->gabarit->id ?? '') == $id ? 'selected' : '' }}>{{ $gabarit }}</option>
                    @endforeach
                </select>
                @if($errors->has('gabarit'))
                    <span class="text-danger">{{ $errors->first('gabarit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gestionPage.fields.gabarit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent_id">{{ trans('cruds.gestionPage.fields.parent') }}</label>
                <select class="form-control select2 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id">
                    @foreach($parents as $id => $parent)
                        <option value="{{ $id }}" {{ (old('parent_id') ? old('parent_id') : $gestionPage->parent->id ?? '') == $id ? 'selected' : '' }}>{{ $parent }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gestionPage.fields.parent_helper') }}</span>
            </div>
            @foreach($datas as $field_type=>$field)
                {!! Controller::field_creation($field, $errors, $gestionPage) !!}
            @endforeach
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </div>
    </form>
</div>



@endsection
