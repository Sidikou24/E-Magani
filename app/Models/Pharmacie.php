<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Produit;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Pharmacie extends Model
{
    use HasFactory;
    protected $fillable = [
        'pharmacien_id',
        'name',
        'nom_proprio',
        'localite',
        'dateCrea',
        'nbrAgent',
    ];

    public function user(){
        return $this->hasOne('App\User');
    }

    public function produits(){
         return $this->belongsToMany(Produit::class);
    }
}
