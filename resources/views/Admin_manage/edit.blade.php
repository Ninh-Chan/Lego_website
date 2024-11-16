<x-app-web-layout>

    <x-slot name="title">
        Edit Admins
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Edit Admins
                            <a href="{{ url('admins') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admins/'.$admin->id.'/edit') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Admin Name</label>
                                <input type="text" name="name" id="name" value="{{ $admin->admin_name }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" value="{{ $admin->admin_phone_number }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_phone_number')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="admin_email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" name="admin_email" id="admin_email" value="{{ $admin->admin_email }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="admin_password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="admin_password" id="admin_password" value="{{ $admin->admin_password }}" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                                @error('admin_password')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="is_active" {{ $admin->'is_active' == true ? 'checked':'' }}/>
                                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit"
                                        class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-700 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-200 disabled:opacity-25 transition">
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>
