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
                <div class="col-md-8">
                    <div class="container text-center">
                        <div class="row">
                        @foreach ($product as $p)
                                <div class="col-4 mb-3">
                                    <div class="card" style="width:200px; height : 350px;">
                                        <img class="card-img img-fluid" style="height: 200px ; width: 290px;"
                                            src="{{ asset('public/image/' . $p->image) }}" alt="Card image cap"
                                            id="product-detail">
                                        {{-- <div class="card-body"> --}}
                                        <br>
                                        <h5 class="card-title">{{ $p->name }}</h5>
                                        {{-- <p class="card-text">{!! $p->desc !!}</p> --}}
                                        <p>stock : {!! $p->stock !!}</p>
                                        <form action="{{ route('admin.order.store') }}" method="post"></form>
                                        <a href="{{ route('admin.order.store') }}"
                                            style="width: 100px; position:absolute; right:46px; top:300px;"
                                            class="btn btn-primary"> beli</a>
                                        {{-- </div> --}}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>
                <div class="col-md-4 border border-dark" style="background-color: white; border-radius : 5%;" border-color:black;>
                    <br>
                    <h6 class="text-center">halaman daftar beli</h6>
                </div>
            </div>
        </main>
    </div>
@endsection
