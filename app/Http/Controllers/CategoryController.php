<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        
    }

    
    public function create()
    {
        $total = category::count();
        $data = category::all();

        return view('admin.pages.category.add', ['data' => $data, 'total' => $total]);
    }

    
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string|max:40|unique:categories,name',
                'code' => 'required|string|max:100|unique:categories,code',
            ]
        );

        Category::create($data);
        return redirect()->route('category.create')->with('status', 'Thêm mới thành công');
    }

   
    public function show(Category $category)
    {
        
    }

  
    public function edit(Category $category)
    {
        $total = $category->count();
        $data = $category::all();
        return view('admin.pages.category.update', ['data' => $data, 'total' => $total], compact('category'));

    }

   
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|max:40|unique:categories,name,' . $category->id,
            'code' => 'required|string|max:100',
        ]);
        $category->update($data);
        return redirect()->route('category.edit', ['category' => $category->id])->with('status', 'Cập nhật thành công');
    }

   
    public function destroy(Category $category)
    {
        $relationships = ['blog'];
        $totalRelationships = 0;
        foreach ($relationships as $relationship) {
            $totalRelationships += $category->$relationship()->count();
        }

        if ($totalRelationships < 1) {
            $category->destroy($category->id);
            return redirect()->route('category.create')->with('status', 'Đã Xóa thành công');
        } else {
            return redirect()->route('category.create')->with(['delete' => 'Bản ghi này có liên kết dữ liệu với các bản ghi khác vì vậy bạn không thể xóa ?']);
        }
    }
}
