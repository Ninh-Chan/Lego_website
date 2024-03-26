<x-app-web-layout>

    <x-slot name="title">
        Edit Products
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status')}}</div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4> Edit Products
                            <a href="{{ url('products') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('products/'.$product->id.'/edit') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" required>
                                @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input type="number" name="price" id="price" value="{{ $product->price }}" class="form-control" required>
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                                <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control" required>
                                @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="number_of_part" class="block text-sm font-medium text-gray-700">Number of parts</label>
                                <input type="number" name="number_of_part" id="number_of_part" value="{{ $product->number_of_part }}" class="form-control" required>
                                @error('number_of_part')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label>Upload File/Image</label>
                                <input type="file" name="image" class="form-control"/>
                                <img src="{{ asset( $product->image) }}" width="250px" height="180px">
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" class="form-control" rows="3" >{{ $product->description }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-4">
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Brand</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}
                                        >{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="product_type_id" class="block text-sm font-medium text-gray-700">Product type</label>
                                <select name="product_type_id" class="form-control">
                                    @foreach($product_types as $product_type)
                                        <option value="{{$product_type->id}}" {{$product_type->id == $product->product_type_id ? 'selected':''}}
                                        >{{$product_type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="is_active" {{ $product->is_active == true ? 'checked':'' }}/>
                                @error('is_active')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary">
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
