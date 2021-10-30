@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create owner') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('owner.update', [$owner]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="owner_name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Owner name') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_name" type="text" class="form-control" name="owner_name" value="{{$owner->name}}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_surname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Owner surname') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_surname" type="text" class="form-control" name="owner_surname" value="{{$owner->surname}}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Owner email') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_email" type="text" class="form-control" name="owner_email" value="{{$owner->email}}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owner_phone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Owner phone') }}</label>

                                <div class="col-md-6">
                                    <input id="owner_phone" type="text" class="form-control" name="owner_phone" value="{{$owner->phone}}" autofocus>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
