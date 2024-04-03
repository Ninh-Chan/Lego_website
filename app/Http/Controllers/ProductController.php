<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table("products")
            ->join("brands", "brands.id", "=", "products.brand_id")
            ->join("product_types","product_types.id","=","products.product_type_id")
            ->select("products.*", "brands.name AS brand","product_types.name AS type")
            ->get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::get();
        $types = ProductType::get();
        return view('admin.product.create',compact('brands','types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|string',
            'quantity' => 'required|integer',
            'number_of_part' => 'required|integer',
            'description' => 'required|string',
            'brand_id' => 'required|integer',
            'product_type_id' => 'required|integer',
        ]);
        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/product/';
            $file->move($path, $filename);
        }



        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'number_of_part' => $request->number_of_part,
            'image' => $path.$filename,
            'description' => $request->description,
            'brand_id' => $request->brand_id,
            'product_type_id' => $request->product_type_id,
        ]);
        return redirect('products')->with('status','Products Created !');
    }

    public function edit(int $id)
    {
        $product = Product::findOrFail($id);
        // return $brand;
        return view('admin.product.edit', compact('product'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'price' => 'required|decimal',
            'quantity' => 'required|integer',
            'number_of_part' => 'required|integer',
            'image' => 'required|mimes:ong,jpg,jpeg,webp',
            'description' => 'required|text',
            'brand_id' => 'required|integer',
            'product_type_id' => 'required|integer',
        ]);

        $product = Product::findOrFail($id);

        if($request->has('image')){

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();

            $filename = time().'.'.$extension;

            $path = 'uploads/product/';
            $file->move($path, $filename);

            if(File::exists($product->image)){
                File::delete($product->image);
            }
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'number_of_part' => $request->number_of_part,
            'image' => $path.$filename,
            'description' => $request->description,
            'brand_id' => $request->brand_id
                         ,
            'product_type_id' => $request->product_type_id,
        ]);

        return redirect()->back()->with('status','Product Updated !');
    }

    public function destroy(int $id)
    {
        $product = Product::findOrFail($id);
        if(File::exists($product->image)){
            File::delete($product->image);
        }
        $product->delete();

        return redirect()->back()->with('status','Product Deleted !');
    }
}
