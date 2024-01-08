@extends('layouts.template')
@section('content')
<div class="container mt-3">
    <form action="{{ route('kasir.order.store') }}" method="post" class="card m-auto p-5">
    @csrf
    @if ($errors->any())
    <ul class="alert alert-danger p-3">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    @if (Session::get('failed'))
    <div class="alert alert-danger">{{ $message }}</div>
    @endif

    <div class="mb-3 row">
        <label for="name_customer" class="col-sm-2 col-form-label">Nama Pembeli</label>
        <div class="col-sm-10"><input type="text" name="name_customer" id="name_customer" class="form-control"></div>
    </div>
    <div class="mb-3 row">
        <label for="medicine" class="col-sm-2 col-form-label">Obat</label>
        <div class="col-sm-10">
            <select name="medicines[]" id="medicines" class="form-select">>
            <option selected hidden disabled>Pesanan 1</option>
            @foreach ($medicines as $item )
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach
            </select>
            <div class="wrap-medicines"></div>
            <br>
            <p class="text-primary" id="add-select" style="cursor: pointer">+ tambah obat</p>
        </div>
    </div>
    <button type="submit" class="btn btn-block btn-lg btn-primary">Konfirmasi Pembelian</button>
    </form>
</div>
@endsection
@push('script')
<script>
    let no = 2;
    $('#add-select').on('click', function (){
        let el = `<br><select name="medicines[]" id="medicines" class="form-select">
            <option selected hidden disabled>Pesanan ${no}</option>
            @foreach ($medicines as $item)
            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
            @endforeach</select>`
            
            $('.wrap-medicines').append(el)
            no++
    })
    </script>    
@endpush












