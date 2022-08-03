@extends('layouts.layout',['level' => 'ADMIN'])

@section('content')

    <div id="layoutSidenav_content">
        <div class="container-fluid">
            <main>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <div class="card-body">
                                {{-- <a href="{{ route('merek.create') }}" class="btn btn-md btn-success mb-3 mt-4">TAMBAH MEREK</a> --}}

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-md btn-outline-success mb-3 mt-4" data-toggle="modal" data-target="#staticBackdrop">
                                   Tambah Category Product  <i class="fas fa-plus-circle"></i>
                                </button>

                                <table class="table table- table-borderless table-hover" id="table_id">
                                    <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Category Product</th>
                                        <th scope="col" class="text-center">AKSI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                    @forelse ($category as $merek)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{ $merek->category_product }}</td>
                                            <td class="text-center">
                                                
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('merek.destroy', $merek->id) }}" method="POST">
                                                    <a href="{{ route('merek.edit', $merek->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                    @empty
                                        <div class="alert alert-danger">
                                            Data Merek belum Tersedia.
                                        </div>
                                    @endforelse
                                    </tbody>
                                </table>  
                                {{ $category->links() }}
                            </div>
                        </div>
                    </div>
                </div>
              </main>
        </div>