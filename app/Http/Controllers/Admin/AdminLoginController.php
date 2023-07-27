<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\News;
use App\Models\Notice;
use App\Models\Thesis;
use Illuminate\Support\Facades\File;

class AdminLoginController extends Controller
{
    // Admin Login
    public function adminLogin(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // Validation
            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customMessage = [
                'email.required' => 'Email Address is required',
                'email.email' => 'Email Address is not valid email address',
                'email.max' => 'You are not allowed to enter more than 255 characters',
                'password.required' => 'Password is required',
            ];
            $this->validate($request, $rules, $customMessage);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])){
                return redirect()->route('adminDashboard');
            } else {
                Session::flash('error_message', 'Invalid Username or Email');
                return redirect()->route('adminLogin');
            }

        }

        if (Auth::guard('admin')->check()){
            return redirect()->route('adminDashboard');
        } else {
            return view('admin.login');
        }
    }

    // Dashboard
    public function dashboard(){
        Session::put('admin_page', 'dashboard');
        $thesis = Thesis::all();
        $blogs = Blog::all();
        $notices = Notice::all();
        $news = News::all();
        return view('admin.dashboard.dashboard', compact(['blogs', 'notices', 'news', 'thesis']));
    }

    // Admin Logout
    public function adminLogout(){
        Auth::guard('admin')->logout();
        Session::flash('success_message', 'Logout Successful');
        return redirect()->route('adminLogin');
    }

    // Admin profile
    public function profile(){
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    // Admin Profile Update
    public function profileUpdate(Request $request, $id){
        $data = $request->all();
        //dd($data);
        $admin = Admin::findOrFail($id);
        $admin->name = $data['name'];
        $admin->address = $data['address'];
        $admin->phone = $data['phone'];
        $random = Str::random(20);
        if($request->hasFile('image')){
            $image_temp = $request->file('image');
            if($image_temp->isValid()){
                $extension = $image_temp->getClientOriginalExtension();
                $filename = $random.'.'.$extension;
                $image_path = 'uploads/admin/';
                if(File::exists('uploads/admin/'.$admin->image)){
                    File::delete('uploads/admin/'.$admin->image);
                }
                $image_temp->move($image_path, $filename);
                $admin->image = $filename;
            }
        }
        $admin->update();
        Session::flash('success_message', 'Admin Profile Has Been Updated Successfully');
        return redirect()->back();
    }

    // Change Password
    public function changePassword(){
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        return view('admin.changePassword', compact('admin'));
    }

    // Update Password
    public function updatePassword(Request $request, $id){
        $validateData = $request->validate([
            'current_password' => 'required|max:255',
            'password' => 'min:6',
            'pass_confirmation' => 'required_with:password|same:password|min:6'
        ]);
        $admin = Admin::where('email', Auth::guard('admin')->user()->email)->first();
        $current_admin_password = $admin->password;
        $data = $validateData;
        if(Hash::check($data['current_password'], $current_admin_password)){
            $admin->password = bcrypt($data['password']);
            $admin->save();
            Session::flash('success_message', 'Admin Password Has Been Updated Successfully');
            return redirect()->back();
        } else {
            Session::flash('error_message', 'Your Password does not match with our database');
            return redirect()->back();
        }
    }
}
