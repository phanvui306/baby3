@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Trang chủ >> Tedy</h2>
    <div class="container">
        <p>Lọc</p>  
        <p>Khoảng giá</p>
        <p>69 Sản phẩm Teddy Corner</p>
        <p>Mới nhất</p>
    </div>
</div>

<div class="container">
    <div class="row">
        @foreach($teddies as $ted)
        <div class="col-md-3">
            <div class="card mb-3">
                <img src="{{ asset('images/' . $ted['image']) }}" class="card-img-top img-fluid" alt="{{ $ted['name'] }} ">
                <div class="card-body">
                    <h5 class="card-title">{{ $ted['name'] }}</h5>
                    <p class="card-text">Giá: {{ $ted['price'] }}</p>
                    <a href="{{ route('teddy.show', $ted['id']) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection