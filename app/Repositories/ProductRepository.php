<?php

namespace App\Repositories;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ProductRepository
{
    //DI Dependency injection

    private $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

   public function createNewProduct($data)
   {
       $this->productModel->create([
           "name" => $data["name"],
           "description" => $data['description'],
           "amount" =>  $data['amount'],
           "price" =>  $data['price'],
           "image" =>  $data['image'] ?? null,
       ]);
   }

   public function deleteProduct($product)
   {
     return  $this->productModel->where(['id' => $product])->first();
   }

   public function editProduct($request, $product )
   {
       $product->name = $request->get("name");

       $product->description = $request->get("description");

       $product->amount = $request->get("amount");

       $product->price = $request->get("price");

       $product->image = $request->get("image");

       $product->save();
   }

   public function GetSingleProduct($id)
   {
       return $this->productModel->where(['id' => $id])->first();
   }
}
