@extends('layouts.app')


@section('content')
<div class="container">
    @if(session()->has('error_message'))
    <div class="alert alert-danger">
    {{session()->get("error_message")}}
    </div>
    @endif

    @if(session()->has('sucess_message'))
    <div class="alert alert-success">
    {{session()->get("sucess_message")}}
    </div>
    @endif

    <form action="{{route('type.index')}}" method="GET">
        @csrf
        <div class="form-row">
        <div class="form-group col-3">
        <input class="form-control" type="text" name="search" placeholder="Enter search key"/>
        </div>
        <div class="form-group">
        <button class="btn btn-info" type="submit">Search</button>
        </div>
    </form>
    <div class="form-group col-3">
        <a href="{{route('type.index')}}" name="clear" class="btn btn-info">Clear filter </a>
    </div>
</div>
<div class="form-row">
    <div class="form-group col">
    <a href="{{route('type.create')}}" class="btn btn-success">Add type</a>
    </div>
</div>

    <table class="table table-striped">

        <tr>
            <th> @sortablelink('id', 'ID') </th>
            <th> @sortablelink('title', 'Title') </th>
            <th> @sortablelink('description', 'Description') </th>
            <th> Action </th>
            <th> Action </th>
            <th> Action </th>

        </tr>

        @foreach ($types as $type)
        <tr>
            <td>{{$type->id}} </td>
            <td>{{$type->title}} </td>
            <td>{!! $type->description !!} </td>
            <td>
                <a href="{{route('type.show',[$type])}}" class="btn btn-secondary">Show </a>
            </td>
            <td>
                <a href="{{route('type.edit',[$type])}}" class="btn btn-primary">Edit </a>
            </td>
            <td>
                <form method="post" action={{route('type.destroy',[$type])}}>
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
        @endforeach
        </table>
        {{-- {{$tasks->links()}} --}}
        {!! $types->appends(Request::except('page'))->render() !!}


    </div>
    @endsection
