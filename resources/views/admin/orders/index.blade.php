@extends('adminlte::page')

@section('title','Orders')


@section('content')
   @include('admin.sharedViews.alertMessage')
   <div class="card">
        <div class="card-header card-primary">
            <div class="row">
                <div class="col-sm-11 card-title">
                    <h5 class="m-0 text-dark">Orders</h5>
                </div>
                
            </div>
        </div>
        <div class="card-body table-responsive">
        <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Order ID</th>
      <th scope="col">Order By</th>
      <th scope="col">Delivery Date</th>
      <th scope="col">Status</th>
      <th scope="col">Total</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($orders as $key => $order)
    <tr>
      
      <td>{{$order->id}} </td>
      <td>{{$order->user->username()}} </td>
      <td>{{$order->delivery_date}} </td>
      @if( $order->status == 0)

      <td><button type="button"  class="btn   change-status" data-toggle="modal" data-target="#exampleModal"  data-id='{{$order->id}}' data-status='{{$order->status}}'>
                       {{$order->status()}}
                        </button></td>
       @else
       <td>{{$order->status()}}</td>
       @endif
      
      <td>{{$order->billing_total}} </td>
      <td>
      	 <a href="{{route('orders.view',[ $order])}}"
               class="btn btn-sm btn-info mb-1"><i class="fa fa-eye"></i></a>
      </td>
      
     
      
    </tr>
    @endforeach

  </tbody>
</table>
{{$orders->links()}}
        </div>
    </div>
      
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action= "{{route('orders.change.status')}}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="text" hidden name="id" id="id">
                    <div class="form-group">
                        <select class="form-control" name="status" id="status">
                            
                            @if(auth()->user()->role!=0)
                            <option value="0">Order Placed</option>
                            <option value="1">Delivered</option>
                           @endif
                            <option value="2">Cancel</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection

@section('js')
<script type="text/javascript">

	$(document).on('click', '.change-status', function () {
    $('#status').val($(this).data('status'));
    $('#id').val($(this).data('id'));
});

</script>
@endsection
