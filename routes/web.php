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
Route::get("/products/{product}", [ProductsController::class, 'permalink'])->name("products.permalink");
Route::post("/cart/add", [\App\Http\Controllers\ShoppingCartController::class, 'addToCart'])->name('cart.add');
Route::get("/cart", [\App\Http\Controllers\ShoppingCartController::class, 'index'])->name('cart.index');
Route::get("/cart/finish", [\App\Http\Controllers\ShoppingCartController::class, 'finishOrder'])->name('cart.finish');



Route::middleware(["auth", \App\Http\Middleware\AdminCheck::class])->prefix("admin")->group(function (){

Route::controller(ContactController::class)
    ->prefix("/contact")->
    name("contact.")->
    group(function (){
    Route::get("/all", 'getAllContacts')
    ->name("all");
    Route::get("/delete/{contact}",'delete')
        ->name("delete");
    Route::get("/edit/{id}",'editContact')
        ->name("edit");
    Route::post("/save/{id}", 'saveContact')
        ->name("save");

});

   Route::controller(ShopController::class)->group(function (){
       Route::get("/add-product",'AddProducts');
       Route::get("/products",'ShowAllProducts');
   });


Route::controller(ProductsController::class)
    ->prefix("products")
    ->name("product.")
    ->group(function (){
    Route::get("/all",'index');
    Route::get("/edit/{id}","singleProduct")
        ->name("single");
    Route::post("/save/{id}",'edit')
        ->name('save');
    Route::get("/delete/{product}",'delete')
        ->name("delete");
});

});

require __DIR__.'/auth.php';
