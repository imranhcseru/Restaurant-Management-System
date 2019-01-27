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
        return view('back_end.home');
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
        return Redirect::to('/admin');
    }
    public function categories(){
        $categories = DB::table('tbl_category')->get();
        return view('back_end.categories')->with('categories',$categories);
    }

    public function category_items($category){
        $items = DB::table('tbl_item')->where('category',$category)->get();
        return view('back_end.category_items')->with('items',$items);
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
        return Redirect::to('/admin/categories');
    }
    public function edit_category(){

    }

    public function delete_category($category_id){
        DB::table('tbl_category')->where('id',$category_id)->delete();
        Session::put('delete_category','Category Deleted Successfully');
        return Redirect::to('/admin/categories');
    }
    public function users(){
        $users = DB::table('tbl_user')->get();
        return view('back_end.users')->with('users',$users);
    }
    
    public function reviews(){
        $reviews = DB::table('tbl_message')->orderBy('date','DESC')->paginate(200);
        return view('back_end.reviews')->with('reviews',$reviews);
    }
    public function add_item(){
        $categories = DB::table('tbl_category')->get();
        return view('back_end.add_item')->with('categories',$categories);
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
                DB::table('tbl_item')->insert(array('item_name'=>$data['item_name'],'price'=>$data['price'],'image'=>$data['image'],'item_desc'=>$data['item_desc'],'type' => $data['type'],'category'=>$data['category'], 'publish_date' => $data['date'],'create_date' => $data['date'],'added_by'=>$data['addedby']));
                break;
            
            case 'draft':
                $data['type'] = "draft";
                DB::table('tbl_item')->insert(array('item_name'=>$data['item_name'],'price'=>$data['price'],'image'=>$data['image'],'item_desc'=>$data['item_desc'],'type' => $data['type'],'category'=>$data['category'], 'publish_date' => null,'create_date' => $data['date'],'added_by'=>$data['addedby'])); 
                break;
        }
        return Redirect::to('admin/allitems');
    }

    public function all_items(){
        $items = DB::table('tbl_item')->get();
        return view('back_end.all_items')->with('items',$items);
    }

    public function delete_item($item_id){
        DB::table('tbl_item')->where('id',$item_id)->delete();
        Session::put('delete_item','Item Deleted Successfully');
        return redirect()->back();
    }

    public function edit_item($item_id){

    }
    public function draft_items(){
        $category = 'draft';
        $items = DB::table('tbl_item')->where('type',$category)->get();
        return view('back_end.draft_items')->with('items',$items);
    }

    public function published_items(){
        $category = 'published';
        $items = DB::table('tbl_item')->where('type',$category)->get();
        return view('back_end.published_items')->with('items',$items);
    }

    

    public function all_orders(){
        $all_orders = DB::table('tbl_order')->orderBy('date','DESC')->paginate(200);
        return view('back_end.all_orders')->with('all_orders',$all_orders);
    }

    public function served_orders(){
        $served_orders = DB::table('tbl_order')->where('type','served')->orderBy('date','DESC')->paginate(200);
        return view('back_end.served_orders')->with('served_orders',$served_orders);
    }

    public function unserved_orders(){
        $unserved_orders = DB::table('tbl_order')->where('type','unserved')->orderBy('date','DESC')->paginate(200);
        return view('back_end.unserved_orders')->with('unserved_orders',$unserved_orders);
    }

    public function serve_item($order_id){
        DB::table('tbl_order')->where('id',$order_id)->update(['type'=>'served']);
        Session::put('serve_success','Item Served Successfully');
        return redirect()->back();
    }
    public function add_admin(){
        return view('back_end.add_admin');
    }

    public function delete_admin(){
        return view('back_end.check_password_admin');
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
            return Redirect::to('/admin/addadmin');
        }
        else{
            DB::table('tbl_admin')->insert(array('name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password'],'date'=>$data['date'],'added_by'=>$data['addedby']));
            Session::put('admin_success','Admin Added Successfully');
            return Redirect::to('/admin/alladmins');
        }
    }

    public function all_admins(){
        $admins = DB::table('tbl_admin')->get();
        return view('back_end.all_admins')->with('admins',$admins);
    }
}
