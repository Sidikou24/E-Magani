<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'pharmacien_id',
        'name',
        'prenom',
        'email',
        'fonction',
        'pharmacie_nom',
        'pharmacie_id',
        'num_reference',
        'dateNaiss',
        'pays',
        'ville',
        'codePostal',
        'numTel',
        'sexe',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime', 
    ];


    public function getImageAttribute($value){
        if($value){
            return asset('users/images/'.$value);
        }else{
            return asset('users/images/no-image.png');
        }
    }
    public function Produits(){
        return $this->hasMany(Produit::class)->latest();
    }
    public function Pharmacies(){
        return $this->hasMany(Pharmacie::class)->latest();

    }
}
