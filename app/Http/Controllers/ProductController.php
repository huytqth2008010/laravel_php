<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function all(){
        $product = Product::with("category")->paginate(10);
        return view("product.danhsach",[
           "product"=>$product
        ]);
    }

    public function add(){
        $category = Category::all();
        return view("product.themmoi",[
            "category"=>$category
        ]);
    }

    public function save(Request $request){
        $request->validate([
           "name"=>"required",
//           "image"=>"required",
//           "description"=>"required",
           "price"=>"required|min:0",
           "qty"=>"required|min:0",
           "category_id"=>"required|numeric|min:1"
        ],[
            "name.required"=>"Vui lòng nhập tên sản phẩm.!",
            "image.required"=>"Vui lòng nhập file ảnh.!",
            "description.required"=>"Vui lòng nhập thông tin sản phẩm.!",
            "price.required"=>"Vui lòng nhập giá sản phẩm.!",
            "qty.required"=>"Vui lòng nhập số lượng sản phẩm.!",
            "category_id.required"=>"Vui lòng nhập tên loại sản phẩm.!",
        ]);
        //upload file
        $image = null;
        if ($request->has("image")){
            $file = $request->file("image");
//            $fileName = $file->getClientOriginalName(); // Lấy tên file
            $exName = $file->getClientOriginalExtension();// lấy duoi file
            $fileName = time().".".$exName;
            $fileSize = $file->getSize(); //lấy size
            $allow = ["png","jpeg","jpg","gif"];
//            dd($fileName);
            if (in_array($exName,$allow)){
                if ($fileSize < 10000000){
                    try {
                        $file->move("upload",$fileName);
                        $image = $fileName;
                    }catch (\Exception $e){}
                }
            }
        }
        try {
            Product::create([
                "name"=>$request->get("name"),
                "image"=>$image,
                "description"=>$request->get("description"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id")
            ]);
        }catch (\Exception $e){
            abort(404);
        }
    return redirect()->to("products");
    }

    public function edit($id){
        $category = Category::all();
        $item = Product::findOrFail($id);
        return view("product.edit",[
            "item"=>$item,
            "category"=>$category
        ]);
    }

    public function update(Request $request,$id){
//        if ($request->has("image")){
//            $file = $request->file("image");
////            $fileName = $file->getClientOriginalName(); // Lấy tên file
//            $exName = $file->getClientOriginalExtension();// lấy duoi file
//            $fileName = time().".".$exName;
//            $fileSize = $file->getSize(); //lấy size
//            $allow = ["png","jpeg","jpg","gif"];
////            dd($fileName);
//            if (in_array($exName,$allow)){
//                if ($fileSize < 10000000){
//                    try {
//                        $file->move("upload",$fileName);
//                        $image = $fileName;
//                    }catch (\Exception $e){}
//                }
//            }
//        }else{
//            $image = $request->get("image");
//        }
        $request->validate([
            "name"=>"required",
            "image"=>"required",
            "price"=>"required|min:0",
            "qty"=>"required|min:0",
            "category_id"=>"required|numeric|min:1"
        ]);
        $product = Product::findOrFail($id);
        $product->update([
            "name"=>$request->get("name"),
            "image"=>$image,
            "description"=>$request->get("description"),
            "price"=>$request->get("price"),
            "qty"=>$request->get("qty"),
            "category_id"=>$request->get("category_id")
        ]);
        return redirect()->to("products");
    }

    public function destroy($id){
        Product::destroy($id);
        return redirect()->to("products");
    }
}
