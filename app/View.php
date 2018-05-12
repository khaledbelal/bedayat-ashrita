<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class View extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'moqdma_id', 'user_id','sheikh_id'
    ];
 

    public function moqdma(){ 
        return $this->belongsTo(Moqdma::class,'moqdma_id');
    } 

    public function sheikh(){ 
        return $this->belongsTo(Sheikh::class,'sheikh_id');
    }

}
