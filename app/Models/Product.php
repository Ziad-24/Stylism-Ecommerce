<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'price',
        'img',
        'details',
        'category_id',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category' , 'category_id','id');
    }


    public function users()
    {
        return $this -> belongsToMany('App\Models\User' , 'product_user' , 'product_id' , 'user_id');
    }
}
