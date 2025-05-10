<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ProductModel;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $data = $request->only(['name', 'description', 'amount', 'price']);

        if($request->hasFile('image'))
        {
            $path = $request->file('image')->store('images', 'public');

            $data['image'] = $path;
        }

        $this->productRepo->createNewProduct($data);

        return redirect("/");
    }

    public function ShowAllProducts()
    {
        $products = ProductModel::all();

        return view("/admin/products", compact("products"));
    }

}















