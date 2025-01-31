@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Registered Users</h4>
        <hr>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center" >Name</th>
                    <th class="text-center">Email</th>
                    <th class="text-center" >Phone</th>
                    <th class="text-center">Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($users as $item)
                    <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-center">{{ $item->name . ' ' . $item->lname }}</td>
                    <td class="text-center">{{ $item->email }}</td>
                    <td class="text-center">{{ $item->phone }}</td>
                    <td class="text-center">
                        <a href="{{ url('view-users/' . $item->id) }}" class="btn btn-primary">View User</a> |
                        <a href="{{ url('edit-users/' . $item->id) }}" class="btn btn-primary">Edit User</a>
                    </td>
                    </tr>
                    @endforeach
            </tbody>
</table>
    </div>
</div>
@endsection