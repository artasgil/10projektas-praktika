@extends('layouts.app')

@section("content")
    <div class="container">

        <h2>Paginaton ID: {{$paginatonsetting->id}}</h2>
        <p>Paginaton title: {{$paginatonsetting->title}} </p>
        <p>Paginaton value: {{$paginatonsetting->value}}</p>
        <p>Is visible:  @if($paginatonsetting->visible == 1) YES @else NO @endif </p>
    </div>
@endsection
