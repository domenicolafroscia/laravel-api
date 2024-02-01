@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Edit project: {{ $project->title }}</h2>

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 has-validation">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 has-validation">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" name="content">{{ old('content', $project->content) }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
                    name="cover_image" value="{{ old('cover_image', $project->cover_image) }}">
                @error('cover_image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="image-preview mb-3">
                @if ($project->cover_image)
                    <img src="{{ asset('Storage/' . $project->cover_image) }}" alt="">
                @endif
            </div>

            <div class="mb-3">
                <img id="preview-img" src="" alt="" style="max-height: 250px">
            </div>

            <div class="mb-3">
                <label for="type">Select type</label>
                <select class="form-select" name="type_id" id="type">
                    <option @selected(!old('type_id', $project->type_id)) value="">No type</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-3">
                <h4>Select technologies</h4>

                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input type="checkbox" value="{{ $technology->id }}" name="technologies[]" id="technology-{{ $technology->id }}" @checked($errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology))>
                        <label for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

            <div class="actions">
                <button class="btn btn-warning" type="submit">Save</button>
                <a class="btn btn-danger" href="{{ url()->previous() }}">Back</a>
            </div>
        </form>
    </div>
@endsection

