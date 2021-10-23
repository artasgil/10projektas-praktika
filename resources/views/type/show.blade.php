@extends('layouts.app')

@section("content")
    <div class="container">

        <h2>{{$type->id}}. {{$type->title}}</h2>
        <p>Type description : {!!$type->description!!}</p>
    </div>
@endsection
