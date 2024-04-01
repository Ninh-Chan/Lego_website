<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\slide;
use http\Env\Request;
use App\Models\Type;

class HomeController extends Controller
{
    public function index()
    {
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $promotion_product = Product::where('promotion_price','<>',0)->paginate(8);
        return view('customers.index', compact('slide', 'new_product', 'promotion_product'));
    }
    public function productDetail($id)
    {
        $pro = Product::find($id);
    return view('customers.chitietsanpham',compact('pro'));
    }
    public function getType($type)
    {
        $sp_loai = Product::where('id',$type)->paginate(12);
        $loai = Type::all();
return view('customers.page_product_type',compact('sp_loai','loai'));
    }
}
