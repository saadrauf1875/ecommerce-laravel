<!DOCTYPE html>
<html>
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <base href="/public">
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
        padding: 10px;
        margin: auto;
        margin-top: 40px;
        width: 50%;
        text-align: center;
        border: 3px solid black;
       }
 </style>
   
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{asset ('home/css/bootstrap.css')}}" />
      <!-- font awesome style -->
      <link href="{{asset ('home/css/font-awesome.min.css')}}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{asset ('home/css/style.css')}}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{asset ('home/css/responsive.css')}}" rel="stylesheet" />
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->


         @if (session()->has('message'))
                  
         <div class="alert alert-success">
             <button type="button" style="height:20px;width:20px;" class="close" data-dismiss="alert">X</button> 
             {{session()->get('message')}}
               
         </div>

         @endif



         <div class="content_center">

            <h2 class="font_h2">Cart Products</h2>

        </div>
<div>
         <table class="center" >
            <tr>
                <th> Product Title</th>
                <th>Product Quantity</th>
                <th>Price</th>
                <th>Image</th>
                <th>Action</th>
                
            </tr>
    
            <?php $totalprice=0; ?>

            @foreach ($cart as $cart)
            <tr>
                        <th>{{$cart->product_title}}</td>
                        <th>{{$cart->quantity}}</td>
                        <th>${{$cart->price}}</td>
                        
                        <th><img height="100" width="100" src="productimage/{{$cart->image }}" alt=""></td>
                        
                        <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('/delete_cart',$cart->id)}}" >Delete Product</button></td>
            </tr>

           
            <?php $totalprice=$totalprice + $cart->price ?>
            @endforeach
        
            
        </table>
      </div>
         <!-- end slider section -->
         <div style="margin: auto; margin-top:30px">
            <h1 class="font_h2" > Total Price: ${{$totalprice}}</h1>
        </div>

        <div style="margin: auto; margin-top:30px">
            <h1  class="font_h2">Procees to Order</h1>
    
            <a href="{{url('cash_order')}}" class="btn btn-danger">Cash on Delivery</a>
            <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay using Card</a>
    
          </div>
      </div>


      
      <!-- why section -->
     
      
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
<!-- Sweet aleert -->
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
      <!-- jQery -->
      
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>