@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Type') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('type.update', [$type]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="type_title"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Type title') }}</label>

                                <div class="col-md-6">
                                    <input id="type_title" type="text" class="form-control @error('type_title') is-invalid @enderror" name="type_title" value="{{$type->title}}"
                                        autofocus>
                                        @error('type_title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type_description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Type description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="summernote @error('type_description') is-invalid @enderror" cols="38" rows="5"
                                        name="type_description">{{$type->description}}</textarea>
                                        @error('type_description')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote();
        });
    </script>
@endsection
