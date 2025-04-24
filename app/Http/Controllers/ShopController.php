<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductRepository();
    }
    public function index()
    {
     $products = ProductModel::all();

        return view("shop", compact ("products"));
    }

    public function AddProducts(Request $request)
    {
       return view ("/admin/add-product");
    }

    public function CreateProducts(SaveProductRequest $request)
    {
       $this->productRepo->createNewProduct($request);

        return redirect("admin/all-products");
    }

    public function ShowAllProducts()
    {
        $products = ProductModel::all();

        return view("/admin/products", compact("products"));
    }

}















