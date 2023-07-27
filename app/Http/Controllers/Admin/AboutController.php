<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'about');
        $about = About::orderBy('id', 'desc')->first();
        return view('admin.about.about', compact('about'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->validate([
            'description' => 'nullable',
            'image' => 'image|nullable|mimes:png,jpg,jpeg'
        ]);
        $about = About::findOrFail($id);
        $about->description = $data['description'];
        $random = Str::random(20);
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/abouts/';
                if(File::exists('uploads/abouts/'.$about->image)){
                    File::delete('uploads/abouts/'.$about->image);
                }
                $image_temp->move($image_path, $filename);
                $about->image = $filename;
            }
        }
        $about->update();
        Session::flash('success_message', 'About updated Successfully');
        return redirect()->back();
    }
}
