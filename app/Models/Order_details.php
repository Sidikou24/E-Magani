<?php

namespace App\Models;

use App\Models\Orders;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_details extends Model
{
    use HasFactory;
    protected $fillable=['order_id', 'product_id',
                        'unitprice', 'quantity',
                        'amount', 'discount','num_lot','pharmacie_nom'];

    public function produit(){
        return $this->belongsTo('App\Models\Produit');
    }

    public function order(){
        return $this->belongsTo('App\Models\Orders');
    }
}
