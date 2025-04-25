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

Route::get("/contact", [ContactController::class, 'index']);

Route::post("/create-product", [ShopController::class, 'CreateProducts']);

Route::post("/send-contact", [ContactController::class, "sendContact"])->name("Send.Contact");


Route::middleware(["auth", \App\Http\Middleware\AdminCheck::class])->prefix("admin")->group(function (){


    Route::get("/all-contacts",[ContactController::class, 'getAllContacts']);


    Route::get("/add-product", [ShopController::class, 'AddProducts']);


    Route::get("/products", [ShopController::class, 'ShowAllProducts']);

    Route::get("/all-products", [ProductsController::class, 'index']);

    Route::get("/product/edit/{id}", [ProductsController::class, "singleProduct"])
        ->name("product.single");

    Route::post("/product/save/{id}", [ProductsController::class, 'edit'])
        ->name('product.save');

    Route::get("/delete-product/{product}", [ProductsController::class, 'delete'])
        ->name("obrisiProizvod");

    Route::get("/delete-contact/{contact}", [ContactController::class, 'delete'])
        ->name("obrisiKontakt");

    Route::get("/contact/edit/{id}", [ContactController::class, 'editContact'])
        ->name("contact.edit");

    Route::post("/contact/save/{id}", [ContactController::class, 'saveContact'])
        ->name("save.contact");

});


require __DIR__.'/auth.php';
