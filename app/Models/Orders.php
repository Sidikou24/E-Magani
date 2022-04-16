<?php

namespace App\Models;

use App\Models\Order_details;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Orders extends Model
{
    use HasFactory;
    protected $fillable=['name', 'phone','user_id','pharmacie_nom',];

    public function orderdetail(){
        return $this->hasMany('App\Models\Order_details');
    }  
}
