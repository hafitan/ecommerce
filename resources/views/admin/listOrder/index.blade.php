@extends('layouts.master')
@section('content')
    <div class="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1>List Order</h1>
            </div>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Admin E-Commerce</li>
            </ol>
            <table class="table table-success table-striped">
                <tr>
                    <td>NO</td>
                    <td>name</td>
                    <td>Category</td>
                    <td>qty</td>
                    <td>price</td>
                    <td>total</td>
                    <td>note</td>
                    <td>address</td>
                    <td>shipping</td>
                    <td>payment</td>
                    <td>date</td>
                    <td>status</td>
                    {{-- <td colspan="2" width="100px">Action</td> --}}
                </tr>
                @php
                    $i = 0;
                @endphp
                @foreach($listOrder as $key => $o)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $o->name }}</td>
                        <td>{{ $o->category }}</td>
                        <td>{{ $o->qty }}</td>
                        <td>{{ $o->price }}</td>
                        <td>{{ $o->total }}</td>
                        <td>{{ $o->note }}</td>
                        <td>{{ $o->adress }}</td>
                        <td>{{ $o->shipping }}</td>
                        <td>{{ $o->payment }}</td>
                        <td>{{ $o->date }}</td>
                        <td>{{ $o->status }}</td>
                    </tr>
                @endforeach
            </table>
        </main>
    </div>
@endsection
