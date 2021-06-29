<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function all(){
//        $category = Category::all();
//        $category = Category::withCount("Products")->get();
        $category = Category::withCount("Products")->paginate(10);
        return view("page.danhsach",[
            "category"=>$category
        ]);
    }

    public function add(){
        return view("page.themmoi");
    }

    public function save(Request $req){
        Category::create([
            "name"=>$req->get("ten")
        ]);
        return redirect()->to("categories");
    }

    public function edit($id){
        $cat = Category::findOrFail($id);
        return view("page.edit",[
            "cat"=>$cat
        ]);
    }

    public function update(Request $request,$id){
        $cat = Category::findOrFail($id);
        $cat->update([
            "name"=>$request->get("name")
        ]);
        return redirect()->to("categories");
    }

    public function destroy($id){
        Category::destroy($id);
        return redirect()->to("categories");
    }

    public function search(Request $request){
        $search = $request->get("search");
        $category = Category::withCount("Products")
            ->where("name","LIKE","%$search%")
            ->paginate(10);
        return view("page.search",[
           "search"=>$search,
           "category"=>$category
        ]);
    }
}
