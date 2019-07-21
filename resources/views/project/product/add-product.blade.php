@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-8">
       @if(count($errors) > 0)
          <ul class="list-group">
               @foreach($errors->all() as $error)
                  <li class="list-group-item text-danger">
                     {{ $error }}
                  </li>
               @endforeach
           </ul>   
       @endif
            <div class="panel panel-default">
                <div class="panel-heading text-info">
                    <h4>Add a new Product</h4>
                </div>
                <div class="panel-body">
                    <form action="{{ route('add.product') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="product">Product Name</label>
                            <input type="text" class="form-control" name="product" id="product">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity in Stock</label>
                            <input type="text" class="form-control" name="quantity" id="quantity">
                        </div> 
                        <div class="form-group">
                            <label for="price">Price per item</label>
                            <input type="text" class="form-control" name="price" id="price">
                        </div>   
                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-8">
                <table class="table">
                        <thead>
                          <tr>
                            <th>Product name</th>
                            <th>Quantity in stock</th>
                            <th> Price per item</th>
                            <th>Datetime submitted</th>
                            <th>Total value number</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                               <tr>
                                    <td>{{ $product->product }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->datetime_submitted }}</td>
                                    <td>{{ ($product->quantity)*($product->price) }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td class="text-danger text-center" colspan="4">
                                    <h4>Sum Total is :: {{ $sum }}</h4>
                                </td>
                            </tr>
                        </tbody>
                </table>            
        </div>
    </div>       
@endsection
