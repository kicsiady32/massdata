@extends('index')

@section('content2')

  @push('head')
    <script src="{{ asset('dist/js/functions.js')}}"></script>
  @endpush  

  <div class="content-wrapper">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Import Files</h3>
              <div class="form-group">
                <label for="import">Import File</label>
                    <select class="form-control" id="import" value="Import orders" onclick="getOption()">
                      <option>Input type</option>
                      <option value="csv">CSV</option>
                  </select>
              </div>
              @if(session()->has('message'))
                <p>
                  {{ session()->get('message') }}
                </p>
              @endif
              @if(session()->has('file'))
              <p>
                {{ session()->get('file') }}
              </p>
              @endif
              @if(session()->has('invalid'))
              <p>
              {{ session()->get('invalid') }}
              </p>
              @endif
            <form action="{{route('csvimport')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="csv_file">DS Name</label>
                <input type="text" class="form-control" id="dataname" name="dataname">
                @error('dataname')
              <div class="text-danger">
                  {{$message}}
              </div>
              @enderror
              </div>
              <div class="form-group">
                <label for="csv_file">DS Sheet</label>
                <input type="file" class="form-control-file" id="csv_file" name="file">
                <p id="outputOne"></p>
                @error('file')
              <div class="text-danger">
                  {{$message}}
              </div>
              @enderror
                <button class="btn btn-primary btn-sm">Import</button>
              </div>
            </form>
          </div><!-- /.box-header -->
          
        </div><!-- /.box -->
      </div>
    </div>
  </div>
@endsection