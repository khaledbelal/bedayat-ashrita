<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Sheikh extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'description', 'image_path',
    ];
 	
 	public function user(){ 
        return $this->belogsTo(User::class,'user_id');
    }


    public function moqdamt(){ 
        return $this->hasMany(Moqdma::class,'sheikh_id');
    } 
}	
