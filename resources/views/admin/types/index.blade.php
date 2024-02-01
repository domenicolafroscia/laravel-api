@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Types</h2>

        @if (count($types) > 0)
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id }}</th>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->slug }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('admin.types.show', ['type' => $type->slug]) }}"><i
                                        class="fa-solid fa-info"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning mt-5">
                <h2>No type present</h2>
            </div>
        @endif

    </div>
@endsection
