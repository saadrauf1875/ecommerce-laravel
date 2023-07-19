<!DOCTYPE html>
<html lang="en">
  <head>
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
    margin: auto;
    margin-top: 40px;
    width: 100%;
    text-align: center;
    border: 3px solid white;
   }
   .th_deg{
    background-color: skyblue;

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

   
   <div class="row table_addproduct  mt-4">
    <div class="col-xl-8 col-lg-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Orders</h4>
            </div>
            <div class="card-body">
              <form action="{{url('search_data')}}" method="GET">

                @csrf
                    <div class="row mb-4">
                        <label class="col-md-3 form-label" for="example-email">Search Order:</label>
                        <div class="col-md-4">
                            <input type="text"  class="form-control" name="search" placeholder="Search for something">
                        </div>
                        <div class="col-md-4">
                          <input type="submit" name="submit" value="Search" class="btn btn-primary">
                           
                        </div>
                    </div>

                    


                    <div class="row mb-4">
                        
                    </div>

                    
                   
                    
                    
                    
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row table_product  mt-2">
  <div class="col-xl-12 col-12 ">
      <div class="card">
          <div class="card-header">
              <h3 class="card-title">View Orders</h3>
          </div>
          <div class="card-body">
              
              <div class="table-responsive">
                  <table class="table border text-nowrap text-md-nowrap table-bordered mb-0">
                      <thead>
                        <tr>
                          <th> Name</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Phone</th>
                          <th>Product title</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Payment Staus</th>
                          <th>Delivery Status</th>
                          <th>Image</th>
                          <th>Delivered</th>
                          <th>Print Pdf</th>
                          <th>Send Email</th>
                      </tr>
                      </thead>
                      <tbody>
                          
                         
                       
       @forelse ($data as $data)
       <tr>
           <td >{{$data->name}}</td>
           <td >{{$data->email}}</td>
           <td >{{$data->address}}</td>
           <td >{{$data->phone}}</td>
           <td >{{$data->product_title}}</td>
           <td >{{$data->quantity}}</td>
           <td >${{$data->price}}</td>
           <td >{{$data->payment_status}}</td>
           <td >{{$data->delivery_status}}</td>
           <td ><img src="productimage/{{$data->image}}" height="100" width="100" alt=""> </td>
                  
           @if($data->delivery_status=='processing')
           <td><a class="btn btn-primary" onclick="return confirm('Are you sure to the order is Delivered?')" href="{{url('/order_delivered',$data->id)}}" >Delivered</button></td>
          
           @else
           <td>
           <p style="padding: 5px; color:green;">Delivered</p>

             </td>
               @endif

               <td > <a href="{{url('print_pdf',$data->id)}}" class="btn btn-primary">Print PDF</a></td>

               <td>

                   <a href="{{url('send_email',$data->id)}}" class="btn btn-info">Send Email</a>
               </td>
           </tr>

           @empty

           <tr>
             <td colspan="16">
               <p>Record Not Found!</p>
             </td>
              
            
             
           </tr>
       @endforelse
      
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