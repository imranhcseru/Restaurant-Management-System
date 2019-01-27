<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class front_end extends Controller
{
    public function home(){
        $data = array();
        $data['categories'] = DB::table('tbl_category')->get();
        $data['items'] = DB::table('tbl_item')->where('type','published')->orderBy('create_date', 'DESC')->limit(3)->get();
        $data['message'] = DB::table('tbl_message')->orderBy('date','DESC')->paginate(3);
        return view('front_end.home')->with('data',$data);
    }

    public function category_items($category_name){
        $data = array();
        $data['categories'] = DB::table('tbl_category')->get();
        $data['items'] = DB::table('tbl_item')->where('category',$category_name)->where('type','published')->get();
        return view('front_end.category_items')->with('data',$data);
    }

    public function login_user(){
        $data = array();
        $data['categories'] = DB::table('tbl_category')->get();
        return view('front_end.login')->with('data',$data);
    }

    public function register_user(){
        $data = array();
        $data['categories'] = DB::table('tbl_category')->get();
        return view('front_end.register')->with('data',$data);
    }
    public function logout(){
        Session::put('user_name',null);
        Session::put('user_email',null);
        return Redirect::to('/');
    }
    public function new_recipies(){
        $data['new_recipies'] = DB::table('tbl_item')->where('type','published')->orderBy('create_date', 'DESC')->paginate(15);
        $data['categories'] = DB::table('tbl_category')->get();
        return view('front_end.new_recipies')->with('data',$data);
    }
    public function cuisines(){
        $data['categories'] = DB::table('tbl_category')->get();
        return view('front_end.cuisines')->with('data',$data);
    }
    public function check_user(Request $request){
        $data = array();
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $result = DB::table('tbl_user')->where('email',$data['email'])->where('password',$data['password'])->first();
        if($result){
            Session::put('user_name',$result->name);
            Session::put('user_email',$result->email);
            return Redirect::to('/');
        }
        else{
            Session::put('login_warning','Credentials does not matched!');
            return Redirect::to('/login');
        }
    }
    
    public function store_user(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['con_password'] = $request->con_password;
        $data['date'] = date('Y-m-d');
        $found_email = DB::table('tbl_user')->where('email',$data['email'])->first();
        if($data['password']!=$data['con_password']){
            Session::put('password_warning','Password did not match!');
            return Redirect::to('/register');
        }
        else if($found_email){
            Session::put('email_warning','Email already Registered!');
            return Redirect::to('/register');
        }
        else{
            Session::put('user_name',$data['name']);
            Session::put('user_email',$data['email']);
            DB::table('tbl_user')->insert(array('name'=>$data['name'],'email'=>$data['email'],'password'=>$data['password'],'date'=>$data['date']));
            return Redirect::to('/');
        }
    }

    public function store_message(Request $request){
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;
        $user_name = Session::get('user_name');
        $user_email = Session::get('user_email');
        if($user_name){
            $data['name'] = $user_name;
            $data['email'] = $user_email;
            $data['message'] = $request->message;
        }
        $data['date'] =  date('Y-m-d');
        DB::table('tbl_message')->insert(array('name'=>$data['name'],'email'=>$data['email'],'message'=> $data['message'],'date'=>$data['date']));
        return Redirect::to('/');
    }

    public function order($item_id){
        $data = array();
        $data['item'] = DB::table('tbl_item')->where('id',$item_id)->first();
        $data['categories'] = DB::table('tbl_category')->get();
        return view('front_end.order')->with('data',$data);
    }

    public function item_details($item_id){
        $data = array();
        $data['item'] = DB::table('tbl_item')->where('id',$item_id)->first();
        $data['categories'] = DB::table('tbl_category')->get();
        return view('front_end.item_details')->with('data',$data);
    }

    public function order_item(Request $request ,$item_id){
        $data = array();
        $data['item_id'] = $item_id;
        $item = DB::table('tbl_item')->where('id',$data['item_id'])->first();
        $data['item_name'] = $item->item_name;
        $data['quantity'] = $request->quantity;
        $user_name = Session::get('user_name');
        $user_email = Session::get('user_email');
        if($user_name){
            $data['name'] = $user_name;
            $data['email'] = $user_email;
        }
        else{
            $data['name'] = $request->name;
            $data['email'] = $request->email;
        }
        $data['type'] = "unserved";
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['date'] = date('Y-m-d');
        DB::table('tbl_order')->insert(array('item_id'=>$data['item_id'],'item_name'=>$data['item_name'],'quantity'=>$data['quantity'],'name'=>$data['name'],'email'=>$data['email'],'phone'=>$data['phone'],'address'=>$data['address'],'date'=>$data['date'],'type'=>$data['type']));
        Session::put('order_success','Order Successfully Submitted');
        return redirect()->back();
    }
}
