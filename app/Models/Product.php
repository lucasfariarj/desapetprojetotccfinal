<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function productLikes(){
        return $this->hasMany(ProductUser::class);
    }

    protected $casts = [
        'info' => 'array'
    ];

    protected $guarded = [];

    public static function getStatus($key = null) {
        $status = [
            2 => 'Indisponível',
            1 => 'Disponível'
        ];

        return $key ? $status[$key] : $status;
    }

}
