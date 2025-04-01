@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Trang chủ >> Blindbox</h2>
    <div class="container">
        <p>Lọc</p>  
        <p>Khoảng giá</p>
        <p>69 Sản phẩm Blindbox Corner</p>
        <p>Mới nhất</p>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($blindboxes as $box)
        <div class="col-md-3">
            <div class="card mb-3">
                <img src="{{ asset('images/' . $box['image']) }}" class="card-img-top img-fluid" alt="{{ $box['name'] }} ">
                <div class="card-body">
                    <h5 class="card-title">{{ $box['name'] }}</h5>
                    <p class="card-text">Giá: {{ $box['price'] }}</p>
                    <a href="{{ route('blindbox.show', $box['id']) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection