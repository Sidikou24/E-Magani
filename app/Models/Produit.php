<?php

namespace App\Models;

use App\Pharmacie;
use App\Models\Order_details;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'num_lot',
        'quantite',
        'prix',
        'dateFAb',
        'datePer',
        'alert_stock',
        'pharmacie_nom',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function pharmacies(){
        return $this->belongsTo(Pharmacie::class);
    }

    public function orderdetail(){
        return $this->hasMany('App\Models\Order_details');
    }      
}
