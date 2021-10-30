@extends('layouts.app')


@section('content')
    <div class="container">

        <form action="{{ route('task.index') }}" method="GET">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <select class="form-control" name="collumnName">
                        @if ($collumnName == 'id')
                            <option value="id" selected>ID</option>
                        @else
                            <option value="id">ID</option>
                        @endif

                        @if ($collumnName == 'title')
                            <option value="title" selected>Title</option>
                        @else
                            <option value="title">Title</option>
                        @endif

                        @if ($collumnName == 'description')
                            <option value="description" selected>Description</option>
                        @else
                            <option value="description">Description</option>
                        @endif

                        @if ($collumnName == 'type_id')
                            <option value="type_id" selected>Type ID</option>
                        @else
                            <option value="type_id">Type ID</option>
                        @endif
                        @if ($collumnName == 'owner_id')
                        <option value="owner_id" selected>Owner name and surname</option>
                    @else
                        <option value="owner_id">Owner name and surname</option>
                    @endif
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <select class="form-control " name="sortby">
                        @if ($sortby == 'asc')
                            <option value="asc" selected>ASC</option>
                            <option value="desc">DESC</option>
                        @else
                            <option value="asc">ASC</option>
                            <option value="desc" selected>DESC</option>
                        @endif
                    </select>
                </div>

                <div class="form-group col-md-2">
                    <select class="form-control" name="type_id">
                        <option value="all" @if ($type_id == 'all') selected @endif > Visi </option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" @if ($type_id == $type->id) selected @endif>{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-2">
                    <select class="form-control" name="paginatonsetting">
                        @foreach ($paginatonsettings as $paginatonsetting)
                        @if ($paginatonsetting->visible == 1) <option value="{{$paginatonsetting->value }}" @if ($defaultLimit == $paginatonsetting->value) selected @endif>{{ $paginatonsetting->title }}
                            </option> @endif
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Sort</button>
                </div>
            </div>
        </form>


        <form action="{{ route('task.index') }}" method="GET">
            @csrf
            <div class="form-row">
            <div class="form-group col-3">
            <input class="form-control" type="text" name="search" placeholder="Enter search key" />
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-info">Search</button>
            </div>
        </form>
            <div class="form-group col-3">
            <a  href="{{ route('task.index') }}" name="clear" class="btn btn-info">Clear filter </a>
            </div>
        </div>

        {{-- <form action="{{ route('task.index') }}" method="GET">
            <div class="form-row">
            <div class="form-group col-3">
                <select class="form-control" name="paginatonsetting">
                    @foreach ($paginatonsettings as $paginatonsetting)
                    @if ($paginatonsetting->visible == 1) <option value="{{$paginatonsetting->value }}" @if ($defaultLimit == $paginatonsetting->value) selected @endif>{{ $paginatonsetting->title }}
                        </option> @endif
                    @endforeach
                </select>
        </div>
        <div class="form-group col-9">
            <button type="submit" class="btn btn-info">Set pagination</button>
        </div>
    </div>
        </form> --}}
        <div class="form-row">
            <div class="form-group col">
            <a href="{{route('task.create')}}" class="btn btn-success">Add task</a>
            </div>
        </div>


        <table class="table table-striped">

            <tr>
                <th> ID </th>
                <th> Title </th>
                <th>Owner name and surname</th>
                <th> Description </th>
                <th> Type </th>
                <th> Start date </th>
                <th> End date </th>
                <th> Action </th>
                <th> Action </th>
                <th> Action </th>

            </tr>

            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }} </td>
                    <td>{{ $task->title }} </td>
                    <td>{{ $task->ownerType->name}} {{ $task->ownerType->surname}}</td>
                    <td>{!! $task->description !!} </td>
                    <td>{{ $task->taskType->title }}</td>
                    <td>{{ $task->start_date }} </td>
                    <td>{{ $task->end_date }} </td>
                    <td>
                        <a href="{{ route('task.show', [$task]) }}" class="btn btn-secondary">Show </a>
                    </td>
                    <td>
                        <a href="{{ route('task.edit', [$task]) }}" class="btn btn-primary">Edit </a>
                    </td>
                    <td>
                        <form method="post" action={{ route('task.destroy', [$task]) }}>
                            @csrf
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
            @endforeach
        </table>


        {{-- {{$tasks->links()}} --}}

        @if ($paginatonsettingg != 1)
            {!! $tasks->appends(Request::except('page'))->render() !!}
        @endif



    </div>
@endsection
