<x-app-web-layout>

    <x-slot name="title">
        Products
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Products
                            <a href="{{ url('products/create') }}" class="btn btn-primary float-end">Add Products</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Number of part</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Product brand</th>
                                <th>Product type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($products->count() > 0)
                                @foreach ($products as $lego)
                                    <tr>
                                        <td>{{$lego->id}}</td>
                                        <td>{{$lego->name}}</td>
                                        <td>{{$lego->quantity}}</td>
                                        <td>{{$lego->number_of_part}}</td>
                                        <td>
                                            <img src="{{ asset($lego->image) }}" style="width: 120px; height:100px" alt="">
                                        </td>
                                        <td>{{$lego->description}}</td>
                                        <td>{{$lego->category->name}}</td>
                                        <td>{{$lego->product_type->name}}</td>
                                        <td>
                                            @if ($lego->is_active)
                                                Active
                                            @else
                                                In-Active
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('products/'.$lego->id.'/edit')}}" class="btn btn-primary mx-2">Edit</a>

                                            <a href="{{ url('products/'.$lego->id.'/delete') }}"
                                               class="btn btn-danger mx-1"
                                               onclick="return confirm('Are you sure ?')"
                                            >Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            </tbody>
                        </table>
                        <p class="text-center fs-3 mt-5">
                            No product found
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>
