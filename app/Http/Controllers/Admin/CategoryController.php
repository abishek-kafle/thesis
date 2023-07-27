<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'category');
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    // Add
    public function add(){
        return view('admin.category.add');
    }

    // Store
    public function store(CategoryRequest $request){
        $data = $request->validated();
        $category = new Category();
        $category->title = $data["title"];
        $category->slug = Str::slug($data['title']);
        $category->description = $data["description"];
        if(!empty($data['status'])){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->save();
        Session::flash('success_message', 'Category added Successfully');
        return redirect()->route('category.index');
    }

    // Edit
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // Update
    public function update(CategoryRequest $request, $id){
        $data = $request->validated();
        $category = Category::findOrFail($id);
        $category->title = $data["title"];
        $category->slug = Str::slug($data['title']);
        $category->description = $data["description"];
        if(!empty($data['status'])){
            $category->status = 1;
        }else{
            $category->status = 0;
        }
        $category->update();
        Session::flash('success_message', 'Category updated Successfully');
        return redirect()->route('category.index');
    }

    // Delete
    public function delete($id){
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success_message', 'Category deleted Successfully');
        return redirect()->route('category.index');
    }
}
