@extends('layouts.app')


@section('content')
<div class="container">
    <div class="form-row">
        <div class="form-group col">
        <a href="{{route('pagination.create')}}" class="btn btn-success">Add paginaton</a>
        </div>
    </div>

    <table class="table table-striped">

        <tr>
            <th> ID </th>
            <th> Title </th>
            <th> Value </th>
            <th> Visible </th>
            <th> Action </th>
            <th> Action </th>
            <th> Action </th>

        </tr>

        @foreach ($paginationsettings as $paginationsetting)
        <tr>
            <td>{{$paginationsetting->id}} </td>
            <td>{{$paginationsetting->title}} </td>
            <td>{{$paginationsetting->value}} </td>
            <td>@if($paginationsetting->visible == 1) YES @else NO @endif </td>
            <td>
                <a href="{{route('pagination.show',[$paginationsetting])}}" class="btn btn-secondary">Show </a>
            </td>
            <td>
                <a href="{{route('pagination.edit',[$paginationsetting])}}" class="btn btn-primary">Edit </a>
            </td>
            <td>
                <form method="post" action={{route('pagination.destroy',[$paginationsetting])}}>
                    @csrf
                    <button type="submit" class="btn btn-danger">DELETE</button>
                </form>
            </td>
        @endforeach
        </table>

    </div>
    @endsection
