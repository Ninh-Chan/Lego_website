<x-app-web-layout>

    <x-slot name="title">
        Product types
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Product types
                            <a href="{{ url('product_types/create') }}" class="btn btn-primary float-end">Add types</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($product_types as $product_type)
                                    <tr>
                                        <td>{{$product_type->id}}</td>
                                        <td>{{$product_type->name}}</td>
                                        <td>
                                            <a href="{{ url('product_types/'.$product_type->id.'/edit')}}"
                                               class="btn btn-primary mx-2">Edit</a>

                                            <a href="{{ url('product_types/'.$product_type->id.'/delete') }}"
                                               class="btn btn-danger mx-1"
                                               onclick="return confirm('Are you sure ?')"
                                            >Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-web-layout>
