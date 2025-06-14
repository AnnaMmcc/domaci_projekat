<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{

    public function index()
    {
        $korpa = Session::get('product', []);

        if (count($korpa) < 1) {
            return redirect('/');
        }

        $combined = collect($korpa)->map(function ($item) {
            $product = ProductModel::find($item['product_id']);
            if (!$product) return null;

            return [
                'name' => $product->name,
                'amount' => $item['amount'],
                'description' => $product->description,
                'price' => $product->price,
                'image' => $product->image,
                'total' => $item['amount'] * $product->price
            ];
        })->filter()->values();

        $totalPrice = $combined->sum('total');

        return view("cart",
            ['combinedItems' => $combined,
                'totalPrice' => $totalPrice
            ]);
    }

    public function addToCart(CartAddRequest $request)
    {
        $product = ProductModel::find($request->id);

        if (!$product || $product->amount < $request->amount) {
            return redirect()->back()->with('error', 'Nema dovoljno proizvoda na stanju');
        }


        $korpa = Session::get('product', []);
        foreach ($korpa as &$item) {
            if ($item['product_id'] == $request->id) {
                $item['amount'] += $request->amount;
                Session::put('product', $korpa);
                return redirect()->route('cart.index')->with('success', 'Količina ažurirana u korpi');
            }
        }

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount
        ]);

        return redirect()->route('cart.index')->with('success', 'Proizvod uspešno dodat u korpu');
    }

    public function finishOrder()
    {
        $korpa = Session::get('product', []);

        if (empty($korpa)) {
            return redirect()->route('cart.index')->with('error', 'Korpa je prazna');
        }

        $totalCartPrice = 0;
        foreach ($korpa as $item) {
            $product = ProductModel::find($item['product_id']);

            if (!$product || $item['amount'] > $product->amount) {
                return redirect()->back()->with('error', 'Nema dovoljno proizvoda na stanju');
            }

            $totalCartPrice += $item['amount'] * $product->price;
        }

        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice
        ]);

        foreach ($korpa as $item) {
            $product = ProductModel::find($item['product_id']);

            $product->decrement('amount', $item['amount']);

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price
            ]);
        }

        Session::forget('product');

        return view("thankYou");
    }

    public function guestAdd(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('cart.add.from.redirect', [
                'id' => $request->id,
                'amount' => $request->amount,
                'back' => $request->redirect ?? url()->previous()
            ]);
        }

        return redirect()->route('register', [
            'redirect' => route('cart.add.from.redirect', [
                'id' => $request->id,
                'amount' => $request->amount,
                'back' => $request->redirect ?? url()->previous()
            ])
        ]);
    }
    public function addFromRedirect(Request $request)
    {
        $productId = $request->input('id');
        $amount = $request->input('amount', 1);

        $product = ProductModel::find($productId);

        if (!$product || $product->amount < $amount) {
            return redirect()->route('cart.index')->with('error', 'Nema dovoljno proizvoda na stanju');
        }

        $korpa = Session::get('product', []);
        $postoji = false;

        foreach ($korpa as &$item) {
            if ($item['product_id'] == $productId) {
                $item['amount'] += $amount;
                $postoji = true;
                break;
            }
        }

        if (!$postoji) {
            $korpa[] = [
                'product_id' => $productId,
                'amount' => $amount
            ];
        }

        Session::put('product', $korpa);

        session()->flash('success', 'Proizvod je dodat u korpu');

        return redirect($request->input('back', route('cart.index')));
    }


}
