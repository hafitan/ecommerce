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
    </main>
</div>
@endsection
