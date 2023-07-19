<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>

          <div>

            <form action="{{url('product_search')}}" method="GET">
               @csrf
               <input style="width: 500px" type="text" name="search" placeholder="Search for Something">
               <input type="submit" value="Search">
            </form>
          </div>
       </div>

       @if (session()->has('message'))
                  
       <div class="alert alert-success">
           <button type="button" style="height:20px;width:20px;" class="close" data-dismiss="alert">X</button> 
           {{session()->get('message')}}
             
       </div>

       @endif

       <div class="row">
         
         @foreach($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('product_details',$products->id)}}" class="option1">
                      Product Details
                      </a>

                      <form action="{{url('/add_cart',$products->id)}}" method="get">
                        @csrf
                     <div class="row">
                        <div class="div col-md-4"> 

                           <input type="number" width="50px" min="1" name="quantity" value="1" style="width:100px">

                        </div>
                        <div class="div col-md-4">
                           <input type="submit" value="Add to Cart">
                        </div>

                     </div>
                  </form>
                   </div>
                </div>
                <div class="img-box">
                   <img src="productimage/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{$products->title}}
                   </h5>

                   @if($products->discount_price!=null)
                   <h6 style="color: tomato">
                     Discount price
                     <br>
                     ${{$products->discount_price}}
                   </h6>
                   <h6 style="text-decoration: line-through; color:blue">
                      price
                     <br>
                    ${{$products->price}}
                   </h6>
                   @else
                   <h6 style="color: blue">
                     price
                     <br>
                     ${{$products->price}}
                   </h6>

                   @endif
                   

                </div>
             </div>
          </div>
  
          @endforeach

          <span style="padding-top: 20px">

            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
          </span>
       </div>
       
    </div>
 </section>