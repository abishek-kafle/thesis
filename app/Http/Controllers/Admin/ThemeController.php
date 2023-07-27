<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ThemeController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'theme');
        $theme = Theme::orderBy('id', 'desc')->first();
        return view('admin.theme.theme', compact('theme'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->validate([
            'website_name' => 'nullable|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);
        $theme = Theme::findOrFail($id);
        $theme->website_name = $data['website_name'];
        $random = Str::random(20);
        if($request->hasFile('logo')){
            $image_temp = $request->file('logo');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/themes/';
                if(File::exists('uploads/themes/'.$theme->logo)){
                    File::delete('uploads/themes/'.$theme->logo);
                }
                $image_temp->move($image_path, $filename);
                $theme->logo = $filename;
            }
        }
        $theme->update();
        Session::flash('success_message', 'Theme updated Successfully');
        return redirect()->back();
    }
}
