<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
  </head>
  <body class="app sidebar-mini ltr light-mode">


    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="../sash/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

      @include('admin.header')

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      
        <!-- partial:partials/_navbar.html -->
       
        <!-- partial -->
        @include('admin.body')
        <!-- main-panel ends -->
     
      <!-- page-body-wrapper ends -->
    </div>

        <!-- FOOTER -->
        <footer class="footer">
          <div class="container">
              <div class="row align-items-center flex-row-reverse">
                  <div class="col-md-12 col-sm-12 text-center">
                      Copyright © <span id="year"></span> <a href="javascript:void(0)">Saad Dev</a>. Designed with <span
                          class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> SAAD  </a> All rights reserved.
                  </div>
              </div>
          </div>
      </footer>
      <!-- FOOTER END -->

  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>