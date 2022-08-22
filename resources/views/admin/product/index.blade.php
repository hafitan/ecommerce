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
            {{-- button add --}}
            <button type="button" class="btn btn-primary mb-3" style="margin-left: 0px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle">Tambah</i>
            </button>
            {{-- button restock --}}
            {{-- <button type="button" class="btn btn-primary mb-3" style="margin-left: 0px;" data-bs-toggle="modal" data-bs-target="#exampleRestock">
                <i class="bi bi-plus-circle">restock</i>
            </button> --}}

            <div>
                {{-- add modal --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Product</label>
                                        <input type="name" class="form-control" name="name" required>
                                        @error('name')
                                        <span class="text-danger">Field ini tidak boleh kosong</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Stock</label>
                                        <input type="number" class="form-control" name="stock" min="1" required>
                                        @error('stock')
                                            <span class="text-danger">Field ini tidak boleh kosong</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" class="form-control" name="price" min="1" required>
                                        @error('price')
                                            <span class="text-danger">Field ini tidak boleh kosong</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-control" name="category" required>
                                            <option selected disabled value=""><--- Pilih ---></option>
                                            @foreach($category as $key => $c)
                                                <option value="{{ $c->category_product}}">{{ $c->category_product }}</option>
                                            @endforeach
                                            @error('category')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">image</label>
                                        <input type="file" class="form-control" name="image" placeholder="Choose image" id="image">
                                        @error('image')
                                        <span class="text-danger">Field ini tidak boleh kosong</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">deskripsi</label>
                                        <textarea name="desc" class="my-editor form-control" id="my-editor" cols="30" rows="10" required></textarea>
                                        @error('desc')
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

                {{-- restock modal --}}
                    {{-- <div class="modal fade" id="exampleRestock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                    <form method="POST" action="/restock">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">name</label>
                                                <select name="id" id="" class="form-control" required>
                                                    <option value="">-- Pilih --</option>
                                                    @foreach ($product as $p)
                                                        <option value="{{ $p->id }}">{{ $p->name }} --{{ $p->price }}</option>
                                                    @endforeach
                                                </select>
                                                @error('id')
                                                    <span class="text-danger">Field ini tidak boleh kosong</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">stock</label>
                                                <input type="number" name="stock" class="form-control" min="1" required>
                                                @error('stock')
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
                    </div> --}}
                {{-- end restcok --}}

            </div>
        </div>
            <table class="table table-success table-striped">
                <tr>
                    <td>NO</td>
                    <td>Name</td>
                    <td>Stock</td>
                    <td>Price</td>
                    <td>Category</td>
                    <td>image</td>
                    <td>desc</td>
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
                    <td><img src="{{asset('public/image/'.$p->image)}}" style="max-height: 150px; max-width: 150px;" ></td>
                    <td>{!! $p->desc!!}</td>
                    <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Ubah</a></td>
                    <td>
                        <form  action="{{ route('admin.product.destroy', $p->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button onclick="return confirm('Yakin Hapus data ini??')" type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                    <div class="modal fade" id="modalUpdate{{$p->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Update</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.product.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label">Product</label>
                                            <input type="name" class="form-control" name="name" value="{{ $p->name }}" required>
                                            @error('name')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Stock</label>
                                            <input type="number" class="form-control" name="stock" min="1" value="{{ $p->stock }}" required>
                                            @error('stock')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Price</label>
                                            <input type="number" class="form-control" name="price" min="1" value="{{ $p->price }}" required>
                                            @error('price')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select type="" class="form-control" name="category" required>
                                                <option value="">-- Pilih --</option>
                                                @foreach($category as $key => $c)
                                                <option value="{{ $c->category_product }}" @if($p->category == $c->category_product)selected @endif>{{ $c->category_product }}</option>
                                                @endforeach
                                            @error('category')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Image</label>
                                            <input type="file" name="image" accept="image/*" class="form-control" value="{{ asset('public/image/'.$p->image) }}" placeholder="Choose image" id="image" >
                                            <img src="" width="300px" alt="">
                                            @error('image')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="" class="form-label">Description</label>
                                            <textarea name="desc" class="my-editor form-control" id="my-editor1" cols="30" rows="10" required>{{ $p->desc }}</textarea>
                                            @error('desc')
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
                    </td>
                </tr>
                    @endforeach
            </table>
        </div>

    </main>
</div>

@endsection

@push('scripts')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('my-editor');
        CKEDITOR.replace('my-editor1');
    </script>
@endpush
