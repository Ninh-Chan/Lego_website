<x-app-web-layout>

    <x-slot name="title">
        Products
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Add Products
                            <a href="{{ url('products') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('products/create') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" />
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price') }}" />
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="quantity" class="form-control" value="{{ old('quantity') }}" />
                                @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="number_of_part" class="block text-sm font-medium text-gray-700">Number of parts</label>
                                <input type="number" name="number_of_part" class="form-control" value="{{ old('number_of_part') }}" required>
                                @error('number_of_part')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label>Upload File/Image</label>
                                <input type="file" name="image" class="form-control"/>
                            </div>

                            <div class="mb-4">
                                <label>Description</label>
                                <textarea name="description" id="" class="form-control" rows="3" >{{ old('description') }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label class="fs-4">Brand</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="fs-4">Type</label>
                                <select name="product_type_id" class="form-control">
                                    @foreach($product_types as $product_type)
                                        <option value="{{$product_type->id}}">{{$product_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="is_active" {{ old('is_active') == true ? 'checked':'' }}/>
                                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

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
