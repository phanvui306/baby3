@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="mt-4 col-md-6">
            <img src="{{ asset('images/' . $blindbox['image']) }}" class="img-fluid" alt="{{ $blindbox['name'] }}">
        </div>
    
        <div class="mt-4 col-md-6">
            <h2>{{ $blindbox['name'] }}</h2>
            <p>{{ $blindbox['description'] }}</p>
            <p>Giá: {{ $blindbox['price'] }}</p>
            <a href="{{ route('blindbox') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection