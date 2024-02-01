@extends('layouts.admin')

@section('content')
    <div class="container mt-5">

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <h2>{{ $type->title }}</h2>

        <p>
            Type: {{ $type->name }}
        </p>
        
        <div class="mt-4">
            Data: {{ $type->created_at }}
        </div>

        <div class="mt-4">
            Slug: {{ $type->slug }}
        </div>


        <a class="btn btn-primary" href="{{ route('admin.types.index') }}">Types list</a>


    </div>
@endsection
