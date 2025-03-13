@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h2>Trang chủ >> Collection</h2>
    <div class="container">
        <p>Lọc</p>  
        <p>Khoảng giá</p>
        <p>69 Sản phẩm Collection Corner</p>
        <p>Mới nhất</p>
    </div>
</div>

<h1>BỘ SƯU TẬP</h1>
<div class="container">
    <div class="row">
        @foreach($collections as $collection)
        <div class="col-md-4">
            <div class="card mb-3">
                <img src="{{ asset('images/' . $collection['image']) }}" class="card-img-top img-fluid" alt="{{ $collection['name'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $collection['name'] }}</h5>
                    <a href="{{ route('collection.show', ['id' => $collection['id']]) }}" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
