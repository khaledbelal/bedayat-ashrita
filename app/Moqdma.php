<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Moqdma extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "moqdmat";
    protected $fillable = [
        'name', 'description', 'path', 'image_path','total_views','sheikh_id','user_id'
    ];
 	
 	public function user(){ 
        return $this->belongsTo(User::class,'user_id');
    } 

    public function sheikh(){ 
        return $this->belongsTo(Sheikh::class,'sheikh_id');
    }
}
