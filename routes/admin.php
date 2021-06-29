<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\Admin\Auth\LoginController;
//use App\Http\Controllers\SearchController;

//Route::match((["get","post"]),"login",[LoginController::class,"login"])->name("login");

Route::middleware("auth:admin")->group(function (){
//    Route::middleware("admin")->group(function (){
        Route::get('home',[WebController::class,"home"]);
        Route::get('/about-us',[WebController::class,"aboutUs"]);
//    });
    Route::get('/categories',[CategoryController::class,"all"]);
    Route::get('/categories/themmoi',[CategoryController::class,"add"]);
    Route::post('/categories/save',[CategoryController::class,"save"]);
    Route::get('/categories/edit/{id}',[CategoryController::class,"edit"]);
    Route::post('/categories/update/{id}',[CategoryController::class,"update"]);
    Route::delete('/categories/delete/{id}',[CategoryController::class,"destroy"]);
    Route::post('/search',[CategoryController::class,"search"]);

    Route::get('products',[ProductController::class,"all"]);
    Route::get('products/themmoi',[ProductController::class,"add"]);
    Route::post('products/save',[ProductController::class,"save"]);
    Route::get('/products/edit/{id}',[ProductController::class,"edit"]);
    Route::post('products/update/{id}',[ProductController::class,"update"]);
    Route::delete('products/delete/{id}',[ProductController::class,"destroy"]);

    Route::get('brands',[BrandController::class,"all1"]);
    Route::get('brands/themmoi1',[BrandController::class,"add1"]);
    Route::post('brands/save1',[BrandController::class,"save1"]);
    Route::get('brands/edit1/{id}',[BrandController::class,"edit1"]);
    Route::post('brands/update1/{id}',[BrandController::class,"update1"]);
    Route::delete('brands/delete1/{id}',[BrandController::class,"destroy"]);

});

