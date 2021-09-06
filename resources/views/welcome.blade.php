<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{ asset('backend/img/logo/logo.png') }}" rel="icon">

    <title>Inventory - Dashboard</title>

    @include('layouts.style')

  </head>

  <body id="page-top">

    <div id="loader">
      <span class="load"></span>
    </div>

    <div id="wrapper">

      <!-- Sidebar -->
      @include('layouts.sidebar')
      <!-- Sidebar -->

      <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">

          <!-- TopBar -->
          @include('layouts.topbar')
          <!-- Topbar -->

          <!-- Container Fluid-->
          <div class="container-fluid" id="container-wrapper">
            <router-view></router-view>
          </div>
          <!---Container Fluid-->

        </div>

      </div>

    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
    <!-- Scroll to top -->

    @include('layouts.script')

  </body>

</html>