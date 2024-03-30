<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use App\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['category', 'product_type'])
            ->paginate(6);
        $addtionalProducts = DB::table("products")
            ->join("categories", "categories.id", "=", "products.category_id")
            ->join("product_types", "product_types.id", "=", "products.product_type_id")
            ->select("products.*", "categories.name as category_name", "product_types.name as product_type_name")
            ->get();


        //$products = Product::get();
        return view("product.index", ["products" => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        $product_types = Type::all();
        return view('product.create', [
            'categories' => $categories,
            'product_types' => $product_types
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'number_of_part' => 'required|integer',
            'image' => 'required|mimes:png,jpg,jpeg,webp',
            'description' => 'required|string',
            'category_id' => 'required|integer',
            'product_type_id' => 'required|integer',
            'is_active' => 'sometimes'
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
            'category_id' => $request->category_id,
            'product_type_id' => $request->product_type_id,
            'is_active' => $request->is_active == true ? 1:0,
        ]);

        return redirect('products/create')->with('status','Products Created !');
    }

    public function edit(int $id)
    {
        $categories = Category::all();
        $product_types = Type::all();
        $product = Product::findOrFail($id);
        // return $category;
        return view('product.edit', [
            'product' => $product,
            'categories' => $categories,
            'product_types' => $product_types
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'number_of_part' => 'required|integer',
            'image' => 'required|mimes:ong,jpg,jpeg,webp',
            'description' => 'required|text',
            'category_id' => 'required|integer',
            'product_type_id' => 'required|integer',
            'is_active' => 'sometimes'
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

        Product::findOrFail($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'number_of_part' => $request->number_of_part,
            'image' => $path.$filename,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'product_type_id' => $request->product_type_id,
            'is_active' => $request->is_active == true ? 1:0,
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
