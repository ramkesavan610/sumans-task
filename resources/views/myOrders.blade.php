@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">My Order List</div>

                <div class="panel-body">
                    
                  <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Transaction ID</th>
                            <th scope="col">Order Date/Time</th>
                            </tr>
                        </thead>
                        <tbody>
                                @foreach($data as $key=>$value)
                                <tr>
                                <th scope="row">{{ $key++ }}</th>
                                    <td>{{ $value->product->name }}</td>
                                    <td>{{ $value->product->amount }}</td>
                                    <td>{{ $value->stripe_transaction_id }}</td>
                                    
                                    <td>{{ $value->created_at }}</td>
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
