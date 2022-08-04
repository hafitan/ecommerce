@extends('layouts.master')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Product</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Admin E-Commerce</li>
            </ol>
            <table class="table table-success table-striped">
                <tr>
                    <td>NO</td>
                    <td>Name</td>
                    <td>Stock</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td colspan="2">Action</td>
                </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($product as $key => $p)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $p->name }}</td>      
                    <td>{{ $p->stock}}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->category }}</td>
                    <td><a type="button" class="btn btn-primary"><i class="bi bi-pen"></a></td>
                    <td>
                        {{--<form  action="{{ route('#', $p->id) }}" method="POST">
                          @csrf
                          @method('DELETE')--}}
              
                          <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td> 
                </tr>
                    @endforeach
            </table>
        </div>

    </main>
</div>

@endsection
