@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Deleted projects</h2>

        <a class="btn btn-primary" href="{{ route('admin.projects.index') }}">Projects list</a>

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        @if (count($projects) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Deletion date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->deleted_at }}</td>
                            <td>

                                <form class="d-inline-block"
                                    action="{{ route('admin.projects.defDestroy', ['id' => $project->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-delete" type="submit" data-title="{{ $project->title }}"><i class="fa-solid fa-trash"></i></button>
                                </form>

                                <form class="d-inline-block"
                                    action="{{ route('admin.projects.restore', ['id' => $project->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary" type="submit"><i class="fa-solid fa-trash-can-arrow-up"></i></button>
                                </form>


                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-5">
                <h2>The trash is empty</h2>
            </div>
        @endif


        @include('partials.delete-modal')
    </div>
@endsection
