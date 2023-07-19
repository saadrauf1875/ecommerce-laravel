<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\AdminController;

use App\Models\Category;

use App\Models\Products;

use App\Models\Order;

use PDF;

use Notification;

use App\Notifications\SendEmailNotification;

use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{


    public function temp(){
        return view('admin.temp');
    }
    // view category table + send data to page
    public function view_category(){

        if(Auth::id())
        {
            $data=category::all();

            return view('admin.view_category',compact('data'));
    
       }
        else{

            return redirect('login');
        }
        
    }

    //Add Catagory data to database
    public function add_category(Request $request){

       $data =new category;

       $data->category_name=$request->category_name;

       $data->save();

       return redirect()->back()->with('message','Category Added Successfully!');

    }

    // deletee cltagory table data here
    public function delete_category($id){

        $data=category::find($id);

        $data->delete();

        return redirect()->back()->with('message','Category deleted successfully!');

    }

    // Gog to Products

    public function products(){

        $category=category::all();
        return view('admin.products',compact('category'));
    }
// Add product into database
    public function add_products(Request $request){

        $data =new products;

        $image=$request->image;

        $imagename= time().'.'.$image->getClientOriginalExtension();
         
        $request->image->move('productimage',$imagename);
        
        $data->image=$imagename;

        $data->title=$request->title;

        $data->description=$request->description;

        $data->quantity=$request->quantity;

        $data->price=$request->price;

        $data->discount_price=$request->discount_price;

        $data->category=$request->category;

 
        $data->save(); 
        return redirect()->back()->with('message','Image added successfully!');
    }

// view Products send data to page
    public function view_products(){
        $data=products::all();

        return view('admin.view_products',compact('data'));
    }

//delete product data

// deletee cltagory table data here
public function delete_products($id){

    $data=products::find($id);

    $data->delete();

    return redirect()->back()->with('message','Product deleted successfully!');

}
//return product update values on page
public function update($id){

    $data=products::find($id);
    return view('admin.update',compact('data'));

}
// update data by==> id in database
public function update_products(Request $request,$id)

{
    $data=products::find($id);
    
    $image=$request->image;

    $imagename= time().'.'.$image->getClientOriginalExtension();
     
    $request->image->move('productimage',$imagename);
    
    $data->image=$imagename;

    $data->title=$request->title;

    $data->description=$request->description;

    $data->quantity=$request->quantity;

    $data->price=$request->price;

    $data->discount_price=$request->discount_price;

    $data->category=$request->category;


    $data->save(); 
    return redirect()->back()->with('message','Product Updated successfully!');
}


public function order(){

    $data=order::get();

    return view('admin.order',compact('data'));
}

//send order data to page
public function order_delivered($id){

    $data=Order::find($id);

    $data->delivery_status='delivered';

    $data->save();

    return redirect()->back()->with('message','Order Delivered!');

}

//Print pdf download working

public function print_pdf($id){

    $order=order::find($id);

    $pdf=PDF::loadview('admin.pdf',compact('order'));

    return $pdf->download('order_details.pdf');
}

// send emeil data 
public function send_email($id){

    $order=order::find($id);
    return view('admin.email_info',compact('order'));
}

public function send_user_email(Request $request ,$id){

    $order=order::find($id);

    $details = [
        'greeting' => $request->greeting,
        'firstline' => $request->firstline,
        'body' => $request->body,
        'button' => $request->button,
        'url' => $request->url,
        'lastline' => $request->lastline,
    ];

    Notification::send($order, new SendEmailNotification($details));

    //dd('done');

    return redirect()->back();



}
// send search results from order table to order page.
public function search_data(Request $request){

    $searchText=$request->search;

    $data=order::where('name','LIKE',"%$searchText%")->orWhere
    ('phone','LIKE',"%$searchText%") ->orWhere
    ('product_title','LIKE',"%$searchText%")->get();

    return view('admin.order',compact('data'));

}

}
