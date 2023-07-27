<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ThesisRequest;
use App\Models\Category;
use App\Models\Thesis;
use App\Models\ThesisFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class ThesisController extends Controller
{
    // Index
    public function index(){
        Session::put('admin_page', 'thesis');
        $thesis = Thesis::all();
        return view('admin.thesis.index', compact('thesis'));
    }

    // Add
    public function add(){
        $categories = Category::where('status', '1')->get();
        return view('admin.thesis.add', compact('categories'));
    }

    // Store
    public function store(ThesisRequest $request){
        $data = $request->validated();

        $thesis = new Thesis();
        $thesis->title = $data['title'];
        $thesis->slug = Str::slug($data['title']);
        $thesis->category_id = $data['category'];
        $thesis->description = $data['description'];
        $thesis->save();
        Session::flash('success_message', 'Thesis added Successfully');
        return redirect()->route('thesis.index');
    }

    // Edit
    public function edit($id){
        $thesis = Thesis::findOrFail($id);
        $selected_category = Category::where('id', $thesis->category_id)->first();
        $rest_category = Category::whereNotIn('id', [$thesis->category_id])->get();
        return view('admin.thesis.edit', compact(['thesis', 'selected_category', 'rest_category']));
    }

    // Update
    public function update(ThesisRequest $request, $id){
        $data = $request->validated();

        $thesis = Thesis::findOrFail($id);
        $thesis->title = $data['title'];
        $thesis->slug = Str::slug($data['title']);
        $thesis->category_id = $data['category'];
        $thesis->description = $data['description'];

        $thesis->update();
        Session::flash('success_message', 'Thesis updated Successfully');
        return redirect()->route('thesis.index');
    }

    // Delete
    public function delete($id){
        $thesis = Thesis::findOrFail($id);
        $files = ThesisFile::where('thesis_id', $id)->get();
        foreach ($files as $file) {
            $file->delete();
        }
        $thesis->delete();
        Session::flash('success_message', 'Thesis deleted Successfully');
        return redirect()->back();
    }

    // Upload Files
    public function upload($id){
        $thesis = Thesis::findOrFail($id);
        $proposal_files = ThesisFile::where('thesis_id', $id)->where('sub_category', 'proposal')->get();
        $thesis_files = ThesisFile::where('thesis_id', $id)->where('sub_category', 'thesis')->get();
        return view('admin.thesis.upload', compact(['thesis', 'proposal_files', 'thesis_files']));
    }

    // Files Upload
    public function fileUpload(Request $request, $id){
        $data = $request->validate([
            'sub_category' => 'required',
            'file' => 'required'
        ]);
        $files = [];
        foreach($request->file as $key=>$value){
            $single_file = $value->getClientOriginalName();
            $value->move(public_path('uploads/files'), $single_file);
            $files[] = $single_file;
        }

        foreach ($files as $array => $item) {
            ThesisFile::create([
                'thesis_id' => $id,
                'sub_category' => $data['sub_category'],
                'file' => $item,
            ]);
        }
        Session::flash('success_message', 'Files uploaded Successfully');
        return redirect()->back();
    }

    // View File
    public function view_file($file){
        try {
            return response()->file(public_path('uploads/files/'.$file),['content-type'=>'application/pdf']);
        } catch (\Throwable $th) {
            return "Error as exception";
        }
    }

    // Delete File
    public function delete_file($id){
        $file = ThesisFile::findOrFail($id);
        $file->delete();
        Session::flash('success_message', 'File deleted Successfully');
        return redirect()->back();
    }
}
