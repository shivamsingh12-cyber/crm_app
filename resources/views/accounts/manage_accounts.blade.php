@extends('layout.master')
@section('dynamic')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Projects</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects" id="myTable">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          Sr.no
                      </th>
                      <th >
                          Account Name
                      </th>
                      <th >
                            phone
                      </th>
                      <th >
                            Website
                      </th>
                      <th style="text-align: center;">
                        Actions
                      </th>
                  </tr>
              </thead>
              <tbody>
                      @php 
                        $i=0;
                      @endphp
                @foreach($accounts as $single)
                  <tr>
                      <td>
                       
                    {!! $i+=1!!}
                      </td>
                      <td>
                          <a>
                            {{$single->account_name}}
                          </a>
                      </td>
                      <td>
                      <a>
                      {{$single->phone}}
                          </a>
                      </td>
                      <td>
                      <a>
                      {{$single->website}}
                          </a>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="{{url('/leads/view-lead/'.$single->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{url('/accounts/edit-account/'.$single->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="{{url('/accounts/delete-account/'.$single->id)}}" onclick="confirm('Are you sure you want to delete')">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
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
<!-- DataTables -->
<script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script>
    let table = new DataTable('#myTable');
</script>
@endpush