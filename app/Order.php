<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $fillable=['customer_name','customer_surname','customer_email',
'customer_address','order_active','notes','amount'];

public function dishes(){
    return  $this->belongsToMany('App\Dish');
}
}
