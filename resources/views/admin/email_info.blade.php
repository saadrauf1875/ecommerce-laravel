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
        <div class="row table_addproduct  mt-6">
          <div class="col-xl-8 col-lg-12 mt-6">
              <div class="card">
                  <div class="card-header">
                      <h4 class="card-title">Send Email To:  {{$order->email}}</h4>
                  </div>
                  <div class="card-body">
                    <form action="{{url('send_user_email',$order->id)}}" method="POST">
                      @csrf
                          <div class="row mb-4">
                              <label class="col-md-3 form-label" for="example-email">Email Greeting:</label>
                              <div class="col-md-9">
                                  <input type="text"  class="form-control" name="greeting" placeholder="Enter Greeting Text:" required>
                              </div>
                          </div>

                          <div class="row mb-4">
                              <label class="col-md-3 form-label" for="example-email">Email First line:</label>
                              <div class="col-md-9">
                                  <input type="text"  name="firstline" placeholder="Enter First Line:" required class="form-control">
                              </div>
                          </div>

                          <div class="row mb-4">
                              <label class="col-md-3 form-label" for="example-email">Email Body:</label>
                              <div class="col-md-9">
                                  <input type="text" name="body" placeholder="Enter Body Text:" required class="form-control" >
                              </div>
                          </div>

                          <div class="row mb-4">
                              <label class="col-md-3 form-label" for="example-email">Email Button Name:</label>
                              <div class="col-md-9">
                                  <input type="text"  name="button"  placeholder="Enter Button Name" required class="form-control" >
                              </div>
                          </div>

                          <div class="row mb-4">
                              <label class="col-md-3 form-label" for="example-email">Email Url:</label>
                              <div class="col-md-9">
                                  <input type="text" name="lastline" placeholder="Enter Last Name:" class="form-control" >
                              </div>
                          </div>

                          <div class="row mb-4">
                            <label class="col-md-3 form-label" for="example-email">Email Lastline:</label>
                            <div class="col-md-9">
                                <input type="text" name="lastline"  placeholder="Enter Last Line:" class="form-control" >
                            </div>
                        </div>


                

                          <div class="row mb-4">
                              <div class="col-md-9">
                                <input type="submit" class="btn btn-primary" value="Send Email" >
                              </div>
                          </div>

                          
                         
                          
                          
                          
                      </form>
                  </div>
              </div>
          </div>
      </div>

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