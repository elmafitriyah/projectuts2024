@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Publisher List";
@endphp

@push('page-action')
    <a href="{{ route('publisher.create') }}" class="btn btn-primary">New Data</a>
@endpush

@section('content')

<div class="card">
    <div class="table-responsive">
      <table class="table table-vcenter card-table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Address</th>
            <th class="w-1"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($publishers as $publisher)
          <tr>
            <td>{{ $publisher->name }}</td>
            <td class="text-secondary">{{ $publisher->address }}</td>
            <td>
                <a href="{{ route('publisher.edit', $publisher->id) }}" class="btn btn-info btn-sm">Edit</a>
                <form action="{{ route('publisher.destroy',$publisher->id) }}" method="post">
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