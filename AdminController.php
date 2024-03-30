<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::get();
        return view('admin.index', compact('admins'));
    }

    // Hiển thị biểu mẫu tạo mới admin
    public function create()
    {
        return view('admin.create');
    }

    // Lưu một admin mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'admin_name' => 'required|max:255|string',
            'admin_phone_number' => 'required|string',
            'admin_email' => 'required|email|unique:admins',
            'admin_password' => 'required|string',
            'is_active' => 'sometimes'
        ]);

        Admin::create([
            'admin_name' => $request->admin_name,
            'admin_phone_number' => $request->admin_phone_number,
            'admin_email' => $request->admin_email,
            'admin_password' => $request->admin_password,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        // Chuyển hướng đến trang hiển thị danh sách admin
        return redirect('admins/create')->with('status','Admin Created !');
    }

    // Hiển thị thông tin chi tiết của một admin
    public function edit(int $id)
    {
        $admin = Admin::findOrFail($id);
        // return $category;
        return view('admin.edit', compact('admin'));
    }

    // Cập nhật thông tin của admin vào cơ sở dữ liệu
    public function update(Request $request, int $id)
    {
        $request->validate([
            'admin_name' => 'required|max:255|string',
            'admin_phone_number' => 'required|max:15|string',
            'admin_email' => 'required|email|unique:admins',
            'admin_password' => 'required|string',
            'is_active' => 'sometimes'
        ]);

        Admin::findOrFail($id)->update([
            'admin_name' => $request->admin_name,
            'admin_phone_number' => $request->admin_phone_number,
            'admin_email' => $request->admin_email,
            'admin_password' => $request->admin_password,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect()->back()->with('status', 'Admin Updated !');
    }

        // Xóa một admin khỏi cơ sở dữ liệu
    public function destroy(int $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back()->with('status','Admin Account Deleted !');
    }
}
