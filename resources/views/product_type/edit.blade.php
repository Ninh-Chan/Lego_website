<x-app-web-layout>

    <x-slot name="title">
        Edit Product type
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Edit Product type
                            <a href="{{ url('product_types') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('product_types/'.$product_type->id.'/edit') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $product_type->name }}"/>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>
