@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Project List</h2>

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="text-end">
            <a class="btn btn-primary" href="{{ route('admin.projects.create') }}">New Project</a>
        </div>

        @if (count($projects) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Creation date</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id }}</th>
                            <td>{{ $project->title }}</td>
                            <td>{{ $project->created_at }}</td>
                            <td>

                                <a class="btn btn-success"
                                    href="{{ route('admin.projects.show', ['project' => $project->slug]) }}"><i
                                        class="fa-solid fa-info"></i></a>
                                <a class="btn btn-warning"
                                    href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}"><i
                                        class="fa-solid fa-pencil"></i></a>
                                <form class="d-inline-block"
                                    action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-5">
                <h2>There's no project yet, start creating one!</h2>
            </div>
        @endif


    </div>
@endsection
