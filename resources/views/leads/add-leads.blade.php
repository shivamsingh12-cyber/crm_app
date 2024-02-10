@extends('layout.master')

@section('dynamic')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead Information</h1>
          </div>
          <!-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Project Add</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Lead Add</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <form action="" method="post">
              @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="fName">First Name <span class="text-danger">*</span></label>
                <input type="text" id="fName" class="form-control" name="first_name"value="{{old('first_name')}}">
                @error('first_name')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="lName">Last Name <span class="text-danger">*</span></label>
                <input type="text" id="lName" class="form-control" name="last_name"value="{{old('last_name')}}">
                @error('last_name')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">Title<span class="text-danger">*</span></label>
                <input type="text" id="title" class="form-control" name="title"value="{{old('title')}}">
                @error('title')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="phone">Phone <span class="text-danger">*</span></label>
                <input type="number" id="phone" class="form-control" name="phone"value="{{old('phone')}}">
                @error('phone')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
             
              <div class="form-group">
                <label for="email">Email<span class="text-danger">*</span></label>
                <input type="text" id="email" class="form-control" name="email" value="{{old('email')}}">
                @error('email')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              @php
                $lead_source=array('Advertising','Social Media','Direct Call','Search');
              @endphp
              <div class="form-group">
                <label for="inputStatus">Lead Source</label>
                <select id="inputStatus" class="form-control custom-select" name="lead_source">
                  <option selected disabled>Select one</option>
                  @foreach($lead_source as $single)
                  <option value="{{ $single }}">{{ $single }}</option>
                  @endforeach
                 
                </select>
              </div>
              @php
                $lead_status=array('Qualification','Needs Analysis','Proposals/ Price Quote','Negotiation','Closed Won','Closed Lost');
              @endphp
              <div class="form-group">
                <label for="inputStatus">Lead Status</label>
                <select id="inputStatus" class="form-control custom-select" name="lead_status">
                  <option selected disabled>Select one</option>
                  @foreach($lead_status as $single)
                  <option value="{{ $single }}">{{ $single }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="comp">Client Company</label>
                <input type="text" id="comp" class="form-control" name="company"value="{{old('company')}}">
                @error('company')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Address Information</h3>

              <!-- <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div> -->
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Country</label>
                <input type="text" id="inputEstimatedBudget" class="form-control" name="country">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Address</label>
                <input type="text" id="inputSpentBudget" class="form-control" name="address">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Pincode</label>
                <input type="text" id="inputEstimatedDuration" class="form-control" name="zipcode">
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Street</label>
                <input type="text" id="inputEstimatedDuration" class="form-control" name="country">
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      <div class="col">
        <div class="col-12">
          <input type="submit" value="submit" class="btn btn-success float-left" name="submit">
          <input type="reset" value="Reset" class="btn btn-primary float-right">
          
        </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
@endsection

@push('script')
<!-- jQuery -->
<script src="{{url('')}}/../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('')}}/../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('')}}/../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('')}}/../../dist/js/demo.js"></script>
@endpush





