<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Classroom;
use App\Models\Faculty;
use App\Models\Part_class;
use App\Models\Specialized;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function Home()
    {
        $trash =  Blog::onlyTrashed()->count();
        $list = Blog::count();
        $total = Blog::withTrashed()->count();
        return view('admin.pages.home.home',['trash'=>$trash,'list'=>$list,'total'=>$total]);
    }

    public function Main()
    {
        $new = Blog::latest()->take(5)->get();
        $blog = Blog::all();
        $category = Category::all();
        return view('pages.home',['new'=>$new,'blog'=>$blog,'category'=>$category]);
    }
}
