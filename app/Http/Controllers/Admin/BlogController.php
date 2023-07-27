<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'blogs');
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // Add
    public function add(){
        return view('admin.blogs.add');
    }

    // Store
    public function store(BlogRequest $request){
        $data = $request->validated();
        $blog = new Blog();
        $blog->title = $data['title'];
        $blog->slug = Str::slug($data['title']);
        $blog->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/blogs/';
                $image_temp->move($image_path, $filename);
                $blog->image = $filename;
            }
        }else{
            $blog->image = 'blog.jpg';
        }
        if(!empty($data['status'])){
            $blog->status = 1;
        }else{
            $blog->status = 0;
        }
        $blog->save();
        Session::flash('success_message', 'Blog added Successfully');
        return redirect()->route('blog.index');
    }

    // Edit
    public function edit($id){
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    // Update
    public function update(BlogRequest $request, $id){
        $data = $request->validated();
        $blog = Blog::findOrFail($id);
        $blog->title = $data['title'];
        $blog->slug = Str::slug($data['title']);
        $blog->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/blogs/';
                if(File::exists('uploads/blogs/'.$blog->image)){
                    File::delete('uploads/blogs/'.$blog->image);
                }
                $image_temp->move($image_path, $filename);
                $blog->image = $filename;
            }
        }
        if(!empty($data['status'])){
            $blog->status = 1;
        }else{
            $blog->status = 0;
        }
        $blog->update();
        Session::flash('success_message', 'Blog updated Successfully');
        return redirect()->route('blog.index');
    }

    // Delete
    public function delete($id){
        $blog = Blog::findOrFail($id);
        $blog->delete();
        Session::flash('success_message', 'Blog deleted Successfully');
        return redirect()->route('blog.index');
    }
}
