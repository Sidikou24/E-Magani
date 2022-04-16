<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Orders;
use App\Models\Produit;
use App\Models\Pharmacie;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\Order_details;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pharmacie_id)
    {
        $user_ids = auth()->user()->id;
        $pharmacie = Pharmacie::find($pharmacie_id);
        // $pharmacien = auth()->user();
        // $produits = $pharmacien->produits; //DB::table('produits')->where('user_id',$user_id)->get();
        $orders = Orders::where('user_id',$user_ids AND 'pharmacie_nom',$pharmacie->name)->get();

        $lastID= Order_details::where('pharmacie_nom',$pharmacie->name)
                                                                    ->max('order_id');
         // lats order details
         $order_receipt = Order_details::where('order_id', $lastID)->get();
        $produits = DB::table('produits')
                                        ->where('user_id',$user_ids)
                                        ->where('pharmacie_nom',$pharmacie->name)
                                        ->get();
        return view('dashboards.orders.index',[
            'produits'=>$produits,
            'pharmacie'=>$pharmacie,
            'orders'=>$orders,
            'order_receipt'=>$order_receipt,
        ]);
        // ,compact('produits','pharmacie','orders')
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pharmacie_id)
    {
        return $request->all();
       
      DB::transaction(function() use($request,$pharmacie_id){
        $user_ids = auth()->user()->id;
        $pharmacie = Pharmacie::find($pharmacie_id);
        //   Order Modal
        $orders = new Orders;
        $orders->name = $request->customer_name;
        $orders->phone= $request->customer_phone;
        $orders->user_id= $user_ids;
        $orders->pharmacie_nom= $pharmacie->name;
        $orders->save();
                $order_id= $orders->id;

        // Orders Details Modal
        for ($i=0; $i < count($request->produit_id) ; $i++) { 
            $order_details = new Order_details;
            $order_details->order_id = $order_id;
            $order_details->product_id = $request->produit_id[$i];
            $order_details->unitprice = $request->prix[$i];
            $order_details->quantity = $request->quantite[$i];
            $order_details->amount = $request->total_amount[$i];
            $order_details->discount = $request->discount[$i];
            $order_details->num_lot = $request->num_lot[$i];
            $order_details->pharmacie_nom= $pharmacie->name;
            $order_details->save();
        }

            // 'order_id', 'paid_amount',
            //             'balance', 'payment_method',
            //             'user_id', 'transac_date',
            //             'transac_amount'
            // Transaction Modal
            $transaction = new Transaction;
            $transaction->order_id= $order_id;
            $transaction->balance = $request->balance;
            $transaction->payment_method = $request->payment_method;
            $transaction->user_id = $user_ids;
            $transaction->transac_date = date('Y-m-d');
            $transaction->paid_amount = $request->paid_amount;
            $transaction->transac_amount = $order_details->amount;
            $transaction->pharmacie_nom= $pharmacie->name;
            $transaction->save();
            //   Historiques des dernieres Commandes
            $produits = DB::table('produits')
                                            ->where('user_id',$user_ids)
                                            ->where('pharmacie_nom',$pharmacie->name)
                                            ->get();
            $order_details = Order_details::where('order_id', $order_id)->get();
            $orderedBy = Orders::where('id',$order_id)->get();

            return view('dashboards.orders.index',[
                'produits' =>$produits,
                'order_details'=> $order_details,
                'customer_orders'=> $orderedBy,
                'pharmacie'=> $pharmacie
                // ,compact('produits','pharmacie','orders')
            ]);
      });

      return back()->with("L'insertion de produits a echouers");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $orders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
