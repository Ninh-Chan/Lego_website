<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change password</title>
</head>
<body>
<div class="change-password-modal">
    <h2 class="modal-header">Change Password</h2>
    <section class="modal-body">
        <form class="modal-form" method="post" action="{{route('customers.pwdUpdate')}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="modal-form-group">
                <label for="new_password">Password </label>
                <input type="password" name="new_password" placeholder="Enter Password" id="new_password">
            </div>
            <div class="modal-form-group">
                <label for="new_password2">Confirm Password </label>
                <input type="password" name="confirm-new_password2" placeholder="Confirm Your Password" id="new_password2-password">
            </div>
            <div class="modal-form-group">
                <span class="modal-hlp-txt">Yes, I want to recieve all future communications</span>
            </div>
        <div class="password-guidelines">
            <h3 class="guidelines-header">Password Guidelines</h3>
            <h4 class="guidelines-sub-header">Eg: MY@password123</h4>
            <div class="guidelines-description">
                <p>Must be 6 - 15 character</p>
                <p>Must be 6 - 15 character</p>
                <p>Must be 6 - 15 character</p>
                <p>Must be 6 - 15 character</p>
                <p>Must be 6 - 15 character</p>
            </div>
        </div>
    </section>
    <div class="modal-footer">
        <button>
            <a href="{{route('info')}}" class="modal-btn primary-btn"> Cancel
            </a>
        </button>
        <button type="submit" class="modal-btn secondary-btn">Save Changes</button>
    </div>
        </form>
</div>
</body>
</html>
<style>
    body {
        font-family: 'Montserrat', sans-serif;
    }
    .change-password-modal {
        display: flex;
        flex-direction: column;
        padding: 25px;
        margin: 20px;
        border-radius: 2px;
        border: 1px solid #ccc;
    }
    .modal-header {
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 50px;
        color: #3C414F;
    }
    .modal-body {
        display: flex;
        justify-content: space-between;
        margin-bottom: 50px;
    }
    .modal-form-group {
        display: flex;
        flex-direction: column;
        margin-bottom: 30px;
    label {
        color: #3C414F;
        font-weight: 600;
    }
    input {
        font-size: 16px;
        padding: 10px 0px;
        margin-top: 10px;
        border: none;
        border-bottom: 1px solid #AAA;
        outline: none;
    }
    .modal-hlp-txt {
        font-size: 14px;
    }
    }
    .modal-form, .password-guidelines {
        width: 45%;
    }
    .password-guidelines {
        padding: 15px;
        border-radius: 2px;
        border: 1px solid #ccc;
    }
    .guidelines-header {
        color: #3C414F;
        font-size: 20px;
        font-weight: 600;
        padding-bottom: 15px;
        border-bottom: 1px solid #ccc;
    }
    .guidelines-sub-header {
        color: #3C414F;
        font-size: 16px;
        font-weight: 600;
        padding: 15px 0px;
    }
    .guidelines-description {
    p {
        color: #7a7676;
        margin-bottom: 5px;
    &:last-child {
         margin-bottom: 0px;
     }
    }
    }
    .modal-footer {
        display: flex;
        justify-content: space-between;
    }
    .modal-btn {
        min-width: 100px;
        font-size: 17px;
        padding: 8px;
        background: #fff;
        border: 1px solid purple;
        border-radius: 2px;
        outline: none;
    &.primary-btn {
         color: purple;
     }
    &.secondary-btn {
         color: #fff;
         background: purple;
     }
    &:hover {
         cursor: pointer;
     }
    }
</style>
