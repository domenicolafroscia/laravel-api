@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>Hello {{ Auth::user()->name }}! Welcome to your portfolio.</h2>
                        <p>Your email is {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
