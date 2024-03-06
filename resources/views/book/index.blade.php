@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Book List";
@endphp

@push('page-action')
  
    <a href="{{ route('book.create') }}" class="btn btn-primary">New Data</a>
@endpush


@section('content')
<form action="{{ url('/search') }}" type="get">
  <input type="search" class="form-control" name="search" placeholder="Type to search...">
<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Author Name</th>
            <th>Title</th>
            <th>Cover</th>
            <th>Year</th>
            <th>Publisher</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
        @foreach ($books as $book)
            <tr>
                <td>{{ $book->author->name }}</td>
                <td>{{ $book->title }}</td>
                <td><img src="{{ asset('storage/' . $book->cover) }}" alt="" height="150px"></td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->publisher->name }}</td>
                <td>
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-info btn-sm">Edit</a>
                    <form action="{{ route('book.destroy',$book->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                    </form>
                </td>   
            </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection