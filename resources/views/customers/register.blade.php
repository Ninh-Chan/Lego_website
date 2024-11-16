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
        <form method="post" action="{{route('customers.processingRegister')}}" enctype="multipart/form-data">
            @csrf
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Name</span>
                    <input type="text" placeholder="Enter your name" name="name" id="name"
                           value="{{old('name')}}" required>
                    @if($errors->has('name'))
                        {{ $errors->first('name') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" placeholder="Enter your email" name="email" id="email"
                           value="{{old('email')}}" required>
                    @if($errors->has('email'))
                        {{ $errors->first('email') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Phone Number</span>
                    <input type="number" placeholder="Enter your number" name="phone_number" id="phone_number"
                           value="{{old('phone_number')}}" required>
                    @if($errors->has('phone_number'))
                        {{ $errors->first('phone_number') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Address</span>
                    <input type="text" placeholder="Enter your address" name="address" id="address"
                           value="{{old('address')}}" required>
                    @if($errors->has('address'))
                        {{ $errors->first('address') }}
                    @endif
                </div>

                <div class="input-box">
                    <span class="details">Password</span>
                    <input type="password" placeholder="Enter your password" name="password" id="password"
                           value="{{old('password')}}" required>
                    @if($errors->has('password'))
                        {{ $errors->first('password') }}
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
