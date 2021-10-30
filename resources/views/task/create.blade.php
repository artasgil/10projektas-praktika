@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('task.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="task_title"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task title') }}</label>

                                <div class="col-md-6">
                                    <input id="company_title" type="text" class="form-control @error('task_title') is-invalid @enderror" name="task_title" autofocus>
                                        @error('task_title')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="summernote @error('task_description') is-invalid @enderror" cols="38" rows="5"
                                        name="task_description"> </textarea>
                                        @error('task_description')
                                        <span role="alert" class="invalid-feedback">
                                            <strong>*{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="task_logo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task Logo') }}</label>
                                <div class="col-md-6">
                                    <input id="imageurl" type="file" class="form-control @error('task_logo') is-invalid @enderror" name="task_logo">
                                    @error('task_logo')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="task_type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('type_id') is-invalid @enderror" name="type_id">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('type_id')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="owner_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Owner ID') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control @error('owner_id') is-invalid @enderror" name="owner_id">
                                        @foreach ($owners as $owner)
                                            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('owner_id')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="task_start_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task start date') }}</label>

                                <div class="col-md-6">
                                    <input id="task_start_date" type="datetime-local" class="form-control  @error('task_start_date') is-invalid @enderror" name="task_start_date" autofocus>
                                    @error('task_start_date')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="task_end_date"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task end date') }}</label>

                                <div class="col-md-6">
                                    <input id="task_end_date" type="datetime-local" class="form-control @error('task_end_date') is-invalid @enderror" name="task_end_date" autofocus>
                                    @error('task_end_date')
                                    <span role="alert" class="invalid-feedback">
                                        <strong>*{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
