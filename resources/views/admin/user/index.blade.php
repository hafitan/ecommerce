@extends('layouts.master',['role' => '1'])

@section('content')

<div id="layoutSidenav_content">
    <main>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Halaman Admin E-Commerce</li>
        </ol>
            <div>
                <div class="container-fluid">
                    <h1 class="mt-4">user</h1>
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
                    <button type="button" class="btn btn-primary mt-3" style="margin-left: 0px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="bi bi-plus-circle">Tambah</i>
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST" action="{{ route('user.store') }}">
                                    @csrf

                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">username</label>
                                            <input type="text" class="form-control" name="username" required>
                                            @error('username')
                                              <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">email</label>
                                            <input type="email" class="form-control" name="email" required>
                                            @error('email')
                                              <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">role</label>
                                            <select type="" class="form-control" name="role" required>
                                                <option selected disabled value="">--- Pilih ---</option>
                                                @foreach($user as $key => $c)
                                                    <option value="{{ $c->role}}">{{ $c->role }}</option>
                                                @endforeach
                                                @error('role')
                                                    <span class="text-danger">Field ini tidak boleh kosong</span>
                                                @enderror
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">password</label>
                                            <input type="password" class="form-control" name="password" required>
                                            @error('password')
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
        <br>
            <table class="table table-success table-striped">
                <tr>
                    <td>NO</td>
                    <td width="800px">username</td>
                    <td width="800px">email</td>
                    <td width="800px">role</td>
                    <td colspan="2" width="100px">Action</td>
                </tr>
                    @php
                        $i = 0;
                    @endphp
                    @foreach($user as $key => $p)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $p->username }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->role }}</td>

                    <td><a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$p->id}}">Ubah</a></td>
                    <td>
                        <form  action="{{ route('user.destroy', $p->id) }}" method="POST">
                          @csrf
                          @method('DELETE')

                          <button onclick="return confirm('Yakin Hapus {{ $p->username }} ?')" type="submit" class="btn btn-danger">Hapus</button>
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
                                    <form action="{{ route('user.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label">username</label>
                                            <input type="text" class="form-control" name="username" value="{{ $p->username }}" required>
                                            @error('username')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">emain</label>
                                            <input type="email" class="form-control" name="email" value="{{ $p->email }}" required>
                                            @error('email')
                                                <span class="text-danger">Field ini tidak boleh kosong</span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">password</label>
                                            <input type="password" class="form-control" name="user_product" value="{{ $p->password }}" required>
                                            @error('password')
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
                </tr>
                    @endforeach
            </table>
        </div>

    </main>
</div>

@endsection
