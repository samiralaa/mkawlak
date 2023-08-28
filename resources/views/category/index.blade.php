@extends('layout.main')

@section('main')
    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

    <div class="row">
        <div class="col-12 col-lg-12 col-xxl-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header">
                    <a href="{{ route('categories.create') }}" class="btn btn-success">Create Categiry</a>
                </div>
                <table class="table table-hover my-0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th class="d-none d-xl-table-cell">Created At</th>
                            <th class="d-none d-xl-table-cell">Updated At</th>
                            <th colspan="2" class="d-none d-md-table-cell text-center">Assignee</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td class="d-none d-xl-table-cell">{{ $category->created_at }}</td>
                                <td class="d-none d-xl-table-cell">{{ $category->updated_at }}</td>
                                <td><a href="{{ route('categories.edit', $category->id) }}"
                                        class="btn btn-success">Update</a></td>
                                <td><a href="{{ route('categories.destroy', $category->id) }}"
                                        class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
