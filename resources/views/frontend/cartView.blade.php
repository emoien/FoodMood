@extends('frontend.layout')

@section('css')
<style>

 .padding-top {
     padding-top: 40px;
 }
</style>
@endsection
@section('content')

<section class="cart_area padding-top">
    <div class="container">
      <div class="cart_inner">
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $item)
              <tr>
                <td>
                  <div class="media">
                    <div class="d-flex">
                      <img src="assets/img/arrivel/arrivel_1.png" alt="" />
                    </div>
                    <div class="media-body">
                      <p>{{$item['name']}}</p>
                    </div>
                  </div>
                </td>
                <td>
                  <h5>${{$item['price']}}</h5>
                </td>
                <td>
                  <div class="product_count">
                  <form action="{{route('cart.decrement')}}" method='POST'>

                  

                    @csrf
                    <input type="hidden" value="{{$key}}" name="index">
                    <button class="p-1 px-2 btn_1" style="height:30px; width:100px" ><i class="ti-minus"></i> </button>
                    </form>
                   
                    <input class="input-number" readonly type="text" value="{{$item['quantity']}}" min="0" >
                   

                    <form action="{{route('cart.increment')}}" method='POST'>

                    @csrf
                    <input type="hidden" value="{{$key}}" name="index">
                    <button class=" p-1 px-2 btn_1" style="height:30px; width:100px" ><i class="ti-plus"></i> </button>
                    </form>

                  </div>
                </td>
                <td>
                  <h5>${{$item['price'] * $item['quantity']}}</h5>
                </td>
              </tr>
              @endforeach
        
              
              <tr>
                <td></td>
                <td></td>
                <td>
                  <h5>Total</h5>
                </td>
                <td>
                  <h5>${{$total}}</h5>
                </td>
              </tr>

            </tbody>
          </table>
          <div class="checkout_btn_inner float-right">
            <a class="btn_1" href="{{route('cart.continue.shopping')}}">Continue Shopping</a>
            <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
          </div>
        </div>
      </div>
  </section>

  @endsection
