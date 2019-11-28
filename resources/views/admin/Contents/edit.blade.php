@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.product.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.Contents.update", [$content->ProductionID]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('ProductionID') ? 'has-error' : '' }}">
                <label for="name">{{ trans('Production ID') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('ProductionID', isset($content) ? $content->ProductionID : '') }}">
                @if($errors->has('ProductionID'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ProductionID') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection