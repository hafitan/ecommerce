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
            <div>
            {{-- button add --}}
            <button type="button" class="btn btn-primary mb-3" style="margin-left: 0px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle">Tambah</i>
            </button>

            {{-- add modal --}}
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Product</label>
                                    <select name="product_id" class="form-control" id="" required>
                                        <option value="">-- Pilih --</option>
                                        @foreach ($product as $p)
                                            <option value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('name')
                                    <span class="text-danger">Field ini tidak boleh kosong</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">qty</label>
                                    <input type="number" class="form-control" name="qty" min="1" required>
                                    @error('qty')
                                        <span class="text-danger">Field ini tidak boleh kosong</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Category</label>
                                    <select type="name" class="form-control" name="category" required>
                                        <option selected disabled value=""><--- Pilih ---></option>
                                        @foreach($category as $key => $c)
                                            <option value="{{ $c->category_product }}" @if($p->category == $c->category_product)selected @endif>{{ $c->category_product }}</option>
                                        @endforeach
                                        @error('category')
                                            <span class="text-danger">Field ini tidak boleh kosong</span>
                                        @enderror
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">status</label>
                                    <select name="status" class="form-control" id="" required>
                                        <option value="">-- Pilih --</option>
                                        <option value="bayar">bayar</option>
                                        <option value="belum bayar">belum bayar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <table class="table table-success table-striped">
                <tr>
                    <td>NO</td>
                    <td>name</td>
                    <td>qty</td>
                    <td>price</td>
                    <td>category</td>
                    <td>date</td>
                    <td>image</td>
                    <td>status</td>
                    <td colspan="2" width="100px">Action</td>
                </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($order as $key => $p)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->qty}}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->category }}</td>
                    <td>{{ $p->date }}</td>
                    <td><img src="{{asset('public/image/'.$p->image)}}" style="max-height: 150px; max-width: 150px;" ></td>
                    <td>{{ $p->status }}</td>
                    <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Ubah</a></td>
                    <td>
                        <form  action="{{ route('category.destroy', $p->id) }}" method="POST">
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
                                        <form action="{{ route('category.update', $p->id) }}" method="POST" enctype="multipart/form-data">
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
        </div>

    </main>
</div>

@endsection
