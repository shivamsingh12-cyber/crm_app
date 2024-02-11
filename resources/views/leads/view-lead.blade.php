@extends('layout.master')
@section('dynamic')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
        
            <div class="card-header">
                <h3 class="card-title">Lead information</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="row">
               
                    <div class="col-lg-5">
                        <table class="table">
                            <tr>
                                <td class="text-right">First Name</td>
                                <td class="text-dark">{{$lead_detail->first_name}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Title</td>
                                <td class="text-dark">{{$lead_detail->title}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Phone</td>
                                <td class="text-dark">{{$lead_detail->phone}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Lead Source</td>
                                <td class="text-dark">{{$lead_detail->lead_source}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-5">
                        <table class="table">
                            <tr>
                                <td class="text-right">Last Name</td>
                                <td class="text-dark">{{$lead_detail->last_name}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Email</td>
                                <td class="text-dark">{{$lead_detail->email}}</td>
                            </tr>
                            <tr>
                                <td class="text-right">Lead Status</td>
                                <td class="text-dark">{{$lead_detail->lead_status}}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- Lead Information -->
                    <br>
                    <!-- address Information -->
                    <!-- <h4 class="text-black">Address information</h4> -->

            </div>
            <div class="row">
                <div class="col-lg-5">
                    <table class="table">
                        <tr>
                            <td class="text-right">Street</td>
                            <td class="text-dark">{{$lead_detail->street}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Pincode</td>
                            <td class="text-dark">{{$lead_detail->zipcode}}</td>
                        </tr>
                        <tr>
                            <td class="text-right">Country</td>
                            <td class="text-dark">{{$lead_detail->country}}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-5">
                    <table class="table">

                        <tr>
                            <td class="text-right">Address</td>
                            <td class="text-dark">{{$lead_detail->address}}</td>
                        </tr>
                    </table>
                </div>
          
            </div>
            <div class="col">
                    <div class="col-12">
                        <a href="{{url('/leads/convert-lead/'.$lead_detail->id)}}" class="btn btn-success float-left"
                            style="margin-bottom: 12px;">Convert</a>

                        <a href="{{url('/leads/edit-lead/'.$lead_detail->id)}}" class="btn btn-primary float-right"
                            style="margin-bottom: 12px;">Edit</a>

                    </div>
                </div>
            
        </div>

        <!-- /.card-body -->

        <!-- /.card-footer-->
</div>
<!-- /.card -->

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
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
@endpush