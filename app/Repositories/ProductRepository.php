<?php

namespace App\Repositories;

use App\Models\ProductModel;

class ProductRepository
{
    //DI Dependency injection

    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

   public function createNewProduct($request)
   {
       $this->productModel->create([
           "name" => $request->get("name"),
           "description" => $request->get("description"),
           "amount" => $request->get("amount"),
           "price" => $request->get("price"),
           "image" => $request->get("image"),
       ]);
   }

   public function deleteProduct($product)
   {
     return  $this->productModel->where(['id' => $product])->first();
   }

   public function editProduct($product, $request)
   {
       $product->name = $request->get("name");

       $product->description = $request->get("description");

       $product->amount = $request->get("amount");

       $product->price = $request->get("price");

       $product->image = $request->get("image");

       $product->save();
   }
}
