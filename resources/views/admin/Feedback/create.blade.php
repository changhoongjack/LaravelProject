@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Feedback
    </div>

    <div class="card-body">
        <form action="{{ route("admin.Feedback.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Issues*</label>
                <input type="text" id="name" name="Issue" class="form-control" value="{{ old('Issue', isset($feedback) ? $feedback->Issue : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('Description') ? 'has-error' : '' }}">
                <label for="Description">Description</label>
                <textarea id="Description" name="Description" class="form-control ">{{ old('Description', isset($feedback) ? $feedback->Description : '') }}</textarea>
                @if($errors->has('Description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('Description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.description_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('Rating') ? 'has-error' : '' }}">
                <label for="price">Rating</label>
                <input type="number" id="price" name="Rating" class="form-control" value="{{ old('Rating', isset($feedback) ? $feedback->Rating : '') }}" >
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.price_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection