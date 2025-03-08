<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $allProducts = ProductModel::all();
        return view ("allProducts", compact("allProducts"));
    }

    public function delete($product)
    {
        $singleProduct = ProductModel::where(['id' => $product])->first();
        if($singleProduct === null)
        {
            die("OVAJ PROIZVOD NE POSTOJI!");
        }
     $singleProduct->delete();

        return redirect()->back();
    }

    public function singleProduct(Request $request, $id)
    {
        $product = ProductModel::where(['id' => $id])->first();

        if($product === null)
    {
        die("Ovaj proizvod ne postoji");
    }

        return view("products/edit", compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = ProductModel::where(['id' => $id])->first();

        if($product === null)
        {
            die("proizvod ne postoji");
        }
        $product->name = $request->get("name");

        $product->description = $request->get("description");

        $product->amount = $request->get("amount");

        $product->price = $request->get("price");

        $product->image = $request->get("image");

        $product->save();

        return redirect()->back();
    }

}
