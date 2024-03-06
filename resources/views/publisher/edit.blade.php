@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Edit Publisher";
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('publisher.update',$publisher->id) }}" class="" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Publisher Name</label>
                    <input type="text" class="form-control 
                        @error('name')
                            is-invalid
                        @enderror" 
                        name="name" placeholder="Edit Pubsliher Name" value="{{ old('name') ?? $publisher->name }}">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                <div class="mb-3">
                    <label class="form-label">Publisher Address</label>
                    <input type="text" class="form-control
                        @error('address')
                            is-invalid
                        @enderror" 
                    name="address"  value ="{{ old('address') ?? $publisher->address }}">
                        @error('name')
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