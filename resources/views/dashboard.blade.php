





@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <!-- Page Header -->
        <div class="row">
            <div class="col-12">
                <h2 class="font-weight-bold text-dark">
                    {{ __('Últimos Festivales') }}
                </h2>
            </div>
        </div>

        <!-- Page Content -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-lg rounded-lg">
                    <div class="card-body">
                        <x-welcome />
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
