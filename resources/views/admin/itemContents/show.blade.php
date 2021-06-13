@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.itemContent.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.itemContent.fields.id') }}
                        </th>
                        <td>
                            {{ $itemContent->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemContent.fields.page') }}
                        </th>
                        <td>
                            {{ $itemContent->page->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemContent.fields.item') }}
                        </th>
                        <td>
                            {{ $itemContent->item->nom ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemContent.fields.name') }}
                        </th>
                        <td>
                            {{ $itemContent->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemContent.fields.value') }}
                        </th>
                        <td>
                            {{ $itemContent->value }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.itemContent.fields.label') }}
                        </th>
                        <td>
                            {{ $itemContent->label }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.item-contents.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection