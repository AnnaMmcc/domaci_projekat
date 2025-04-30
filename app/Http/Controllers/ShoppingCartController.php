<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $combined = [];

        foreach (Session::get('product') as $item) {

            $product = ProductModel::firstWhere(['id' => $item['product_id']]);
            if($product)
            {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'description' => $product->description,
                    'price' => $product->price,
                    'total' => $item['amount'] * $product->price
                ];
            }
        }

        return view("cart", [
            'combinedItems' => $combined
        ]);
    }
    public function addToCart(CartAddRequest $request)
    {

       $product = ProductModel::where(['id' => $request->id])->first();

       if ($product->amount < $request->amount)
       {
           return redirect()->back()->with('error', 'Nema dovoljno proizvoda na stanju');
       }

       Session::push('product', [
           'product_id' => $request->id,
           'amount' => $request->amount
       ]);

        return redirect()->route('cart.index')->with('success', 'Proizvod uspesno dodat u korpu');
    }
}
