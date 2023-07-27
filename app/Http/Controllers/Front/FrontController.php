<?php

namespace App\Http\Controllers\Front;
use App\Models\Contact;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Info;
use App\Models\News;
use App\Models\Notice;
use App\Models\Policy;
use App\Models\Thesis;
use App\Models\ThesisFile;
use Illuminate\Support\Facades\Response;

class FrontController extends Controller
{
    // Index Page
    public function index(){
        $info = Info::orderBy('id', 'desc')->first();
        $blogs = Blog::orderBy('id', 'desc')->where('status', '1')->take(9)->get();
        $notices = Notice::orderBy('id', 'desc')->where('status','1')->take(4)->get();
        $news = News::orderBy('id', 'desc')->where('status','1')->take(4)->get();
        return view('front.pages.index', compact(['notices', 'info', 'news', 'blogs']));
    }

    // About
    public function about(){
        $about = About::orderBy('id', 'desc')->first();
        return view('front.pages.about', compact('about'));
    }

    // Privacy Policy
    public function policy(){
        $policy = Policy::orderBy('id', 'desc')->first();
        return view('front.pages.policy', compact('policy'));
    }

    // About
    public function notice(){
        $notices = Notice::orderBy('id', 'desc')->get();
        return view('front.pages.notice', compact('notices'));
    }

    // Notice Detail
    public function notice_detail($slug){
        $notice = Notice::where('slug', $slug)->first();
        //dd($notice);
        return view('front.pages.notice_detail', compact('notice'));
    }

    // News
    public function news(){
        $news = News::orderBy('id', 'desc')->where('status', '1')->get();
        return view('front.pages.news', compact('news'));
    }

    // News Detail
    public function news_detail($slug){
        $news = News::where('slug', $slug)->first();
        return view('front.pages.news_detail', compact('news'));
    }

    // Contact
    public function contact(){
        $contact = Contact::orderBy('id', 'desc')->first();
        return view('front.pages.contact', compact('contact'));
    }

    // Display PDF
    public function display($file){
        return response()->file(public_path('uploads/files/'.$file),['content-type'=>'application/pdf']);
    }

    // Display Notice
    public function display_notice($file){
        try {
            return response()->file(public_path('uploads/notices/'.$file),['content-type'=>'application/pdf']);
        } catch (\Throwable $th) {
            return "Error as exception";
        }
    }

    // Download
    public function download($filename){
        // Check if file exists in app/storage/file folder
        $file_path = public_path('uploads/files/'. $filename);
        if (file_exists($file_path)){
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }else{
            exit('Requested file does not exist on our server!');
        }
    }

    // Download Notice
    public function download_notice($file){
        $file_path = public_path('uploads/notices/'. $file);
        if (file_exists($file_path)){
            return Response::download($file_path, $file, [
                'Content-Length: '. filesize($file_path)
            ]);
        }else{
            exit('Requested file does not exist on our server!');
        }
    }

    // Blogs
    public function blogs(){
        $blogs = Blog::orderBy('id', 'desc')->where('status', '1')->get();
        return view('front.pages.blog', compact('blogs'));
    }

    // Blog Detail
    public function blog_detail($slug){
        $blog = Blog::where('slug', $slug)->first();
        return view('front.pages.blog_detail', compact('blog'));
    }

    // Thesis by Category
    public function thesis($slug){
        $category = Category::where('slug', $slug)->first();
        $thesis = Thesis::where('category_id', $category->id)->get();
        return view('front.pages.thesis', compact('thesis'));
    }

    // Thesis Detail
    public function thesis_detail($slug){
        $thesis = Thesis::where('slug', $slug)->first();
        $proposal_files = ThesisFile::where('thesis_id', $thesis->id)->where('sub_category', 'proposal')->get();
        $thesis_files = ThesisFile::where('thesis_id', $thesis->id)->where('sub_category', 'thesis')->get();
        return view('front.pages.thesis_detail', compact(['thesis', 'proposal_files', 'thesis_files']));
    }
}
