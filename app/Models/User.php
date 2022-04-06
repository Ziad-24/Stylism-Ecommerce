<?php

namespace App\Models;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'googleId',
        'utype'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_verified_at',
        'googleId',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // Relations

    public function products()
    {   
        return $this -> belongsToMany('App\Models\Product' , 'product_user' , 'user_id' , 'product_id');
    }



    // when creating a new user this event will get fired right away

    protected static function boot()
    {
        parent::boot();
        static::created(function($user){


            // $user -> profile() -> create([
            //     'title' => $user -> username,
                
            // ]);
            
            

        });
    }
}
