@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Product List</div>

                <div class="panel-body">
                    
                    @php 
$datas=array_chunk($data->toArray(),3);
                    @endphp
                                @foreach($datas as $values)
                                <div class="row">
                                      @foreach($values as $value)
                                            <div class="col-md-4 ftco-animate fadeInUp ftco-animated">
                                                    <div class="card">
                                                            <div class="card-header" style="text-align:center">
                                                            <h3>{{ $value['name'] }}</h3>
                                                            </div>
                                                            <img src="{{ asset('tile.png') }}" class="card-img-top" alt="...">
                                                            <div class="card-body">
                                                                <p class="card-text">{{ $value['description'] }}</p>
                                                            </div>
                                                            <div class="card-footer" style="text-align:center">
                                                            <h3>{{ $value['amount'] }}</h3><br>
                                                            <a href="{{ url('showProduct/'.$value['id']) }}" class="btn btn-success">Buy Now</a>
                                                            </div>
                                                    </div>
                                            </div>
                                        @endforeach
                                 </div>
                                 <br>
                                @endforeach
                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
