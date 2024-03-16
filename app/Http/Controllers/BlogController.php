<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = blog::count();
        $data = blog::all();
        return view('admin.pages.blog.list', ['data' => $data, 'total' => $total]);
    }

    public function blog_list()
    {
       
        $data = blog::paginate(4);
        $new = Blog::latest()->take(5)->get();
        $category = Category::all();
        return view('pages.post_list', ['data' => $data ,  'category' => $category , 'new'=>$new]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::all();
        return view('admin.pages.blog.add', ['category' => $category]);
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'image' => 'required',
            'content' => 'required',
            'category_id' => 'exists:categories,id',
        ]);



        $imageFile = $request->file('image');
        $file_name = $imageFile->getClientOriginalName();
        $name_image = $imageFile->move('public/admin/images', $file_name)->getBasename();
        $data['image'] = 'admin/images/' . $name_image;
        $data['total'] = 0;
        Blog::create($data);

        return redirect()->route('blog.create')->with('status', 'Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $comment=Comment::where('blog_id',$id)->get();
        $blog = blog::find($id);
        $blog->increment('total');
        $new = Blog::latest()->take(5)->get();
        $category = Category::all();
        return view('pages.post_detail',['comment'=>$comment,'blog' => $blog,  'category' => $category , 'new'=>$new] );
    }

    public function blog_search(Request $request)
    {
        
        $data = Blog::where('name', 'like', "%{$request->input('search')}%")->paginate(4);
        $new = Blog::latest()->take(5)->get();
        $category = Category::all();
        return view('pages.search',['data' => $data,  'category' => $category , 'new'=>$new] );
    }

    public function List_category($id)
    {
        $data = blog::where('category_id', $id)->paginate(4);
        $new = Blog::latest()->take(5)->get();
        $category = Category::all();
        return view('pages.list_category',['data' => $data,  'category' => $category , 'new'=>$new] );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = category::all();
        $data = blog::where('id', $id)->first();
        return view('admin.pages.blog.update', ['data' => $data,  'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'content' => 'required',
            'category_id' => 'exists:categories,id',
        ]);


        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $file_name = $imageFile->getClientOriginalName();
            $name_image = $imageFile->move('public/admin/images', $file_name)->getBasename();
            $data['image'] = 'admin/images/' . $name_image;
            $data['total'] = 0;
        }

        blog::where('id', $id)->update($data);

        return redirect()->route('blog.edit', ['blog' => $id])->with(['status' => 'Chỉnh sửa thành thành công']);
    }


    public function trash()
    {
      
        $data = Blog::onlyTrashed()->get();
        $total = Blog::onlyTrashed()->count();
        return view('admin.pages.blog.list_trash', ['data' => $data, 'total' => $total]);
    }


    public function status(Request $request)
    {

        $input = $request->input('actions');

        if ($input == 1) {
            return redirect()->route('blog.index');
        } else {
            return redirect()->route('blog.trash');
        }
    }

    public function destroy($id)
    {
        $blog = blog::find($id);
        $blog->delete();
        return redirect()->route('blog.index')->with(['status' => 'Xóa thành công']);
    }
    public function restore($id)
    {
        $blog = blog::onlyTrashed()->find($id);
        $blog->restore();
        return redirect()->route('blog.trash')->with(['status' => 'Khôi phục thành công']);
    }

    public function destroy_trash($id)
    {
        $blog = blog::onlyTrashed()->find($id);
        $blog->forceDelete();
        return redirect()->route('blog.trash')->with(['status' => 'Xóa thành công']);
    }

    
}
