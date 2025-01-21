@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>Products Page</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Category</th>
                    <th class="text-center" style="width: 15%;">Name</th>
                    <th class="text-center">Original Price</th>
                    <th class="text-center">Selling Price</th>
                    <th class="text-center" style="width: 20%;">Description</th> 
                    <th class="text-center" style="text-align: center;">Image</th>
                    <th class="text-center" style="width: 15%;">Action</th> 
                </tr>
            </thead>
            <tbody>
                @foreach($product as $item)
                    <tr>
                    <td class="text-center">{{ $item->id }}</td>
                    <td class="text-center">{{ $item->category->name }}</td>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">{{ $item->original_price }}</td>
                    <td class="text-center">{{ $item->selling_price }}</td>
                    <td class="text-center">{{ $item->description }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/products/'.$item->image) }}" class="cate-images" alt="Image here">
                    </td>
                    <td class="text-center">
                        <a href="{{ url('edit-product/' . $item->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('delete-product/' . $item->id) }}" class="btn btn-danger">Delete</a>
                    </td>
                    </tr>
                    @endforeach
            </tbody>
</table>
    </div>
</div>
@endsection