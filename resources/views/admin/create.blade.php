<x-app-web-layout>

    <x-slot name="title">
         Admins
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Add Admins
                            <a href="{{ url('admins') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admins/create') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label>Admin Name</label>
                                <input type="text" name="admin_name" class="form-control"
                                       value="{{ old('admin_name') }}" required>
                                @error('admin_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Phone Number field -->
                            <div class="mb-4">
                                <label>Phone Number</label>
                                <input type="number" name="admin_phone_number" class="form-control"
                                       value="{{ old('admin_phone_number') }}" required>
                                @error('admin_phone_number')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Email field -->
                            <div class="mb-4">
                                <label>Admin email</label>
                                <input type="email" name="admin_email" class="form-control"
                                       value="{{ old('admin_email') }}" required>
                                @error('admin_email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Password field -->
                            <div class="mb-4">
                                <label>Admin password</label>
                                <input type="password" name="admin_password" class="form-control"
                                       value="{{ old('admin_password') }}" required>
                                @error('admin_password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="is_active" {{ old('is_active') == true ? 'checked':'' }}/>
                                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Submit button -->
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>
