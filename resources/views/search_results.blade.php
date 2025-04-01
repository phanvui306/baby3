@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Kết quả tìm kiếm</h2>
    <p>Bạn đã tìm kiếm: <strong>{{ $query }}</strong></p>
</div>
@endsection