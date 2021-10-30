@extends('layouts.app')

@section("content")
    <div class="container">

        <h2>{{$owner->id}}. {{$owner->name}} {{$owner->surname}}</h2>
        <p>Owner e-mail: {{$owner->email}}</p>
        <p>Owner phone: {{$owner->phone}} </p>
    </div>
@endsection
