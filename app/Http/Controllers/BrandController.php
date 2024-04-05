<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use function PHPUnit\Framework\once;

class BrandController extends Controller
{
    public function index()
    {
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        $brand = Brand::get();
        return view('admin.brand.index', compact('brand','loginemail','loginname'));

    }

    public function create()
    {
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        return view('admin.brand.create',compact('loginemail','loginname'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
        ]);


        Brand::create([
            'name' => $request->name,
        ]);

        return redirect('brands/create')->with('status','Brand Created !');
    }

    public function edit(int $id)
    {
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        $brand = Brand::findOrFail($id);
        // return $brand;
        return view('brand.edit', compact('brand','loginemail','loginname'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
        ]);



        Brand::findorFail($id)->update([
            'name' => $request->name,
        ]);

        return redirect('brands')->with('status','Brand Updated !');
    }

    public function destroy(int $id)
    {
        $brand = Brand::findOrFail($id);

        $brand->delete();

        return redirect('brands')->with('status','Brand Deleted !');
    }
}
