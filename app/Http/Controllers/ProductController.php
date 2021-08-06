<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\ProductUser;
use App\Mail\UserRegisteredEmail;
Use Mail;
Use App\Mail\SendReport;

class ProductController extends Controller
{
    public function index()
    {
        $search = request('search');
        $filter = request('filter');
        if ($search) {
            $produtos = Product::where('title', 'like', '%' . $search . '%')->where('category',$filter)->get();
        } else {
            $produtos = Product::paginate(5);
        }
        return view('index', ['produtos' => $produtos, 'search' => $search]);
    }

    public function search(Request $request)
    {
        $filter = $request->filter;
        $column = $request->column;
        $user = auth()->user();
        $userId = auth()->id();
        $products = Product::where('category', 'LIKE', '%' . $filter . '%')->where('user_id',$userId)->paginate(10);
        //ProductUser::where('category', 'LIKE', '%' . $filter . '%');
        $produtosInteressados = $user->userProduct;
        return view('products.dashboard', ['products' => $products, 'produtosInteressados' => $produtosInteressados])->with('filter', $filter)->with('column', $column);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->status = 1;
        $product->category = $request->category;
        if($request->info == null) {
            $request->info = ['Outros'];
        }else{
        $product->info = $request->info;
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->image;
            $extension = $image->extension();
            $nameImage = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            //Save image on server
            $image->move(public_path('img/products'), $nameImage);
            $product->image = $nameImage;
        }

        $user = auth()->user();
        $product->user_id = $user->id;

        $product->save();
        return redirect('/')->with('msg', 'Produto criado com sucesso!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $productUser = User::where('id', $product->user_id)->first()->toArray();
        $userId = auth()->id();
        $user = auth()->user();
        $produtoPertence = false;
        if($user){
            $userProducts = $user->userProduct->toArray();
            foreach($userProducts as $up){
                if($up['id'] == $id){
                    $produtoPertence = true;
                }
            }
        }
        return view('products.show', ['product' => $product, 'productUser' => $productUser, 'userId' => $userId, 'produtoPertence' => $produtoPertence]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $products = $user->products;
        $produtosInteressados = $user->userProduct;
        return view('products.dashboard', ['products' => $products, 'produtosInteressados' => $produtosInteressados,'user' => $user]);
    }

    public function destroy($id)
    {
        DB::insert("INSERT INTO trash (title,created_at,updated_at,description,category,status,info,user_id) SELECT title,created_at,updated_at,description,category,status,info,user_id FROM products");
        Product::findOrFail($id)->delete();
        return redirect('/dashboard')->with('msg', 'Produto deletado com sucesso!');
    }

    public function edit($id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);

        if ($user->id != $product->user_id) {
            return redirect('/dashboard');
        }
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request)
    {
        $dado = $request->all();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->image;
            $extension = $image->extension();
            $nameImage = md5($image->getClientOriginalName() . strtotime("now")) . "." . $extension;
            //Save image on server
            $image->move(public_path('img/products'), $nameImage);
            $dado['image'] = $nameImage;
        }

        Product::findOrFail($request->id)->update($dado);

        return redirect('/dashboard')->with('msg', 'Produto atualizado com sucesso!');
    }

    public function likeProduct($id)
    {
        $user = auth()->user();
        $userId = auth()->id();
        $product = Product::findOrFail($id);
        if ($userId == $product->user_id) {
            return redirect('/');
        }
        $user->userProduct()->attach($id);
        return redirect('/dashboard')->with('msg', 'Produto adicionado a sua lista de interesses!' . $product->title);
    }

    public function unlikeProduct($id)
    {
        $user = auth()->user();
        $user->userProduct()->detach($id);
        $product = Product::findOrFail($id);
        return redirect('/dashboard')->with('msg', 'Você removeu o ' . $product->title . ' da sua lista de interesses');
    }

    public function infoProduct($id)
    {
        $productLikes = ProductUser::where('product_id', $id)->get();
        $productUserId = Product::where('id',$id)->first();
        $userId = auth()->id();
        if($productUserId->user_id === $userId){
            return view('products.info', ['productLikes' => $productLikes]);
        }else{
            return redirect('/dashboard')->with('msg','Você não tem permissão para acessar acessar essa página!');
        }
    }

    public function infoLike($id)
    {
        $product = Product::findOrFail($id);
        $userId = auth()->id();
        $productBelongs = ProductUser::where('user_id', $userId)->where('product_id', $id)->first();
        if ($productBelongs) {
            $productUser = User::where('id', $product->user_id)->first()->toArray();
            return view('products.mylikes', ['product' => $product, 'productUser' => $productUser, 'userId' => $userId]);
        } else {
            return redirect('/dashboard');
        }
    }

    public function confirmDelete($id){
        $product = Product::findOrFail($id);
        if($product->user_id == auth()->id()){
            return view('products.confirmDelete',['product' => $product]);
        }else{
            return redirect('/dashboard');
        }
        
    }

    public function report($id){
        $product = Product::where('id',$id)->first();
        return view('products.report',['product' => $product]);
    }

    public function sendReport(Request $request){
        $userAuth = auth()->user();
        $productId = Product::where('id',$request->id)->first();
        $userProduct = User::where('id',$productId->user_id)->first();
        $userAdmin = User::where('admin',1)->first();
        $data = array(
            'title' => $request->title,
            'id' => $request->id,
            'email' => $userProduct->email,
            'message' => $request->message
        );
        Mail::to($userAuth->email)->send(new \App\Mail\ReportProduct($data));
        Mail::to($userAdmin->email)->send(new \App\Mail\ReportUserNotification($data));
        return redirect('/dashboard');
    }

    public function sendEmailReport($id){
        $product = Product::findOrFail($id);
        $userProduct = User::where('id',$product->user_id)->first();
        \Mail::to($userProduct->email)->send(new \App\Mail\UserRegisteredEmail($userProduct));
        return view('email.welcome');
    }

    public function resetPassword(){
        return view('auth.reset-password');
    }
}
