@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.menu.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.menus.update", [$menu->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="titre">{{ trans('cruds.menu.fields.titre') }}</label>
                <input class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" type="text" name="titre" id="titre" value="{{ old('titre', $menu->titre) }}" required>
                @if($errors->has('titre'))
                    <span class="text-danger">{{ $errors->first('titre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.titre_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.menu.fields.target') }}</label>
                @foreach(App\Models\Menu::TARGET_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('target') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="target_{{ $key }}" name="target" value="{{ $key }}" {{ old('target', $menu->target) === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="target_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('target'))
                    <span class="text-danger">{{ $errors->first('target') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.target_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.menu.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $menu->url) }}">
                @if($errors->has('url'))
                    <span class="text-danger">{{ $errors->first('url') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parent_id">{{ trans('cruds.menu.fields.parent') }}</label>
                <select class="form-control select2 {{ $errors->has('parent') ? 'is-invalid' : '' }}" name="parent_id" id="parent_id">
                    @foreach($parents as $id => $parent)
                        <option value="{{ $id }}" {{ (old('parent_id') ? old('parent_id') : $menu->parent->id ?? '') == $id ? 'selected' : '' }}>{{ $parent }}</option>
                    @endforeach
                </select>
                @if($errors->has('parent'))
                    <span class="text-danger">{{ $errors->first('parent') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.parent_helper') }}</span>
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