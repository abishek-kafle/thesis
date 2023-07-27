<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Policy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PolicyController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'policy');
        $policy = Policy::orderBy('id', 'desc')->first();
        return view('admin.policy.policy', compact('policy'));
    }

    // Update
    public function update(Request $request, $id){
        $data = $request->validate([
            'description' => 'nullable'
        ]);
        $policy = Policy::findOrFail($id);
        $policy->description = $data['description'];
        $policy->update();
        Session::flash('success_message', 'Policy updated Successfully');
        return redirect()->back();
    }
}
