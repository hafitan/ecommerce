@extends('')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Cart</h1>
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
            <div>
            <button type="button" class="btn btn-primary mb-3" style="margin-left: 0px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle">Tambah</i>
            </button>
            <br><br>
            <div>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{ route('category.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <input type="name" class="form-control" name="category_product" required>
                            @error('category')
                              <span class="text-danger">Field ini tidak boleh kosong</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <table class="table table-success table-striped">
                <tr>
                    <td>NO</td>
                    <td>name</td>
                    <td>qty</td>
                    <td>price</td>
                    <td>total harga</td>
                    <td>category</td>
                    <td>date</td>
                    <td>status</td>
                    <td colspan="2" width="100px">Action</td>
                </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($chart as $key => $p)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->qty}}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->total }}</td>
                    <td>{{ $p->category }}</td>
                    <td>{{ $p->date }}</td>
                    <td>{{ $p->status }}</td>
                    <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Ubah</a></td>
                    <td>
                        <form  action="{{ route('charts.destroy', $p->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                        <div class="modal fade" id="modalUpdate{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('charts.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="name" class="form-control" name="category_product" value="{{ $p->category_product }}" required>
                                                @error('category')
                                                    <span class="text-danger">Field ini tidak boleh kosong</span>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </td>
                </tr>
                         @endforeach
            </table>
            </table>
        </div>

    </main>
</div>

@endsection
