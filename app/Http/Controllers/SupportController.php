<?php

namespace App\Http\Controllers;

use App\Mail\UserDeleted;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\ProductUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function index(){
        $allUsers = User::all();
        $allProducts = Product::all();
        return view('support.index',['allProducts' => $allProducts,'allUsers' => $allUsers]);
    }

    public function products(){
        $products = Product::all();
        return view('support.products',['products' => $products]);
    }

    public function users(){
        $users = User::all();
        $productLikes = ProductUser::all();
        $products = Product::all();
        return view('support.users',['users' => $users,'productLikes' => $productLikes,'products' => $products]);
    }

    public function searchUser(){
        $userName = request('nameUser');
        $usersSearch = User::where('name','LIKE','%'.$userName.'%')->OrWhere('id',$userName)->OrWhere('telefone',$userName)
        ->OrWhere('email','LIKE',$userName)->get();
        //$productName = request('productName');
        //$product = Product::where('title','LIKE',$productName)->get();
        return view('support.usersSearch',['usersSearch' => $usersSearch]);
    }

    public function productsUserList($id){
        $user = User::findOrFail($id);
        $productUser = Product::where('user_id',$id)->get();
        return view('support.userProductList',['user' => $user,'productUser' => $productUser]);
    }

    public function searchProduct(){
        $productName = request('nameProduct');
        $productSearch = Product::where('title','LIKE','%'.$productName.'%')->OrWhere('id',$productName)
        ->OrWhere('category',$productName)->get();
        return view('support.productList',['productSearch' => $productSearch]);
    }

    public function alertDelete($id){
        $product = Product::findOrFail($id);
        return view('support.userDeleteProduct',['product' => $product]);
    }

    public function destroyProduct($id){
        $product = Product::where('id',$id)->first();
        $productUser = ProductUser::where('product_id',$id);
        $user = User::where('id',$product->user_id)->first();
        DB::insert("INSERT INTO trash (title,created_at,updated_at,description,category,status,info,user_id) SELECT title,created_at,updated_at,description,category,status,info,user_id FROM products WHERE id = $id");
        $data = array(
            'title' => $product->title,
            'data' => $product->created_at,
            'email' => $user->email,
            'id' => $id,
            'motivo' => request('motivo')
        );
        $userAdmin = User::where('admin',1)->first();
        Mail::to($user->email)->send(new \App\Mail\SendReport($data));
        Mail::to($userAdmin->email)->send(new \App\Mail\AdminReportFeedback($data));
        $productUser->delete();
        $product->delete();
        return redirect('dashboard');
    }

    public function alertDeleteUser($id){
        $user = User::findOrFail($id);
        return view('support.userDelete',['user' => $user]);
    }

    public function destroyUser($id){
        $user = User::where('id',$id)->first();
        $data = array(
            'id' => $id,
            'name' => $user->name,
            'email' => $user->email,
            'telefone' => $user->telefone,
            'motivo' => request('motivo')
        );
        $userAdmin = User::where('admin',1)->first();
        Mail::to($user->email)->send(new UserDeleted($data));
        Mail::to($userAdmin->email)->send(new \App\Mail\AdminUserDeleteFeedback($data));
        $productUser = ProductUser::where('user_id',$id);
        $products = Product::where('user_id',$id);
        $user = User::where('id',$id)->first();
        $productUser->delete();
        $products->delete();
        $user->delete();
        return redirect('/');
    }

    public function userInformations($id){
        $user = User::findOrFail($id);
        return view();
    }

    public function updateUserInformation(Request $request){
        $updateEmail = $request->email;
        $updatePassword = md5($request->password);
        $user = User::findOrFail($request->id);
        $user->udpate($updateEmail);
        $user->update($updatePassword);
        return redirect('/dashboard');
    }
}
