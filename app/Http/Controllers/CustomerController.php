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
use App\Http\Requests\CustomerUpdateRequest;
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
            $array = Arr::add($array, 'name', $request->name);
            $array = Arr::add($array, 'phone_number', $request->phone_number);
            $array = Arr::add($array, 'email', $request->email);
            $array = Arr::add($array, 'password', Hash::make($request->password));
            $array = Arr::add($array, 'address', $request->address);
            //Lấy dữ liệu từ form và lưu lên db
            Customer::create($array);

            return Redirect::route('customers.login');
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
        $account = $request->only(['email', 'password']);
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
        return view('customers.confirmToLogout');
    }

    public function forgotPassword()
    {
        return view('customers.login');
    }

    public function editInfo()
    {
        //id cua customers dang dang nhap
        $id = Auth::guard('customers')->user()->id;
        //lay ban ghi
        $customers = Customer::find($id);
        return view('customers.profiles.info', [
            'customers' => $customers
        ]);
    }

    public function updateInfo(CustomerUpdateRequest $request)
    {
        //Lấy dữ liệu trong form và update lên db
        $array = [];
        $array = Arr::add($array, 'customer_name', $request->name);
        $array = Arr::add($array, 'phone_number', $request->phone_number);
        $array = Arr::add($array, 'email', $request->email);
        $array = Arr::add($array, 'password', $request->password);
        $array = Arr::add($array, 'address', $request->address);

        //id cua customers dang dang nhap
        $id = Auth::guard('customers')->user()->id;
        //lay ban ghi
        $customers = Customer::find($id);
        $customers->update($array);
        //Quay về danh sách
        return Redirect::route('info');
    }

        public function editPassword()
        {
            //id cua customers dang dang nhap
            $id = Auth::guard('customers')->user()->id;
            //lay ban ghi
            $customers = Customer::find($id);
            return view('customers.profiles.changePassword', [
            'customers' => $customers
            ]);
        }

        public function updatePassword(CustomerUpdateRequest $request)
    {
        $newPassword = Hash::make($request->newPassword);
        $newPassword2 = $request->newPassword2;

        $array = [];
        $array = Arr::add($array, 'password', $newPassword);
        //id cua customers dang dang nhap
        $id = Auth::guard('customers')->user()->id;
        //lay ban ghi
        $customers = Customer::find($id);
        $customers->update($array);

        return Redirect::route('customers.pwdUpdate');
    }
}
