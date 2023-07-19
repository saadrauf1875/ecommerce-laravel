<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
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
 
       

        @if (session()->has('message'))
                                        
        <div class="alert alert-success ">
            <div class="row">
                <div class="col text-right">
                    {{session()->get('message')}}
                    <button type="button" style="background:rgb(6, 181, 245);height:20px;width:20px;color:white;" class="close " data-bs-dismiss="alert">X</button> 
                   
                </div>
            </div>
           
           
            
        </div>

        @endif
        
        

        <div class="row d-flex justify-content-center mt-6">
            <div class="col-xl-6 col-lg-12 mt-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Products</h4>
                    </div>
                    <div class="card-body">
                      <form action="{{url('/update_products',$data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Product Name:</label>
                                <div class="col-md-9">
                                    <input type="text"  class="form-control" name="title" id="field" value="{{$data->title}}" placeholder="Enter Product Name:" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Product Description:</label>
                                <div class="col-md-9">
                                    <input type="text" name="description" id="field" value="{{$data->description}}"  placeholder="Enter Product Description:" required class="form-control">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Product Quantity:</label>
                                <div class="col-md-9">
                                    <input type="number" name="quantity" id="field" value="{{$data->quantity}}" placeholder="Enter Product  Quantity:" required class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Product Price:</label>
                                <div class="col-md-9">
                                    <input type="number" name="price" id="field" value="{{$data->price}}"  placeholder="Enter Product price" required class="form-control" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Discount Price:</label>
                                <div class="col-md-9">
                                    <input type="number" name="discount_price" id="field"  value="{{$data->discount_price}}" placeholder="Enter Product  Discount Price:" class="form-control" >
                                </div>
                            </div>


                            
                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Product Category:</label>
                                <div class="col-md-9">
                                    
                                    
                                   
                                   
                                    <select class="form-control" name="category" id="field"  required>
                                        <option label="Select">Country</option>
                                        
                                   
                                        <option value="{{$data->category}}" selected="">{{$data->category}}</option>
                                        </select>
                                    
                                    
                                </div>
                            </div>

                            <div class="row mb-4">
                              <label class="col-md-3 form-label" for="example-email">Old Image:</label>
                              <div class="col-md-9">

                                <img height="100px" width="100px" src="productimage/{{$data->image}}" alt="">
                              </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-md-3 form-label" for="example-email">Choose File:</label>
                                <div class="col-md-9">
                                <input class="form-control form-control-lg" name="image" required type="file">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-9">
                            <button type="submit" value="Add Products" name="submit" class="btn btn-primary">Submit</button>
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