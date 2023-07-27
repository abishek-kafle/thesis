<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Socialmedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SocialmediaController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'socialmedia');
        $socialmedia = Socialmedia::orderBy('id', 'desc')->first();
        return view('admin.social_media.social_media', compact('socialmedia'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->validate([
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);
        $socialmedia = Socialmedia::findOrFail($id);
        $socialmedia->facebook = $data['facebook'];
        $socialmedia->youtube = $data['youtube'];
        $socialmedia->twitter = $data['twitter'];
        $socialmedia->instagram = $data['instagram'];
        $socialmedia->linkedin = $data['linkedin'];
        $socialmedia->update();
        Session::flash('success_message', 'Socialmedia updated Successfully');
        return redirect()->back();
    }
}
