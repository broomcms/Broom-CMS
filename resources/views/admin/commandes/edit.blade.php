@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.commande.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.commandes.update", [$commande->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="client_id">{{ trans('cruds.commande.fields.client') }}</label>
                <select class="form-control select2 {{ $errors->has('client') ? 'is-invalid' : '' }}" name="client_id" id="client_id" required>
                    @foreach($clients as $id => $client)
                        <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $commande->client->id ?? '') == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('client'))
                    <span class="text-danger">{{ $errors->first('client') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.commande.fields.client_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="produits">{{ trans('cruds.commande.fields.produits') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('produits') ? 'is-invalid' : '' }}" name="produits[]" id="produits" multiple required>
                    @foreach($produits as $id => $produits)
                        <option value="{{ $id }}" {{ (in_array($id, old('produits', [])) || $commande->produits->contains($id)) ? 'selected' : '' }}>{{ $produits }}</option>
                    @endforeach
                </select>
                @if($errors->has('produits'))
                    <span class="text-danger">{{ $errors->first('produits') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.commande.fields.produits_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.commande.fields.statut') }}</label>
                <select class="form-control {{ $errors->has('statut') ? 'is-invalid' : '' }}" name="statut" id="statut" required>
                    <option value disabled {{ old('statut', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Commande::STATUT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('statut', $commande->statut) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('statut'))
                    <span class="text-danger">{{ $errors->first('statut') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.commande.fields.statut_helper') }}</span>
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