@extends('layout.master')
@section('dynamic')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Contact us</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact us</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body row">
          <div class="col-5 text-center d-flex align-items-center justify-content-center">
            <div class="">
              <h2>Admin<strong>LTE</strong></h2>
              <p class="lead mb-5">Edit your Contact
              </p>
            </div>
          </div>
          <div class="col-7">
            <form action="" method="post">
                @csrf
            <div class="form-group">
              <label for="inputName">Contact Name<span class="text-danger">*</span></label>
              <input type="text" id="inputName" class="form-control"  name="contact_name" value="{{ $contact_detail->contact_name }}"/>
              @error('contact_name')
              <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
                <label for="inputName">Account Name<span class="text-danger">*</span></label>
              <select name="account_id"  class="form-control">
                  <option value="">Select Account</option>
                @foreach ($account_list as $single)
                @if ($single->id==$contact_detail->account_id)
                <option value="{{ $single->id }}" selected>{{ $single->account_name }} </option>
                @else
                <option value="{{ $single->id }}">{{ $single->account_name }} </option>
                @endif
                @endforeach
              </select>
             
              @error('account_id')
              <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
              <label for="inputSubject">Phone<span class="text-danger">*</span></label>
              <input type="text" id="inputSubject" class="form-control" name="phone" value="{{ $contact_detail->phone }}"/ >
              @error('phone')
              <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
              <label for="inputSubject">email</label>
              <input type="email" id="inputSubject" class="form-control" name="email" value="{{ $contact_detail->email }}"/>
              @error('email')
              <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Update" name="Update">
            </div>
          </div>
        </form>
        </div>
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
    