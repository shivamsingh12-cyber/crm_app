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
              <h3 class="card-title">Add Deals</h3>

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
                <label for="fName">Amount<span class="text-danger">*</span></label>
                <input type="text" id="fName" class="form-control" name="amount">
                @error('amount')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="lName">Deal Name <span class="text-danger">*</span></label>
                <input type="text" id="lName" class="form-control" name="deal_name">
                @error('deal_name')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="title">Closing Date<span class="text-danger">*</span></label>
                <input type="date" id="title" class="form-control" name="closing_date" >
                @error('closing_date')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>    
              
              @php
                $lead_status=array('Qualification','Needs Analysis','Proposals/ Price Quote','Negotiation','Closed Won','Closed Lost');
              @endphp
              <div class="form-group">
                <label for="inputStatus">Deal Stage</label>
                <select id="inputStatus" class="form-control custom-select" name="deal_stage">
                  <option selected disabled>Select one</option>
                  @foreach($lead_status as $single)
                  <option value="{{ $single }}">{{ $single }}</option>
                  @endforeach
                </select>
              </div>
              
            
              <div class="form-group">
                <label for="inputStatus">Account Name</label>
                <select id="inputStatus" class="form-control custom-select" name="account_id">
                  @foreach($accounts as $single)
                  <option value="{{ $single->id }}">{{ $single->account_name }}</option>
                  @endforeach
                </select>
                @error('account_id')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Contact Name</label>
                <select id="inputStatus" class="form-control custom-select" name="contact_id">
                  @foreach($contacts as $single)
                  <option value="{{ $single->id }}" >{{ $single->contact_name }}</option>
                  @endforeach
                </select>
                @error('contact_id')
                  <small class="text-danger">{{$message}}</small>
                @enderror
              </div>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
       
        
      <div class="col">
        <div class="col-12">
          <input type="submit" value="submit" class="btn btn-success float-left" name="submit">
          
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script> --}}
@endpush