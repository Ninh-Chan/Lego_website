<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use function PHPUnit\Framework\once;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::get();
        return view('admin.brand.index', compact('brand'));
    }

    public function create()
    {
        return view('admin.brand.create');
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
        $brand = Brand::findOrFail($id);
        // return $brand;
        return view('brand.edit', compact('brand'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'is_active' => 'sometimes'
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
        Brand::findorFail($id)->update([
            'name' => $request->name,
            'image' => $path.$filename,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect('brands')->with('status','Brand Updated !');
    }

    public function destroy(int $id)
    {
        $brand = Brand::findOrFail($id);
        if(File::exists($brand->image)){
            File::delete($brand->image);
        }

        $brand->delete();

        return redirect('brands')->with('status','Brand Deleted !');
    }
}
