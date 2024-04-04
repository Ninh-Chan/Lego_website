<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::get();
        return view('admin.brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'nullable|mimes:png,jpeg,webp',
        ]);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/brand/';
            $file->move($path, $filename);
        }

        Brand::create([
            'name' => $request->name,
            'image' => $path.$filename,
        ]);

        return redirect('brands/create')->with('status','Brand Created !');
    }

    public function edit(int $id)
    {
        $brand = Brand::findOrFail($id);
        // return $brand;
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'required|mimes:ong,jpg,jpeg,webp',
        ]);

        $brand = Brand::findOrFail($id);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/brand/';
            $file->move($path, $filename);

            if(File::exists($brand->image)){
                File::delete($brand->image);
            }
        }

        $brand->update([
            'name' => $request->name,
            'image' => $path.$filename,
            //'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect()->back()->with('status','Brand Updated !');
    }

    public function destroy(int $id)
    {
        $brand = Brand::findOrFail($id);
        if(File::exists($brand->image)){
            File::delete($brand->image);
        }

        $brand->delete();

        return redirect()->back()->with('status','Brand Deleted !');
    }
}
