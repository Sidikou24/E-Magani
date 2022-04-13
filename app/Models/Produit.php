<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Pharmacie;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
}
