@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Task') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('task.update', [$task]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="task_title"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task title') }}</label>

                                <div class="col-md-6">
                                    <input id="task_title" type="text" class="form-control" name="task_title" value="{{$task->title}}"
                                        autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="task_description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task description') }}</label>

                                <div class="col-md-6">
                                    <textarea class="summernote" cols="38" rows="5"
                                        name="task_description"> {{$task->description}} </textarea>
                                </div>
                            </div>

                            <div class="form-group row">

                                <label for="task_logo"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task Logo') }}</label>
                                <div class="col-md-6">
                                    <input id="imageurl" type="file" class="form-control" name="task_logo">
                                    {{-- <img src="{{$task->logo}}" alt="{{task->title}}" width="300" height="300"> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="task_type"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Task type') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="type_id">
                                        @foreach ($types as $type)
                                        <option value="{{$type->id}}"@if($task->type_id == $type->id) selected @endif >{{$type->title}}</option>
                                    @endforeach
                                    </select>
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
