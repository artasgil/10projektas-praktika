@extends('layouts.app')


@section('content')
<div class="container">
    <div class="form-row">
        <div class="form-group col">
        <a href="{{route('owner.create')}}" class="btn btn-success">Add owner</a>
        </div>
    </div>
    <table class="table table-striped">

        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Surname </th>
            <th> Email </th>
            <th> Phone </th>
            <th> Action </th>
            <th> Action </th>
            <th> Action </th>

        </tr>

        @foreach ($owners as $owner)
        <tr>
            <td> {{$owner->id}} </td>
            <td> {{$owner->name}} </td>
            <td> {{$owner->surname }} </td>
            <td> {{$owner->email }} </td>
            <td> {{$owner->phone }} </td>
            <td>
                <a href="{{route('owner.show',[$owner])}}" class="btn btn-secondary">Show </a>
            </td>
            <td>
                <a href="{{route('owner.edit',[$owner])}}" class="btn btn-primary">Edit </a>
            </td>
            <td>
                <form method="post" action={{route('owner.destroy',[$owner])}}>
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
        @endforeach
        </table>

    </div>
    @endsection
