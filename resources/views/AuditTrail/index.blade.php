@extends('layouts.dashboard')
@extends('layouts.header')
@extends('layouts.sidebar')

@section('section')


<!-- BEGIN Page Content -->
<!-- the #js-page-content id is needed for some plugins to initialize -->
<main id="js-page-content" role="main" class="page-content">
  <div class="row">
    <div class="col-xl-12">
      <div id="panel-1" class="panel">
        <div class="panel-hdr">
          <h2>
            Filter</span>
          </h2>
        </div>
        <div class="panel-container show">
          <div class="panel-content">
            <div class="form-group row">
              <div class="col-4 pr-1">
                <label class="form-label " for="validationCustom01">Users </label> <span class="text-danger">*</span></label>
                <select class="form-control select2" id="users">
                  <option value="all"></option>
                </select>
              </div>
              <div class="col-4 pl-1">
                <label class="form-label" for="validationCustom01">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control">
              </div>

              <div class="col-4 pl-1">
                <label class="form-label" for="validationCustom01">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-4 pr-1">
                <button id="filter" class="btn btn-md btn-primary">Search</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="panel-1" class="panel">
        <div class="panel-hdr">
          <h2>
            Audit Trail <span class="fw-300"><i>List</i></span>
          </h2>
        </div>
        <div class="panel-container show">
          <div class="panel-content">
            <!-- datatable start -->
            <table id="auditTrailList" class="table table-bordered table-hover table-striped w-100 wrap">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Event Name</th>
                  <th>Module Name</th>
                  <th>Id </th>
                  <th>Old Data </th>
                  <th>New Data</th>
                  <th>Ip Address</th>
                  <th>Browser Type</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@stop
@section('css')
<link rel="stylesheet" media="screen, print" href="{{url('css/datagrid/datatables/datatables.bundle.css')}}">
<link rel="stylesheet" media="screen, print" href="{{url('css/formplugins/select2/select2.bundle.css')}}">

@stop
@section('js')
<!-- PAGE RELATED PLUGIN(S) -->
<script src="{{url('js/datagrid/datatables/datatables.bundle.js')}}"></script>
<script src="{{url('js/formplugins/select2/select2.bundle.js')}}"></script>
<script>
  $(function(){
    
    //auto complete for employee
    let url  = "{{ route('audit.stafflist') }}";         
    //$("#users").val('').trigger('change');       
    $("#users" ).select2({
        minimumInputLength: 2,
        allowClear: true,
        placeholder: 'select..',
        ajax: { 
            url: url,
            type: "GET",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                search: params.term // search term
                };
            },
            processResults: function (data) {
                var results = [];
                $.each(data, function (index, data) {
                    results.push({
                        id             : data.id,
                        text           : data.name,
                    });
                });
                return {
                results: results
                };
            },
            cache: true
        }
    }).on('select2:select', function(event) {
    }).val();
  });
    
    $(document).ready(function(){
      mytable();
      function mytable(from="",to=""){
        if(from == "" && to ==""){
          from = "{{ Carbon\Carbon::now()->toDateString()}}";
          to = "{{ Carbon\Carbon::now()->toDateString()}}";
        }else{
          from = $("#start_date").val();
          to = $("#end_date").val();
        }

        var userid = $("#users :selected").val();
        //populate data table
        $('#auditTrailList').DataTable({
          processing: true,
          serverSide: true,
          searching: false,
          responsive: true,
          ajax: {
            "url":"{{ route('audit.show') }}",
            "type": "POST",
            "data" :{
              "_token": "{{ csrf_token() }}",
              "from" : from,
              "to" : to,
              "user": userid
            }
          },
          columns: [
            {data:'users',name: 'users'},
            {data: 'model_name', name: 'model_name'},
            {data: 'module_name', name: 'module_name'},
            {data: 'auditable_id', name: 'auditable_id'},
            {data: 'old_values', name: 'old_values'},
            {data: 'new_values', name: 'new_values'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'browser_type', name: 'browser_type'},
            {data: 'created_at', name: 'created_at'}
          ]
        });
      }

      $('#filter').click(function(){
        $('#auditTrailList').DataTable().destroy();
        mytable($("#start_date").val(),$("#end_date").val());
      });
    });
    </script>
    @stop
