@extends('layouts.master')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Order</h1>
                @if ($message = Session::get('success'))
                    <br><br>
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @if ($message = Session::get('danger'))
                    <br><br>
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Halaman Admin E-Commerce</li>
                </ol>
            </div>
            <div class="row">
                {{-- <div class="col-md-8">
                    <div class="container text-center">
                        <div class="row">
                        @foreach ($product as $p)
                                <div class="col-4 mb-3">c
                                    <div class="card" style="width:200px; height : 350px;">
                                        <img class="card-img img-fluid" style="height: 200px ; width: 290px;"
                                            src="{{ asset('public/image/' . $p->image) }}" alt="Card image cap"
                                            id="product-detail">
                                        <div class="card-body">
                                            <br>
                                            <h5 class="card-title">{{ $p->name }}</h5>
                                            <p class="card-text">{!! $p->desc !!}</p>
                                            <p>stock : {!! $p->stock !!}</p>
                                            <form action="{{ route('admin.order.store') }}" method="post"></form>
                                            <a href="{{ route('admin.order.store') }}"
                                            style="width: 100px; position:absolute; right:46px; top:300px;"
                                            class="btn btn-primary btn-submit"> beli</a>
                                        </div>
                                        <button class="simpan" data-id="{{ $p->id }}"data-name="{{ $p->name }}">beli</button>
                                    </div>
                                </div>
                                <form action=""></form>
                                @endforeach
                            </div>
                    </div>
                </div> --}}
                <form action="{{ route('admin.order.store') }}" method="post">
                    @csrf
                    <div class="col-md-8">
                        <div class="container text-center">
                            <div class="row">
                                @foreach ($product as $key => $pro)
                                    <div class="col-5 mb-5">
                                        <div class="card" style="padding:11px;">
                                            <img class="card-img img-fluid" style="height: 200px ; width: 290px;"
                                            src="{{ asset('public/image/' . $pro->image) }}" alt="Card image cap"
                                            id="product-detail">
                                            <div class="card-body"style="">
                                                <input type="text" name="id" id="id{{ $key+1 }}" data-id="{{ $key+1 }}" hidden>
                                                <input type="text" class="card-title bg-light card" name="name" disabled id="name{{ $key+1 }}" data-name="{{ $pro->name }}" value="{{ $pro->name }}">
                                                <input type="text" class="card-text bg-light card" name="qty" id="qty{{ $key+1 }}" data-qty="{{ $pro->stock }}" value="{{ $pro->stock }}" disabled>
                                                <input type="text" class="card-text bg-light card" name="price" id="price{{ $key+1 }}" data-price="{{ $pro->price }}" value="{{ $pro->price }}" disabled>
                                                <div class="card-body"style=""><button type="submit" class="btn btn-primary submit" data-id="{{ $key+1 }}">beli</button></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-2 md-4 border border-dark" style="background-color: white; border-radius : 5%;" border-color:black;>
                                    <br>
                                    <h6 class="text-center">halaman daftar beli</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
@endsection

@push('skrip')
   <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {

    $("form").submit(function (event) {
        var index = $(".submit").index(this)

        let id = $('input[name="id"]').attr('id')
        let id_name = $('input[name="name"]').attr('name')
        let id_qty = $('input[name="qty"]').attr('qty')
        let id_price = $('input[name="price"]').attr('price')

        let formData = {
            id: id,
            name: id_name,
            qty: id_qty,
            price: id_price,
        };

        console.log(formData);

        $.ajax({
            type: "POST",
            url: "{{ route('admin.order.store') }}",
            data: formData,
            dataType: "json",
            encode: true,
            }).done(function (data) {
            console.log(data);
        });

        event.preventDefault();
    });
});
    </script>
@endpush
