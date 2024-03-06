@extends('templates.default')

@php
    $title = 'Data';
    $preTitle = 'Edit Author';
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.update', $author->id) }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name"
                        class="form-control @error('name')
                            is-invalid
                        @enderror"
                        name="example-text-input" placeholder="Enter Name" value="{{ old('name') ?? $author->name }}">
                    @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Photo</label>
                    <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                        name="example-text-input" placeholder="Add Photo" value="{{ old('photo') }}">
                    @error('photo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection