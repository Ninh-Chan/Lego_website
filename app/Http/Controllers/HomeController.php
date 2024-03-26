<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\slide;
class HomeController extends Controller
{
    public function index()
    {
        $slide = Slide::all();
        $new_product = Product::where('new',1)->paginate(4);
        $promotion_product = Product::where('promotion_price','<>',0)->paginate(8);
        return view('customers.index', compact('slide', 'new_product', 'promotion_product'));
    }
}
