<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Sistema de Asistencia</title>
  <!-- Custom fonts for this template-->
  <link href="{{asset('/template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="{{asset('/vendor/select2/select2.min.css')}}" rel="stylesheet">
  <link href="{{asset('/template/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vendor/datetimepicker/jquery.datetimepicker.min.css')}}" rel="stylesheet">
</head>
<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">


        <!-- Begin Page Content -->
        <div class="container-fluid mt-3">
            @include('app.comun.status_info')
            <!-- Page Heading -->
            @yield('content')
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  @include('app.comun.logout_modal')
  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('/template/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('/template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('/template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('/template/js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('/vendor/select2/select2.min.js')}}"></script>
  <script src="{{asset('/vendor/datetimepicker/jquery.datetimepicker.full.min.js')}}"></script>
  <script src="{{asset('/js/app.js')}}"></script>


</body>

</html>
