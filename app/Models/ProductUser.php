<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductUser extends Model
{
    use HasFactory;

    protected $table = 'product_user';

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function productLike(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function products(){
        return $this->belongsTo(Product::class,'product_id','id');
    }

    public function isOwner(){
        return $this->user_id === Auth::user()->id;  
    }
}
