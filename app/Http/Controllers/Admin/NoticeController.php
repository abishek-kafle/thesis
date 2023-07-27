<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NoticeRequest;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class NoticeController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'notices');
        $notices = Notice::all();
        return view('admin.notices.index', compact('notices'));
    }

    // Add
    public function add(){
        return view('admin.notices.add');
    }

    // Store
    public function store(NoticeRequest $request){
        $data = $request->validated();
        $notice = new Notice();
        $notice->title = $data['title'];
        $notice->slug = Str::slug($data['title']);
        $notice->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('file')){
            $image_temp = $request->file('file');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/notices/';
                $image_temp->move($image_path, $filename);
                $notice->image = $filename;
            }
        }
        if(!empty($data['status'])){
            $notice->status = 1;
        }else{
            $notice->status = 0;
        }
        $notice->save();
        Session::flash('success_message', 'Notice added Successfully');
        return redirect()->route('notice.index');
    }

    // Edit
    public function edit($id){
        $notice = Notice::findOrFail($id);
        return view('admin.notices.edit', compact('notice'));
    }

    // Update
    public function update(NoticeRequest $request, $id){
        $data = $request->validated();
        $notice = Notice::findOrFail($id);
        $notice->title = $data['title'];
        $notice->slug = Str::slug($data['title']);
        $notice->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('file')){
            $image_temp = $request->file('file');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/notices/';
                if(File::exists('uploads/notices/'.$notice->image)){
                    File::delete('uploads/notices/'.$notice->image);
                }
                $image_temp->move($image_path, $filename);
                $notice->image = $filename;
            }
        }
        if(!empty($data['status'])){
            $notice->status = 1;
        }else{
            $notice->status = 0;
        }
        $notice->update();
        Session::flash('success_message', 'Notice updated Successfully');
        return redirect()->route('notice.index');
    }

    // Delete
    public function delete($id){
        $notice = Notice::findOrFail($id);
        $notice->delete();
        Session::flash('success_message', 'Notice deleted Successfully');
        return redirect()->route('notice.index');
    }
}
