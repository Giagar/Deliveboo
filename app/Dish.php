<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable=['user_id','name','description','vegan','gluten','price','type','visible','img'];
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function orders(){
        return  $this->belongsToMany('App\Order');
    }
}
