@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Author List";
@endphp

@push('page-action')
    <a href="{{ route('author.create') }}" class="btn btn-primary">New Data</a>
@endpush

@section('content')

<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Photo</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($authors as $author)
          <tr>
            <td>{{ $author->name }}</td>
            <td>
                <img src="{{ asset('storage/' . $author->photo) }}" alt="" height="100px">
            </td>
            <td>
                <a href="{{ route('author.edit', $author->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('author.destroy',$author->id) }}" method="post">
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