<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Order extends Component
{
    public $produit_numRef;
    public function render()
    {
        return view('livewire.order');
    }
    public function InsertoCart()
    {
        $countProduit = Produit::where('id',$this->produit_numRef)->get();
        dd($countProduit);
    }
}
