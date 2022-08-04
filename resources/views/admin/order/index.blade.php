@extends('layouts.master',['level' => 'ADMIN'])

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data order</h2>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('gagal'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>name</th>
            <th>category</th>
            <th>qty</th>
            <th>date</th>
            <th>price</th>
            <th>status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($order as $oba)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $oba->name }}</td>
            <td>{{ $oba->category }}</td>
            <td>{{ $oba->qty }}</td>
            <td>{{ $oba->date }}</td>
            <td>{{ $oba->price }}</td>
            <td>{{ $oba->status }}</td>
            <td>
                <form action="{{ route('order.destroy',$oba->id) }}" method="POST">

                    <button type="button" class="btn btn-md btn-outline-warning" data-toggle="modal" data-target="#staticBackdrop{{$oba->id}}">
                        Edit Data   <i class="fas fa-pen"></i>
                      </button>
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin ingin menghapus {{ $oba->nama_merk }}?')">Delete <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach

@endsection

