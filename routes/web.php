<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get("/",[ HomeController::class, 'index'])->name('home');
Route::view("/about", "about");
Route::get("shop", [ShopController::class, 'index']);
Route::post("/create-product", [ShopController::class, 'CreateProducts']);
Route::post("/send-contact", [ContactController::class, "sendContact"])->name("Send.Contact");
Route::get("/contact", [ContactController::class, 'index']);



Route::middleware(["auth", \App\Http\Middleware\AdminCheck::class])->prefix("admin")->group(function (){

Route::controller(ContactController::class)->prefix("/contact")->group(function (){
    Route::get("/all", 'getAllContacts')
    ->name("allContacts");
    Route::get("/delete/{contact}",'delete')
        ->name("contact.delete");
    Route::get("/edit/{id}",'editContact')
        ->name("contact.edit");
    Route::post("/save/{id}", 'saveContact')
        ->name("save.contact");

});

   Route::controller(ShopController::class)->group(function (){
       Route::get("/add-product",'AddProducts');
       Route::get("/products",'ShowAllProducts');
   });


Route::controller(ProductsController::class)->prefix("products")->group(function (){
    Route::get("/all",'index');
    Route::get("/edit/{id}","singleProduct")
        ->name("product.single");
    Route::post("/save/{id}",'edit')
        ->name('product.save');
    Route::get("/delete/{product}",'delete')
        ->name("obrisiProizvod");
});

});

require __DIR__.'/auth.php';
