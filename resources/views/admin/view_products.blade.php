<!DOCTYPE html>
<html lang="en">
  <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
   @include('admin.css')

   <style type="text/css">
   .content_center{
    text-align: center;
    padding-top: 40px;
    
   }
   .font_h2{
    font-size: 40px;
    margin-bottom: 20px;
   }
   #category_name{
   color: black;
   }
   .center{
    padding: 20px;
    margin: auto;
    margin-top: 40px;
    width: 80%;
    text-align: center;
    border: 3px solid white;
   }
   .th_deg{
    background-color: skyblue;
    padding-bottom: 4px;
   }
   
   </style>
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
   

        @if (session()->has('message'))
                  
        <div class="alert alert-success">
            <button type="button" style="background:white;height:20px;width:20px;" class="close" data-bs-dismiss="alert">X</button> 
            {{session()->get('message')}}
              
        </div>

        @endif

        @include('sweetalert::alert')

        <div class="row table_product  mt-6">
          <div class="col-xl-12 col-12 mt-6">
              <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">View Products</h3>
                  </div>
                  <div class="card-body">
                      
                      <div class="table-responsive">
                          <table class="table border text-nowrap text-md-nowrap table-bordered mb-0">
                              <thead>
                                  <tr>
                                      <th>Title</th>
                                      <th>Descriptoion</th>
                                      <th>Category</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>Dicount-Price</th>
                                      <th>Image</th>
                                      <th>Action1</th>
                                      <th>Action2</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  
                                 
                                @foreach ($data as $data)
                                <tr>
                                            <td>{{$data->title}}</td>
                                            <td>{{$data->description}}</td>
                                            <td>{{$data->category}}</td>
                                            <td>{{$data->quantity}}</td>
                                            <td>{{$data->price}}</td>
                                            <td>{{$data->discount_price}}</td>
                                            <td><img height="100" width="100" src="productimage/{{$data->image }}" alt=""></td>
                                            <td><a class="btn btn-warning"  href="{{url('/update',$data->id)}}" >Update</button></td>
                                    <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('/delete_products',$data->id)}}" >Delete</button></td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                      </div>
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
                      Copyright © <span id="year"></span> <a href="javascript:void(0)">Sash</a>. Designed with <span
                          class="fa fa-heart text-danger"></span> by <a href="javascript:void(0)"> Spruko </a> All rights reserved.
                  </div>
              </div>
          </div>
      </footer>
      <!-- FOOTER END -->

  </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    <script type="text/javascript">
 
        function confirmation(ev) {
           ev.preventDefault();
             var urlToRedirect =  ev.currentTarget.getAttribute('href');
             
            console.log(urlToRedirect);
             swal({
                 title: `Are you sure you want to delete this record?`,
                 text: "If you delete this, it will be gone forever.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
             })
             .then((willDelete) => {
               if (willDelete) {
                 
                 
                 window.location.href =urlToRedirect;
               }
             });
           }
     
   </script>

    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>