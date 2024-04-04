<x-app-web-layout>

    <x-slot name="title">
        Admins
    </x-slot>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Admins
                            <a href="{{ url('admins/create') }}" class="btn btn-primary float-end">Add Admins</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Admin Name</th>
                                <th>Admin Phone Number</th>
                                <th>Admin Email</th>
                                <th>Admin Password</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $item)
                                    <tr>
                                        <td>{{$item->id}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->phone_number}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->password}}</td>

                                        <td>
                                            <a href="{{ url('admins/'.$item->id.'/edit')}}" class="btn btn-primary mx-2">Edit</a>

                                            <a href="{{ url('admins/'.$item->id.'/delete') }}"
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
