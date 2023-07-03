@extends('index')

@section('content2')

  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">DS</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Order Date</th>
              <th>Channel</th>
              <th>SKU</th>
              <th>Item Description</th>
              <th>Origin</th>
              <th>SO</th>
              <th>Total Price</th>
              <th>Cost</th>
              <th>Shipping Cost</th>
              <th>Profit</th>
            </tr>
          </thead>
          <tbody>
            @if(!empty($inputData))
            @foreach ($inputData  as  $userInput)
              <tr>
                <td>{{$userInput->Order_Date}}</td>
                <td>{{$userInput->Channel}}</td>
                <td>{{$userInput->SKU}}</td>
                <td>{{$userInput->Item_Description}}</td>
                <td>{{$userInput->Origin}}</td>
                <td>{{$userInput->SO}}</td>
                <td>{{$userInput->Total_Price}}</td>
                <td>{{$userInput->Cost}}</td>
                <td>{{$userInput->Shipping_Cost}}</td>
                <td>{{$userInput->Profit}}</td>
                <td>                
                  <form action="{{route('manage-delete', $userInput->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
            @else
              <p>No Data Found.</p>
            @endif
          </tbody>
        </table>     
        {{$inputData->render()}}
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.content-wrapper -->
@endsection