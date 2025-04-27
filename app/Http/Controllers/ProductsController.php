<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $ProductRepo;

    public function __construct()
    {
        $this->ProductRepo = new ProductRepository();
    }

    public function index()
    {
        $allProducts = ProductModel::all();
        return view ("allProducts", compact("allProducts"));
    }

    public function permalink(ProductModel $product)
    {
        return view("products.permalink", compact('product'));
    }

    public function delete($product)
    {
        $singleProduct = $this->ProductRepo->deleteProduct($product);

        if($singleProduct === null)
        {
            die("OVAJ PROIZVOD NE POSTOJI!");
        }
     $singleProduct->delete();

        return redirect()->back();
    }

    public function singleProduct($id)
    {
        $product = $this->ProductRepo->GetSingleProduct($id);

        return view("products/edit", compact('product'));
    }

    public function edit(Request $request, $id)
    {
        $product = ProductModel::find($id);
        $this->ProductRepo->editProduct($request,$product);

        return redirect()->back();
    }

}
