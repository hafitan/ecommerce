{{-- @extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    You are normal user.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.master',['role'=>'1'])

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Halaman Admin E-Commerce</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Category</div>
                                  {{-- <div class="h5 mb-0 font-weight-lighter text-gray-800">{{$user}}</div> --}}
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-users fa-2x text-gray-300"></i>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Order</div>
                                  {{-- <div class="h5 mb-0 font-weight-lighter text-gray-800">{{$transaksi}}</div> --}}
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Product</div>
                                  {{-- <div class="h5 mb-0 font-weight-lighter text-gray-800">{{$barang}}</div> --}}
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-shopping-basket fa-2x text-gray-300"></i>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Chart</div>
                                  {{-- <div class="h5 mb-0 font-weight-lighter text-gray-800">{{$transaksi}}</div> --}}
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-uppercase mb-1">Order</div>
                                  {{-- <div class="h5 mb-0 font-weight-lighter text-gray-800">{{$merek}}</div>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-stamp fa-2x text-gray-300"></i>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-area mr-1"></i>
                            Statistik
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar mr-1"></i>
                            Diagram Barang
                        </div>
                        <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
            </div>
        </div> --}}
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Project 2022</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection
