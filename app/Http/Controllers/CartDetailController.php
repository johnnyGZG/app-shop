<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;

class CartDetailController extends Controller
{
    public function store (Request $request)
    {
    	$cartDetail = new CartDetail();

    	// Campo calculado en el modelo User
    	$cartDetail->cart_id = auth()->user()->cart->id;
    	// ***********************************

    	$cartDetail->product_id = $request->product_id;
    	$cartDetail->quantity =  $request->quantity;
    	$cartDetail->save();

    	return back();
    }

    public function destroy(Request $request)
    {
        $cartDetail = CartDetail::find($request->cart_detail_id);

        // Comprueba si el carrito de compras pertenese al usuario logueado
        if( $cartDetail->cart_id === auth()->user()->cart->id )
        {
            $cartDetail->delete();
        }

        return back();
    }
}
