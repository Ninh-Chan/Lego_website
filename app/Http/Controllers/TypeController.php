<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function index()
    {
        $product_types = Type::get();
        return view('product_type.index', compact('product_types'));
    }

    // Hiển thị biểu mẫu tạo mới admin
    public function create()
    {
        return view('product_type.create');
    }

    // Lưu một admin mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|max:255|string',
        ]);

        Type::create([
            'name' => $request->name,
        ]);

        // Chuyển hướng đến trang hiển thị danh sách admin
        return redirect('product_types/create')->with('status','Product types Created !');
    }

    // Hiển thị thông tin chi tiết của một admin
    public function edit(int $id)
    {
        $product_type = Type::findOrFail($id);
        // return $category;
        return view('product_type.edit', compact('product_type'));
    }

    // Cập nhật thông tin của admin vào cơ sở dữ liệu
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
        ]);

        Type::findOrFail($id)->update([
            'name' => 'required|max:255|string',
        ]);

        return redirect()->back()->with('status', 'Product product_type Updated !');
    }

        // Xóa một admin khỏi cơ sở dữ liệu
    public function destroy(int $id)
    {
        $product_type = Type::findOrFail($id);
        $product_type->delete();

        return redirect()->back()->with('status','Admin Account Deleted !');
    }
}
