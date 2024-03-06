@extends('templates.default')

@php
    $preTitle = "Data";
    $title = "Add Author";
@endphp

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('publisher.index') }}" class="" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Publisher Name</label>
                    <input type="text" class="form-control 
                        @error('name')
                            is-invalid
                        @enderror" 
                    name="name" placeholder="Add Pubsliher Name" value="{{ old('name') }}">
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
                name="address" placeholder="Add Pubsliher Address" value="{{ old('address') }}">
                    @error('address')
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