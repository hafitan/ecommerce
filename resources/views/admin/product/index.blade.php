@extends('layouts.master')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Product</h1>
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
                    <form method="POST" action="{{ route('product.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Product</label>
                            <input type="name" class="form-control" name="name">
                            @error('name')
                              <span class="text-danger">Field ini tidak boleh kosong</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" class="form-control" name="stock" min="0">
                            @error('stock')
                              <span class="text-danger">Field ini tidak boleh kosong</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" min="0">
                            @error('price')
                              <span class="text-danger">Field ini tidak boleh kosong</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select type="name" class="form-control" name="category">
                                <option selected disabled value=""><--- Pilih ---></option>
                                @foreach($category as $key => $c)
                                <option value="{{ $c->category_product}}">{{ $c->category_product }}</option>
                                @endforeach
                                @error('category')
                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                @enderror
                            </select>
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
                    <td width="400px">Name</td>
                    <td>Stock</td>
                    <td>Price</td>
                    <td width="200px">Category</td>
                    <td colspan="2" width="100pxs">Action</td>
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
                    <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Ubah</a></td>
                    <td>
                        <form  action="{{ route('product.destroy', $p->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
<<<<<<< HEAD
                    </td> 
                    <div class="modal fade" id="modalUpdate{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('product.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Product</label>
                                <input type="name" class="form-control" name="name" value="{{ $p->name }}" >
                                @error('name')
                                  <span class="text-danger">Field ini tidak boleh kosong</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stock</label>
                                <input type="number" class="form-control" name="stock" min="0" value="{{ $p->stock }}" >
                                @error('stock')
                                  <span class="text-danger">Field ini tidak boleh kosong</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" min="0" value="{{ $p->price }}" >
                                @error('price')
                                  <span class="text-danger">Field ini tidak boleh kosong</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select type="name" class="form-control" name="category" required>
                                    <option selected disabled value="{{ $p->category }}">--{{ $p->category }}--</option>
                                    @foreach($category as $key => $c)
                                        <option value="{{ $c->category_product }}">{{ $c->category_product }}</option>
                                    @endforeach
                                @error('category')
                                  <span class="text-danger">Field ini tidak boleh kosong</span>
                                @enderror
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                            </div>
                        </div>
                        </div>
=======
                        <div class="modal fade" id="modalUpdate{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('product.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label class="form-label">Category</label>
                                                <input type="name" class="form-control" name="name" value="{{ $p->name }}" required>
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
                        </div>
                    </td>
>>>>>>> 160f99776de84ca79ee29383bd0c3e2a97e6cd81
                </tr>
                    @endforeach
            </table>
        </div>

    </main>
</div>

@endsection
