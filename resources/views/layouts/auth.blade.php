{{-- @extends('layouts.app') --}}

@section('link-css')
            <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />

          <!--   Core JS Files   -->
          <script src="../assets/js/core/popper.min.js"></script>
          <script src="../assets/js/core/bootstrap.min.js"></script>
          <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
          <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
          <script src="../assets/js/plugins/fullcalendar.min.js"></script>
          <script src="../assets/js/plugins/chartjs.min.js"></script>

          <script src="../../assets/js/plugins/dropzone.min.js"></script>
@endsection

@include('layouts.sidebar')

<div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    @include('layouts.app')

    {{-- @yield('content') --}}
</div>
