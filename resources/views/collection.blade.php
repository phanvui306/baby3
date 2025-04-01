@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="mt-4 col-md-6">
            <img src="{{ asset('images/' . $collection['image']) }}" class="img-fluid" alt="{{ $collection['name'] }}">
        </div>
        <div class="mt-4 col-md-6">
            <h2>{{ $collection['name'] }}</h2>
            <p>{{ $collection['description'] }}</p>
            <a href="{{ route('collection-dashboard') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection
