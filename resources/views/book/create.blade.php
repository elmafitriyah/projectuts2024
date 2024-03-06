@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Add Books";
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('book.index') }}" class="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <select name="author_id" id="" class="form-control">
                       <option disabled value>The Author</option>
                       @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                       @endforeach
                    </select>
                    @error('author_id')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control 
                        @error('title')
                            is-invalid
                        @enderror" 
                    name="title" placeholder="Add Book Title" value="{{ old('title') }}">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label"></label>
                    <input type="file" class="form-control 
                    @error('cover')
                        is-invalid
                    @enderror" 
                name="cover" placeholder="Add Cover" value="{{ old('cover') }}">
                    @error('cover')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number" class="form-control 
                        @error('year')
                            is-invalid
                        @enderror" 
                    name="year" placeholder="Add Book Year" value="{{ old('year') }}">
                        @error('year')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Publisher</label>
                    <select name="publisher_id" id="" class="form-control">
                       <option disabled value>The Publisher</option>
                       @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                       @endforeach
                    </select>
                    @error('publisher_id')
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