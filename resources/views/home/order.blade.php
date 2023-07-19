<!DOCTYPE html>
<html>
   <head>
    <style type="text/css">
        .center{
        margin: auto;
        width: 70%;
        padding: 10px;
       text-align: center;
      
       
      }

      table,th,td{
        border: 1px solid black;
      }
      .the_deg{
        padding: 2px;
        background-color: skyblue;
        font-size: 20px;
        font-weight: bold;
      }
      .font_h2{
       font-size: 40px;
       
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
      
         <!-- end slider section -->

         <table class="center" >
            <tr>
                <th class="the_deg"> Product Title</th>
                <th class="the_deg">Quantity</th>
                <th class="the_deg">Price</th>
                <th class="the_deg">Payment Stautus</th>
                <th class="the_deg">Delivery Status</th>
                <th class="the_deg">Image</th>
                <th class="the_deg">Cancel Order</th>
                
            </tr>

           
            @foreach ($order as $order)
            <tr>
                        <th>{{$order->product_title}}</td>
                        <th>{{$order->quantity}}</td>
                        <th>${{$order->price}}</td>
                        <th>{{$order->payment_status}}</td>
                        <th>{{$order->delivery_status}}</td>
                        
                        <th><img height="100" width="100" src="productimage/{{$order->image }}" alt=""></td>
                        <th> 
                            @if($order->delivery_status=='processing')
                            <a onclick="return confirm('Are you Sure to cancel this Order!!! ')" href="{{url('cancel_order',$order->id)}}" class="btn btn-danger">Cancel Order</a>
                             @else
                             <p style="color: blue">Not Allowed</p>
                            @endif
                        </th>
                        
            </tr>

           
            @endforeach
        
    
            
            
        </table>
      </div>
     
     
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