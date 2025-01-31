@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">New Orders
                            <a href="{{ url('order-history') }}" class="btn btn-warning float-right">Order History</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">Tracking Number</th>
                                    <th class="text-center">Total Price</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->tracking_no }}</td>
                                        <td class="text-center">{{ $item->total_price }}</td>
                                        <td class="text-center">{{ $item->status == '0' ? 'pending':'completed' }}</td>
                                        <td class="text-center" style="width: 25%;">
                                            <a href="{{ url('admin/view-order/' . $item->id) }}" class="btn btn-primary">View</a>
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
@endsection