@extends('index')

@section('content2')
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">All Data</h3>
          </div><!-- /.box-header -->
          <div class="box-body">
              <form action="{{route('dashboard')}}" method="GET">
                <div class="row">
                  <div class="col-xs-6 col-md-4">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search" name="search" id="txtSearch"/>
                      <div class="input-group-btn">
                        <button class="btn btn-primary" type="submit">
                          <i class="fa fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <p class="h6 text-muted">Search by Channel..</p>
              </form> 
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
                @unless($inputs->isEmpty())
                @foreach ($inputs  as  $input)
                <tr>
                  <td>{{$input->Order_Date}}</td>
                  <td>{{$input->Channel}}</td>
                  <td>{{$input->SKU}}</td>
                  <td>{{$input->Item_Description}}</td>
                  <td>{{$input->Origin}}</td>
                  <td>{{$input->SO}}</td>
                  <td>{{$input->Total_Price}}</td>
                  <td>{{$input->Cost}}</td>
                  <td>{{$input->Shipping_Cost}}</td>
                  <td>{{$input->Profit}}</td>
                </tr>
                @endforeach
                @else
                <p>No Data Found.</p>
                @endunless
              </tbody>
            </table>
            <hr>
            {{$inputs->links()}}
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.content-wrapper -->

    </div><!-- ./wrapper -->
    @endsection
   
