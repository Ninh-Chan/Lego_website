<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title> Register Page </title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
        <form action="{{route('customers.processingRegister')}}" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="Enter your name" name="customer_name" id="customer_name"
                           value="{{old('customer_name')}}" required>
                    @if($errors->has('customer_name'))
                        {{ $errors->first('customer_name') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" name="customer_email" id="customer_email"
                           value="{{old('customer_email')}}"required>
                    @if($errors->has('customer_email'))
                        {{ $errors->first('customer_email') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" placeholder="Enter your number" name="customer_phone_number" id="customer_phone_number"
                           value="{{old('customer_phone_number')}}" required>
                    @if($errors->has('customer_phone_number'))
                        {{ $errors->first('customer_phone_number') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Enter your address" name="customer_address" id="customer_address"
                           value="{{old('customer_address')}}" required>
                    @if($errors->has('customer_address'))
                        {{ $errors->first('customer_address') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" name="customer_password" id="customer_password"
                           value="{{old('customer_password')}}"required>
                    @if($errors->has('customer_password'))
                        {{ $errors->first('customer_password') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Confirm Password</span>
                    <input type="password" placeholder="Confirm your password" name="password_2" id="password_2"
                           value="{{old('password_2')}}" required>
                    @if($errors->has('password_2'))
                        {{ $errors->first('password_2') }}
                    @endif
                </div>
            </div>

            <input class="hidden invisible opacity-0" type="hidden"
                   name="status" value="1" readonly>

            <div class="button">
                <input type="submit" value="Register">
            </div>

            <div>
                You have an account?  <a href="{{route('customers.login')}}">Login now !</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
