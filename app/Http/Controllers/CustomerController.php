<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomerController
{
    public function index()
    {
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        $customers = Customer::get();
        return view('admin.customer.index', compact('customers','loginemail','loginname'));
    }

    public function create()
    {
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        return view('admin.customer.create',compact('loginemail','loginname'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'phone_number'=>'required|string',
            'email'=>'required|max:100|string',
            'password'=>'required|max:50|string',
            'address'=>'required|max:255|string'
        ]);


        Customer::create([
            'name' => $request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=>Hash::make($request->password),
            'address'=>$request->address
        ]);

        return redirect('customers')->with('status', 'Customers Created !');
    }

    public function edit(int $id)
    {
        $loginemail=Session::get('loginemail');
        $loginname=Session::get('loginname');
        $customer = Customer::findOrFail($id);
        // return $brand;
        return view('admin.customer.edit', compact('customer','loginemail','loginname'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'phone_number'=>'required|string',
            'email'=>'required|max:100|string',
            'address'=>'required|max:255|string'
        ]);

        $product = Customer::findOrFail($id);


        $product->update([
            'name' => $request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'address'=>$request->address
        ]);

        return redirect()->back()->with('status', 'Customer Updated !');
    }

    public function destroy(int $id)
    {
        $customers = Customer::findOrFail($id);

        $customers->delete();

        return redirect()->back()->with('status', 'Customer Deleted !');
    }
}




