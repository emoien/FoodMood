@extends('adminlte::page')

@section('title','Products')


@section('content')
    <div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Products</h5>
                </div>
                <div class="col-sm-1 float-sm-right">
                        <a href="{{route('products.create')}}">
                            <button class="btn btn-md btn-primary">Create</button>
                        </a>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Price</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th scope="row">{{$product->id}}</th>
      <td>{{$product->name}} </td>
      <td>{{$product->description}} </td>
      <td>{{$product->price}} </td>
      <td>{{$product->status()}}</td>
      
    </tr>
    @endforeach

  </tbody>
</table>
        </div>
    </div>

@endsection

