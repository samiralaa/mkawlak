@extends('layout.main')

@section('main')
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Create Category</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Categore Name</h5>
                </div>
                <form action="{{ route('categories.update', $category->id) }}" method="Post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Name Category" value="{{ $category->name }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary m-2">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
