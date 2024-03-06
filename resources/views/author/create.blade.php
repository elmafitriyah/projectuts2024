@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Add Author";
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('author.index') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Author Name</label>
                    <input type="text" class="form-control 
                        @error('name')
                            is-invalid
                        @enderror" 
                    name="name" placeholder="Add Author Name" value="{{ old('name') }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Author Photo</label>
                    <input type="file" class="form-control 
                    @error('photo')
                        is-invalid
                    @enderror" 
                name="photo" placeholder="Add Photo" value="{{ old('photo') }}">
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