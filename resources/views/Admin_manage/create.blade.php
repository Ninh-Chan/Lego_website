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
                                <label for="name" class="block text-sm font-medium text-gray-700">Admin Name</label>
                                <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Phone Number field -->
                            <div class="mb-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_phone_number')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Email field -->
                            <div class="mb-4">
                                <label for="admin_email" class="block text-sm font-medium text-gray-700">Admin email</label>
                                <input type="email" name="admin_email" id="admin_email" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <!-- Password field -->
                            <div class="mb-4">
                                <label for="admin_password" class="block text-sm font-medium text-gray-700">Admin password</label>
                                <input type="password" name="admin_password" id="admin_password" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
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
