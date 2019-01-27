<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class back_end extends Controller
{
    public function home(){
        $type = 'published';
        $data['items'] = DB::table('tbl_item')->where('type',$type)->limit(20)->get();
        $data['unserved_orders'] = DB::table('tbl_order')->where('type','unserved')->orderBy('date','DESC')->paginate(20);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.home')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
    }

    public function login(){
        return view('back_end.login');
    }

    public function check_admin(Request $request){
        $data = array();
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $result = DB::table('tbl_admin')->where('email',$data['email'])->where('password',$data['password'])->first();

        if($result){
            Session::put('user_name',$result->name);
            Session::put('user_email',$data['email']);
            return Redirect::to('/admin/home');
        }
        else{
            Session::put('login_failed','Credentials Did not Match');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::put('user_name',null);
        Session::put('user_email',null);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.home')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
    }
    public function categories(){
        $categories = DB::table('tbl_category')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.categories')->with('categories',$categories);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function category_items($category){
        $items = DB::table('tbl_item')->where('category',$category)->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.category_items')->with('items',$items);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function add_category(Request $request){
        $data = array();
        $data['category'] = $request->category;
        $data['date'] = date('Y-m-d');
        $data['addedby'] = Session::get('user_name');
        $this->validate($request, [
            'category_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('category_img')) {
            $image = $request->file('category_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
        }
        $data['image'] = $name;
        DB::table('tbl_category')->insert(array('category'=>$data['category'],'image'=>$data['image'],'date'=>$data['date'],'added_by'=>$data['addedby']));
        $user_email = Session::get('user_email');
        if($user_email){
            return Redirect::to('/admin/categories');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function delete_category($category_id){
        DB::table('tbl_category')->where('id',$category_id)->delete();
        Session::put('delete_category','Category Deleted Successfully');
        $user_email = Session::get('user_email');
        if($user_email){
            return Redirect::to('/admin/categories');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
    public function users(){
        $users = DB::table('tbl_user')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.users')->with('users',$users);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
    
    public function reviews(){
        $reviews = DB::table('tbl_message')->orderBy('date','DESC')->paginate(200);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.reviews')->with('reviews',$reviews);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
    public function add_item(){
        $categories = DB::table('tbl_category')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.add_item')->with('categories',$categories);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function store_item(Request $request){
        $data = array();
        $data['item_name'] = $request->item_name;
        $data['price'] = $request->price;
        $data['item_desc'] = $request->item_desc;
        $data['date'] =  date('Y-m-d'); 
        $data['admin_id'] = null;  
        $data['addedby'] = Session::get('user_name');
        $data['category'] = $request->category; 
        $data['available'] = $request->available;
        $this->validate($request, [
            'item_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($request->hasFile('item_img')) {
            $image = $request->file('item_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
        }
        $data['image'] = $name;
        switch($request->submit) {
            case 'publish': 
                $data['type'] = "published";
                DB::table('tbl_item')->insert(array('item_name'=>$data['item_name'],'price'=>$data['price'],'available'=>$data['available'],'image'=>$data['image'],'item_desc'=>$data['item_desc'],'type' => $data['type'],'category'=>$data['category'], 'publish_date' => $data['date'],'create_date' => $data['date'],'added_by'=>$data['addedby']));
                break;
            
            case 'draft':
                $data['type'] = "draft";
                DB::table('tbl_item')->insert(array('item_name'=>$data['item_name'],'price'=>$data['price'],'available'=>$data['available'],'image'=>$data['image'],'item_desc'=>$data['item_desc'],'type' => $data['type'],'category'=>$data['category'], 'publish_date' => null,'create_date' => $data['date'],'added_by'=>$data['addedby'])); 
                break;
        }
        $user_email = Session::get('user_email');
        if($user_email){
            return Redirect::to('admin/allitems');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function all_items(){
        $items = DB::table('tbl_item')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.all_items')->with('items',$items);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function delete_item($item_id){
        DB::table('tbl_item')->where('id',$item_id)->delete();
        Session::put('delete_item','Item Deleted Successfully');
        $user_email = Session::get('user_email');
        if($user_email){
            return redirect()->back();
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function edit_item($item_id){
        $data['item'] = DB::table('tbl_item')->where('id',$item_id)->first();
        $data['categories'] = DB::table('tbl_category')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.edit_item')->with('data',$data);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function update_item(Request $request,$item_id){
        $item = DB::table('tbl_item')->where('id',$item_id)->first();
        $data = array();
        $data['item_name'] = $request->item_name;
        $data['price'] = $request->price;
        $data['item_desc'] = $request->item_desc;
        $data['date'] =  date('Y-m-d');  
        $data['addedby'] = Session::get('user_name');
        $data['category'] = $request->category; 
        // $this->validate($request, [
        //     'item_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        
        if ($request->hasFile('item_img')) {
            $image = $request->file('item_img');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/upload');
            $image->move($destinationPath, $name);
        }
        else{
            $name = $item->image;
        }
        $data['image'] = $name;
        
        DB::table('tbl_item')->where('id',$item_id)->update(['item_name'=>$data['item_name'],'price'=>$data['price'],'image'=>$data['image'],'item_desc'=>$data['item_desc'],'category'=>$data['category'], 'publish_date' => $data['date'],'update_date' => $data['date'],'added_by'=>$data['addedby']]);
        Session::put('update_item','Item Successfully Updated');
        $user_email = Session::get('user_email');
        if($user_email){
            return Redirect::to('admin/allitems');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
       
    }
    public function draft_items(){
        $category = 'draft';
        $items = DB::table('tbl_item')->where('type',$category)->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.draft_items')->with('items',$items);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function published_items(){
        $type = 'published';
        $items = DB::table('tbl_item')->where('type',$type)->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.published_items')->with('items',$items);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function add_supply($item_id){
        $item = DB::table('tbl_item')->where('id',$item_id)->first();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.add_supply')->with('item',$item);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
    public function update_supply(Request $request,$item_id){
        $add_product = $request->add_product;
        print_r($add_product);
        $item = DB::table('tbl_item')->where('id',$item_id)->first();
        $available = $item->available;
        if($available<0 || $available == null)
            $available = 0;
        $available = $available + $add_product;
        DB::table('tbl_item')->where('id',$item_id)->update(['available'=>$available]);
        Session::put('supply_success','New Supply Successfully Added');
        $user_email = Session::get('user_email');
        if($user_email){
            return redirect()->back();
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function change_type($item_id){
        $item = DB::table('tbl_item')->where('id',$item_id)->first();
        $date = date('Y-m-d');
        if($item->type == 'draft'){
            $change_type = 'published';
            $publish_date = $date;
        }
        else{
            $change_type = 'draft';
            $publish_date = null;
        }
        DB::table('tbl_item')->where('id',$item_id)->update(['type'=>$change_type,'publish_date'=>$publish_date]);
        Session::put('change_message','Item Type Successfully Changed');
        return redirect()->back();
    }
    public function all_orders(){
        $all_orders = DB::table('tbl_order')->orderBy('date','DESC')->paginate(200);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.all_orders')->with('all_orders',$all_orders);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function served_orders(){
        $served_orders = DB::table('tbl_order')->where('type','served')->orderBy('date','DESC')->paginate(200);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.served_orders')->with('served_orders',$served_orders);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
//Down In Session Completed
    public function unserved_orders(){
        $unserved_orders = DB::table('tbl_order')->where('type','unserved')->orderBy('date','DESC')->paginate(200);
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.unserved_orders')->with('unserved_orders',$unserved_orders);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }

    public function serve_item($order_id){
        $order = DB::table('tbl_order')->where('id',$order_id)->first();
        $item_id = $order->item_id;
        $order_quantity = $order->quantity;
        $item = DB::table('tbl_item')->where('id',$item_id)->first();
        $available = $item->available;
        if($available<$order_quantity){
            Session::put('serve_failed','Available item is not enough to serve');
            $user_email = Session::get('user_email');
        if($user_email){
                return redirect()->back();
            }else{
                return view('back_end.login');
            }
            
        }
        else{
            $available = $available - $order_quantity;
            DB::table('tbl_item')->where('id',$item_id)->update(['available'=>$available]);
            DB::table('tbl_order')->where('id',$order_id)->update(['type'=>'served']);
            Session::put('serve_success','Item Served Successfully');
            $user_email = Session::get('user_email');
        if($user_email){
                return redirect()->back();
            }else{
                return view('back_end.login');
            }
            
        }
    }
    public function add_admin(){
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.add_admin');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        return view('back_end.add_admin');
    }

    public function delete_admin(){
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.check_password_admin');
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
    public function store_admin(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['con_password'] = $request->con_password;
        $data['addedby'] = Session::get('user_name');
        $data['date'] = date('Y-m-d');
        if($data['password']!=$data['con_password']){
            Session::put('warning','Password did not match!');
            $user_email = Session::get('user_email');
        if($user_email){
                return Redirect::to('/admin/addadmin');
            }else{
                return view('back_end.login');
            }
            
        }
        else{
            DB::table('tbl_admin')->insert(array('name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password'],'date'=>$data['date'],'added_by'=>$data['addedby']));
            Session::put('admin_success','Admin Added Successfully');
            $user_email = Session::get('user_email');
        if($user_email){
                return Redirect::to('/admin/alladmins');
            }else{
                return view('back_end.login');
            }
            
        }
    }

    public function all_admins(){
        $admins = DB::table('tbl_admin')->get();
        $user_email = Session::get('user_email');
        if($user_email){
            return view('back_end.all_admins')->with('admins',$admins);
        }else{
            Session::put('login_first','You need to log in first');
            return view('back_end.login');
        }
        
    }
}
