<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Products;

use App\Models\Cart;

use App\Models\Order;

use Session;
use Stripe;

class HomeController extends Controller
{
    //

    public function index(){

        if(Auth::id()){
            $id=Auth::user()->id;
            
    
            $cart=cart::where('user_id','=',$id)->count();

            Session::put('key', $cart);
 
           // $value = Session::get('key', 'default');

           // dd($value);
        }
    
        //dd($cart);

        $product =products::paginate(9);
        return view('home.userpage',compact('product'));
    }

// About Page Redirect
    public function about(){

        if(Auth::id()){
            $id=Auth::user()->id;
            
    
            $cart=cart::where('user_id','=',$id)->count();

            Session::put('key', $cart);
 
           // $value = Session::get('key', 'default');

           // dd($value);
        }
    
        //dd($cart);

       
        return view('home.about');
    }
//tetimonial page
    public function testimonial(){

        if(Auth::id()){
            $id=Auth::user()->id;
            
    
            $cart=cart::where('user_id','=',$id)->count();

            Session::put('key', $cart);
 
           // $value = Session::get('key', 'default');

           // dd($value);
        }
    
        //dd($cart);

       
        return view('home.testimonial');
    }

//contactus page
    public function contact(){

        if(Auth::id()){
            $id=Auth::user()->id;
            
    
            $cart=cart::where('user_id','=',$id)->count();

            Session::put('key', $cart);
 
           // $value = Session::get('key', 'default');

           // dd($value);
        }
    
        //dd($cart);

       
        return view('home.contact');
    }
// send email
    public function send_user_email(Request $request){

      //  $order=order::find($id);
        
    
        $details = [
            'greeting' => $request->name,
            'firstline' => $request->subject,
            'body' => $request->message,
            
        ];
    
        Notification::send($request->email, new SendEmailNotification($details));
    
        //dd('done');
    
        return redirect()->back();
    
    
    
    }
//blog page
    public function blog(){

        if(Auth::id()){
            $id=Auth::user()->id;
            
    
            $cart=cart::where('user_id','=',$id)->count();

            Session::put('key', $cart);
 
           // $value = Session::get('key', 'default');

           // dd($value);
        }
    
        //dd($cart);

       
        return view('home.blog');
    }


    public function redirect(){

        $usertype=Auth::user()->usertype;

       
        

        if($usertype=='1'){

            $total_product=products::all()->count();

            $total_order=order::all()->count();

            $total_user=user::all()->count();

            

            $order=order::all();

            $total_revenue=0;

            foreach ($order as $order){

                $total_revenue=$total_revenue+$order->price;
            }
            
            $total_delivered=order::where('delivery_status','=','delivered')->get()->count();

            $total_processing=order::where('delivery_status','=','processing')->get()->count();
            
           


            return view('admin.home',compact('total_product','total_order','total_user','total_revenue','total_delivered','total_processing'));
        }
        else{
            $product =products::paginate(9);
            return view('home.userpage',compact('product'));
        }

    }
// Send product details on productdetails page
    public function product_details($id){

        $product=products::find($id);
        return view('home.product_details',compact('product'));

    }

    //if user login send add to cart otherwise send it login page

    public function add_cart(Request $request ,$id){

        if(Auth::id()){

            $user=Auth::user();

            $userid=$user->id;//get user id

            $product=products::find($id); //find product agaisnt the id

            $product_exist_id=cart::where('product_id','=',$id)->
            where('user_id','=',$userid)->get('id')->first();

            if( $product_exist_id){// if cart has already the product in cart do than add new produt qauntity +prevoius  proodut qunatity

                $cart=cart::find($product_exist_id)->first();

                $quantity=$cart->quantity;

                $cart->quantity=$quantity+$request->quantity;// cart +new Quantity added in cart

                if($product->discount_price!=null){// if discount price available

                    $cart->price= $product->discount_price * $cart->quantity;
                }
                else{
                    $cart->price= $product->price  * $cart->quantity;
                }
                
                $cart->save();

                Alert::success('Product Added Succesfully','We have added products to the cart!');

                return redirect()-> back()->with('message','Product Added Succesfully!!');
            }
            else{

            $cart=new cart(); // insert data into cart table starts

            $cart->name=$user->name;

            $cart->email=$user->email;

            $cart->phone=$user->phone;

            $cart->address=$user->address;

            $cart->product_title= $product->title;

            if($product->discount_price!=null){// if discount price available

                $cart->price= $product->discount_price * $request->quantity;
            }
            else{
                $cart->price= $product->price  * $request->quantity;
            }

           

            $cart->quantity= $request->quantity;// quqnty added by user

            $cart->image= $product->image;

            $cart->product_id= $product->id;

            $cart->user_id=$user->id;


            $cart->save();

            return redirect()->back()->with('message','Product Added Succesfully!!');

            }//else end

            

           
        }
        else{
            return redirect('login');
        }
    }


    // show cart working 


    public function show_cart(){

        if(Auth::id()){

            $id=Auth::user()->id;// get user id

            $cart=cart::where('user_id','=',$id)->get();// serach on cart table on bases of id

            return view('home.show_cart',compact('cart'));
        }
        else{

            return redirect('login');
        }
    }

    //delete cart working
    public function delete_cart($id){

        if(Auth::id()){
            $data=cart::find($id);
        
            $data->delete();
        
            return redirect()->back()->with('message','Product deleted successfully!');
        }
        else{

            return redirect('login');
        }
        
        }

    public function cash_order(){
        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();
        
        foreach ($data as $data){

            $order=new order;

            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;

            $order->price=$data->price;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->product_id;

            $order->payment_status='cash on Delivery';

            $order->delivery_status='processing';

            $order->save();

            //DELEte the cart data after storing in Order Table

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();

        }
        return redirect()->back()->with('message','We have Recived your Order.Will connect you soon!');;
    }

// go to stripe page with total price
    public function stripe($totalprice)
    {

        return view('home.stripe',compact('totalprice'));
    }

// paymnet succesfull message
    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for payment." 
        ]);

        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=',$userid)->get();
        
        foreach ($data as $data){

            $order=new order;

            $order->name=$data->name;

            $order->email=$data->email;

            $order->phone=$data->phone;

            $order->address=$data->address;

            $order->user_id=$data->user_id;


            $order->product_title=$data->product_title;

            $order->price=$data->price;

            $order->quantity=$data->quantity;

            $order->image=$data->image;

            $order->product_id=$data->product_id;

            $order->payment_status='Paid';

            $order->delivery_status='processing';

            $order->save();

            //DELEte the cart data after storing in Order Table

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();

        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

    // show Custemer orders

    public function show_order(Request $request){

        if(Auth::id()){

            $user=Auth::user();

            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

            return view('home.order',compact('order'));
        }
        else{

            return redirect('login');
        }
    }
// cancel order working starts here
    public function cancel_order($id){

        $order=order::find($id);

        $order->delivery_status='You cancel the order';

        $order->save();

        return redirect()->back();

        

    }


    public function product_search(Request $request)
    {

       

        //search start here
        $searchText=$request->search;

        $product=products::where('title','LIKE',"%$searchText%")->
        orWhere('category','LIKE',"$searchText")->paginate(10);

        return view('home.userpage',compact('product'));


    }

    public function product(){

        $product =products::paginate(9);
       
        return view ('home.all_product',compact('product'));
    }

    public function search_product(Request $request)
    {

        $searchText=$request->search;

        $product=products::where('title','LIKE',"%$searchText%")->
        orWhere('category','LIKE',"$searchText")->paginate(10);

        return view('home.all_product',compact('product'));


    }

}
