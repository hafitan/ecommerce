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
            <div class="row">
                {{-- <form method="post">
                    @csrf --}}
                    <div class="col-md-8">
                        <div class="container text-center">
                            <div class="row">
                                @foreach ($product as $key => $pro)
                                    <div class="col-4 mb-4">
                                        <div class="card" style="padding:11px;">
                                            <img class="card-img img-fluid" style="height: 200px ; width: 290px;"
                                            src="{{ asset('public/image/' . $pro->image) }}" alt="Card image cap"
                                            id="product-detail">
                                            <div class="card-body"style="">
                                                <input type="text" name="name"  style=" width: 140px;" class="card-title bg-light card" disabled value="{{ $pro->name }}" id="">
                                                <input type="text" name="price"  style=" width: 140px;" class="card-title bg-light card" disabled value="harga : {{ $pro->price }}" id="">
                                                <input type="text" name="stock"  style=" width: 140px;" class="card-title bg-light card" disabled value="stock : {{ $pro->stock }}" id="">
                                                <div class="card-body"style="">
                                                    <button type="button" data-product-id="{{ $pro->id }}" class="btn btn-primary submit btn-add-cart" >beli</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div style="
                                    left: 1050px;
                                    top: 180px;
                                    width: 400px;
                                    position: fixed;
                                ">
                                    <div class="col-10 border border-dark position-relative" style="background-color: white; border-radius :5%; padding-bottom:470px;" border-color:black;>
                                        <br>
                                        <h6 class="text-center " style="">halaman daftar beli</h6>
                                        <table>
                                            <tr>
                                                <th>name</th>
                                                <th>qty</th>
                                                <th>price</th>
                                            </tr>
                                            @foreach ($carts as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    {{-- <td><input type="number" name="qty" min="1" class="form-control" value="1"></td> --}}
                                                    <td><input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="qty" value="1" title="Qty" class="input-text qty text" size="4" style="height: 41px" pattern="" inputmode=""><input type="button" value="+" class="plus"></td>
                                                    <td><input type="number" class="form-control" value="{{ $item->price }}" disabled></td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {{-- </form> --}}
            </div>
        </main>
    </div>
@endsection

@push('skrip')
    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("body").delegate(".btn-add-cart", "click", function(e) {
        e.preventDefault();

        let product_id = $(this).data('product-id');
        console.log(product_id);
        // let name = $("input[name=name]").val();
        // let price = $("input[name=price]").val();
        // let qty = $("input[name=qty]").val();
        // let stock = $("input[name=stock]").val();
        let url = "{{ route('admin.reorder') }}";
        $.ajax({
            type: 'POST',
            url:url,
            data:{id:product_id},
            success:function(data){
                // alert(data.success);
                location.reload();
            }
        });
    });
    </script>
@endpush
