<x-app-web-layout>

    <x-slot name="title">
        Product types
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Add Product types
                            <a href="{{ url('product_types') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('product_types/create') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"/>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>
