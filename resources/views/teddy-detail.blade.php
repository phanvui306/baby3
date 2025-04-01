@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="mt-4 col-md-6">
            <img src="{{ asset('images/' . $teddy['image']) }}" class="img-fluid" alt="{{ $teddy['name'] }}">
        </div>
    
        <div class="mt-4 col-md-6">
            <h2>{{ $teddy['name'] }}</h2>
            <p>{{ $teddy['description'] }}</p>
            <p>Giá: {{ $teddy['price'] }}</p>
            <a href="{{ route('teddy') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>
@endsection