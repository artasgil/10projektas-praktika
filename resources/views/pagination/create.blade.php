@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Pagination') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('pagination.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="paginaton_title"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Paginaton title') }}</label>

                                <div class="col-md-6">
                                    <input id="paginaton_title" type="text" class="form-control" name="paginaton_title"
                                        autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paginaton_value"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Paginaton value') }}</label>

                                <div class="col-md-6">
                                    <input id="paginaton_value" type="text" class="form-control" name="paginaton_value"
                                        autofocus>
                                </div>
                            </div>


                            <div class="form-group row">
                                    <label class="col-md-4 text-md-right" for="inlineCheckbox1">Visible</label>
                                    <div class="col-md-6">
                                  <input type="hidden" name="paginaton_visible" value="0"/>
                                    <input name="paginaton_visible" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1">
                                  </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
