<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'news');
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    // Add
    public function add(){
        return view('admin.news.add');
    }

    // Store
    public function store(NewsRequest $request){
        $data = $request->validated();
        $news = new News();
        $news->title = $data['title'];
        $news->slug = Str::slug($data['title']);
        $news->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/news/';
                $image_temp->move($image_path, $filename);
                $news->image = $filename;
            }
        }else{
            $news->image = 'news.jpg';
        }
        if(!empty($data['status'])){
            $news->status = 1;
        }else{
            $news->status = 0;
        }
        $news->save();
        Session::flash('success_message', 'News added Successfully');
        return redirect()->route('news.index');
    }

    // Edit
    public function edit($id){
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    // Update
    public function update(NewsRequest $request, $id){
        $data = $request->validated();
        $news = News::findOrFail($id);
        $news->title = $data['title'];
        $news->slug = Str::slug($data['title']);
        $news->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/news/';
                if(File::exists('uploads/news/'.$news->image)){
                    File::delete('uploads/news/'.$news->image);
                }
                $image_temp->move($image_path, $filename);
                $news->image = $filename;
            }
        }
        if(!empty($data['status'])){
            $news->status = 1;
        }else{
            $news->status = 0;
        }
        $news->update();
        Session::flash('success_message', 'News updated Successfully');
        return redirect()->route('news.index');
    }

    // Delete
    public function delete($id){
        $news = News::findOrFail($id);
        $news->delete();
        Session::flash('success_message', 'News deleted Successfully');
        return redirect()->route('news.index');
    }
}
