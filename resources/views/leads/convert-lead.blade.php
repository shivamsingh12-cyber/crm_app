@extends('layout.master')
@section('dynamic')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create New Deal for this Account</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Convert Lead</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Account:&nbsp; &nbsp;</h3><span>{{$lead_detail->company}}</span></br>
                <h3 class="card-title">Create New Contact: &nbsp;&nbsp;</h3><span>{{$lead_detail->first_name}}</span>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Amount <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Amount" name="amount">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Deal Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Deal Name" name="deal_name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Closing Date <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Closing Date" name="closing_date">
                  </div>
                  @php
                  $lead_status=array('Qualification','Needs Analysis','Proposals/ Price Quote','Negotiation','Closed Won','Closed Lost');
                @endphp
                <div class="form-group">
                  <label for="inputStatus">Stage</label>
                  <select id="inputStatus" class="form-control custom-select" name="lead_stage">
                    <option selected disabled>Select one</option>
                    @foreach($lead_status as $single)
                    <option value="{{ $single }}">{{ $single }}</option>
                    @endforeach
                  </select>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success float-left">Convert</button>
               <a href="{{url('/leads/manage-leads')}}" class="btn btn-primary float-right">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

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
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});
</script>
@endpush