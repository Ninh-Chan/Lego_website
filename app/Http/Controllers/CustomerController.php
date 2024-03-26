<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{

    public function register()
    {
        return view('customers.register');
    }

    public function processingRegister(CustomerStoreRequest $request)
    {
        if ($request->validated()) {
            $array = [];
            $array = Arr::add($array, 'customer_name', $request->customer_name);
            $array = Arr::add($array, 'customer_phone_number', $request->customer_phone_number);
            $array = Arr::add($array, 'customer_email', $request->customer_email);
            $array = Arr::add($array, 'customer_password', Hash::make($request->customer_password));
            $array = Arr::add($array, 'customer_address', $request->customer_address);
            $array = Arr::add($array, 'status', 1);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('customer.login');
        } else {
            //cho quay về trang login
            return Redirect::back('info');
        }
    }

        public function login()
        {
            return view('customers.login');
        }

    public function loginProcess(Request $request)
    {
        $account = $request->only(['customer_email', 'customer_password']);
        $check = Auth::guard('customers')->attempt($account);

        if ($check) {
            //Lấy thông tin của customers đang login
            $customers = Auth::guard('customers')->user();
            //Cho login
            Auth::guard('customers')->login($customers);
            //Ném thông tin customers đăng nhập lên session
            session(['customers' => $customers]);
            return Redirect::route('info');
        } else {
            //cho quay về trang login
            return Redirect::back();
        }
    }

    public function logout()
    {
        Auth::guard('customers')->logout();
        session()->forget('customers');
        return view('customers.logoutConfirm');
    }

    public function passwordForget()
    {
        return view('customers.login');
    }

    public function editInfo()
    {
        //id cua customers dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        return view('customers.profiles.info', [
            'customer' => $customer
        ]);
    }

    public function updateProfile(UpdateCustomerRequest $request)
    {
        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'customer_name', $request->customer_name);
        $array = Arr::add($array, 'customer_phone_number', $request->customer_phone_number);
        $array = Arr::add($array, 'customer_email', $request->customer_email);
        $array = Arr::add($array, 'customer_password', $request->customer_password);
        $array = Arr::add($array, 'customer_address', $request->customer_address);

        //id cua customers dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $customer->update($array);
        //Quay về danh sách
        return Redirect::route('info');
    }

        public function editPassword()
        {
            //id cua customers dang dang nhap
            $id = Auth::guard('customers')->user()->id;
            //lay ban ghi
            $customer = Customer::find($id);
            return view('customers.profiles.changePassword', [
            'customer' => $customer
            ]);
        }

        public function updatePassword(UpdateCustomerRequest $request)
    {
        $newPwd = Hash::make($request->new_pwd);
        $newPwd2 = $request->new_pwd2;

        $array = [];
        $array = Arr::add($array, 'customer_password', $newPwd);
        //id cua customers dang dang nhap
        $id = Auth::guard('customer')->user()->id;
        //lay ban ghi
        $customer = Customer::find($id);
        $customer->update($array);

        return Redirect::route('pwd.update');
    }
}
