@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.item.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.items.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nom">{{ trans('cruds.item.fields.nom') }}</label>
                <input class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" type="text" name="nom" id="nom" value="{{ old('nom', '') }}" required>
                @if($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.nom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.item.fields.champs') }}</label>
                <select class="form-control {{ $errors->has('champs') ? 'is-invalid' : '' }}" name="champs" id="champs" required>
                    <option value disabled {{ old('champs', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Item::CHAMPS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('champs', 'text') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('champs'))
                    <span class="text-danger">{{ $errors->first('champs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.champs_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="valeur">{{ trans('cruds.item.fields.valeur') }}</label>
                <textarea class="form-control {{ $errors->has('valeur') ? 'is-invalid' : '' }}" name="valeur" id="valeur">{{ old('valeur') }}</textarea>
                @if($errors->has('valeur'))
                    <span class="text-danger">{{ $errors->first('valeur') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.item.fields.valeur_helper') }}</span>
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