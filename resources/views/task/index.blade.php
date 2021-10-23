@extends('layouts.app')


@section('content')
<div class="container">

    <form action="{{route('task.index')}}" method="GET">
        @csrf

        <select name="collumnName">
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
        </select>

        <select name="sortby">
            @if ($sortby == 'asc')
            <option value="asc" selected>ASC</option>
            <option value="desc">DESC</option>
            @else
            <option value="asc">ASC</option>
            <option value="desc" selected>DESC</option>
            @endif
        </select>

        <select class="form-control" name="type_id">
            @foreach ($types as $type)
            <option value="{{$type->id}}" @if ($type_id == $type->id) selected @endif>{{$type->title}}</option>
            @endforeach
        </select>
        <button type="submit">Sort</button>
        </form>

        <form action="{{route('task.index')}}" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Enter search key"/>
            <button type="submit">Search</button>
        </form>

        <td>
            <a href="{{route('task.index')}}" name="clear" class="btn btn-secondary">Clear filter </a>
        </td>

    {{-- <form action="{{route('task.index')}}" method="GET">
    <select class="form-control" name="type_id">
        @foreach ($types as $type)
        <option value="{{$type->id}}" @if ($type_id == $type->id) selected @endif>{{$type->title}}</option>
    @endforeach
    </select>
    <button type="submit">Filter</button>
</form> --}}


    <table class="table table-striped">

    <tr>
        <th> ID </th>
        <th> Title </th>
        <th> Description </th>
        <th> Type </th>
        <th> Action </th>
        <th> Action </th>
        <th> Action </th>

    </tr>

    @foreach ($tasks as $task)
    <tr>
        <td>{{$task->id}} </td>
        <td>{{$task->title}} </td>
        <td>{!! $task->description !!} </td>
        <td>{{$task->taskType->title}}</td>
        <td>
            <a href="{{route('task.show',[$task])}}" class="btn btn-secondary">Show </a>
        </td>
        <td>
            <a href="{{route('task.edit',[$task])}}" class="btn btn-primary">Edit </a>
        </td>
        <td>
            <form method="post" action={{route('task.destroy',[$task])}}>
                @csrf
                <button type="submit" class="btn btn-danger">DELETE</button>
            </form>
        </td>
    @endforeach
    </table>
    {{-- {{$tasks->links()}} --}}
    {!! $tasks->appends(Request::except('page'))->render() !!}




</div>
@endsection
