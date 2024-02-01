@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">New project</h2>

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <form class="mt-5" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image" name="cover_image">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <img id="preview-img" src="" alt="" style="max-height: 250px">
            </div>

            <div class="mb-3 has-validation">
                <label for="type">Select type</label>
                <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type">
                    <option @selected(!old('type_id')) value="">No type</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="mb-3 has-validation">
                <h4>Select technologies</h4>

                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input type="checkbox" name="technologies[]" id="technology-{{ $technology->id }}" value="{{ $technology->id }}" @checked(in_array($technology->id, old('technologies', [])))>
                        <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach

                @error('technologies')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-success" type="submit">Save</button>
            <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>

        </form>
    </div>
@endsection
