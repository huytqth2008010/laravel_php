<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function all1(){
        $brands = Brand::with("Products")->paginate(10);
        return view("brand.danhsach",[
            "brands"=>$brands
        ]);
    }

    public function add1(){
        $products = Product::all();
        return view("brand.themmoi",[
            "products"=>$products
        ]);
    }

    public function save1(Request $request){
        $request->validate([
            "name"=>"required",
            "year"=>"required"
        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm.!",
            "year.required"=>"Vui lòng nhập năm.!"
        ]);
        Brand::create([
            "name"=>$request->get("name"),
            "year"=>$request->get("year")
        ]);
        return redirect()->to("brands");
    }

    public function edit1($id){
        $product = Product::all();
        $brd = Brand::findOrFail($id);
        return view("brand.edit",[
            "brd"=>$brd,
            "product"=>$product
        ]);
    }

    public function update1(Request $request,$id){
//        $request->validate([
//            "name"=>"required",
//            "image"=>"required",
//        ]);
        try {
            $brands = Brand::findOrFail($id);
            $brands->update([
                "name"=>$request->get("name"),
                "year"=>$request->get("year"),
            ]);
        }catch(\Exception $e){
            echo "404";
        }
        return redirect()->to("brands");
    }

    public function destroy($id){
        Brand::destroy($id);
        return redirect()->to("brands");
    }
}
