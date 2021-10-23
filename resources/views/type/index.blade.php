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
    <table class="table table-striped">

        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Description </th>
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
        {{-- {!! $tasks->appends(Request::except('page'))->render() !!} --}}


    </div>
    @endsection
