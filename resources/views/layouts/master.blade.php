<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>E-Commerce</title>

  <!-- Custom fonts for this template-->
  <link href="assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css') }}">
  <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Custom styles for this template-->
  <link href="{{ asset('../../assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

  {{-- jQuery ajax --}}
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper" >

    <!-- Sidebar -->
    {{-- <div class="sticky-top position-fixed"> --}}
    <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('home') }}">
        <div class="sidebar-brand-text mx-3">E-Commerce</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('home') }}">
          <i class="fas fa-fw fa-bell"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Halaman
      </div>

      <!-- Nav Item - Pages Collapse Menu -->

      @if( auth()->user()->role == '1')

      <li class="nav-item active">
        @endif
      @if( auth()->user()->role == '1')
        <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.category.index') }}">
          <i class="bi bi-archive" aria-hidden="true"></i>
          <span>Category</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.order.index') }}">
          <i class="bi bi-bag-check"></i>
          <span>Order</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.listOrder.index') }}">
          <i class="bi bi-bag-check"></i>
          <span>List Order</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.product.index') }}">
          <i class="bi bi-stack"></i>
          <span>List Product</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.charts.index') }}">
          <i class="bi bi-basket"></i>
          <span>Cart</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.user.index') }}">
          <i class="bi bi-person"></i>
          <span>User</span></a>
      </li>

@endif

      {{-- <!-- Divider --> --}}
      {{-- <hr class="sidebar-divider"> --}}

      {{-- <!-- Heading -->
      <div class="sidebar-heading">
        Lainnya
      </div> --}}


      <!-- Nav Item - Login -->
       {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('log').submit();return confirm('yakin ingin Log Out?');" >
        <i class="fas fa-fw fa-arrow-right"></i>
          {{ __('Logout') }}</a>  --}}

          <div class="sidebar-heading">
            <li class="nav-item active">
                      Logout
          </div>

          <form action="{{ route('logout') }}"onclick="return confirm('{{Auth::user()->username}} Yakin Ingin Logout??')" method="post">
            @csrf
            <button type="submit" class="btn btn-get-started btn-get-started-blue text-white">Logout</button>
        </form>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"><i class="bi bi-arrow-left"></i></button>
      </div>

    </ul>
    {{-- </div>
  </div> --}}
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <br>
        <div class="container">
          <section style="margin-left:auto" class="content">
            @yield('content')
          </section>
        </div>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>E-Commerce Garut</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="bi bi-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">Pilih "Keluar" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini          .</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="#">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('assets/admin/js/demo/chart-pie-demo.js') }}"></script>
  @stack('skrip')
  @stack('scripts')
</body>

</html>
