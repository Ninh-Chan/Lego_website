<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductTypeController extends Controller
{
    public function index(Request $request)
    {
        $search='%%';
        if($request->search){
            $search='%'.$request->search.'%';
        }
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        $types = DB::table('product_types')
            ->where('name','like',$search)
            ->get();
        return view('admin.type.index', compact('types','loginemail','loginname'));
    }

    // Hiển thị biểu mẫu tạo mới admin_manage
    public function create()
    {
        return view('admin.type.create');
    }

    // Lưu một admin_manage mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'name' => 'required|max:255|string',
        ]);

        ProductType::create([
            'name' => $request->name,
        ]);

        // Chuyển hướng đến trang hiển thị danh sách admin_manage
        return redirect('product_types/create')->with('status','Product types Created !');
    }

    // Hiển thị thông tin chi tiết của một admin_manage
    public function edit(int $id)
    {
        $type = ProductType::findOrFail($id);
        return view('admin.type.edit', compact('type'));
    }

    // Cập nhật thông tin của admin_manage vào cơ sở dữ liệu
    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
        ]);

        ProductType::findOrFail($id)->update([
            'name' => 'required|max:255|string',
        ]);

        return redirect()->back()->with('status', 'Product type Updated !');
    }

        // Xóa một admin_manage khỏi cơ sở dữ liệu
    public function destroy(int $id)
    {
        $type = ProductType::findOrFail($id);
        $type->delete();

        return redirect()->back()->with('status','Admin Account Deleted !');
    }
}
