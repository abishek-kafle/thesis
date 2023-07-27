<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'info');
        $info = Info::orderBy('id', 'desc')->first();
        return view('admin.info.info', compact('info'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable'
        ]);
        $info = Info::findOrFail($id);
        $info->title = $data['title'];
        $info->description = $data['description'];
        $info->update();
        Session::flash('success_message', 'Info updated Successfully');
        return redirect()->back();
    }
}
