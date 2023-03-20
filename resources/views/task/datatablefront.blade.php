@extends('task.layout')

@section('body')
    <!-- BEGIN Page Content -->
    <main id="js-page-content" role="main" class="page-content">

         <div class="row">
            <div class="col-xl-12">
              <div id="panel-1" class="panel">
                <div class="panel-hdr">
                  <h2>
                    Laravel
                  </h2>

                  <a href="{{route('tasks.taskaddnew')}}" class="btn btn-success waves-effect waves-themed mr-2">Create New Product</a>

                </div>
                
                <div class="panel-container show">
                  <div class="panel-content">
                    <table id="datatables" class="table table-bordered table-hover table-striped w-100">
                      <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th width ="10%">Name</th>
                            <th>Price</th>
                            <th>Details</th>
                            <th>Publish</th>
                            <th width="20%">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

    </main>
    @stop
@section('css')
    <link rel="stylesheet" media="screen, print" href="{{ url('css/datagrid/datatables/datatables.bundle.css') }}">
@stop
@section('js')
    <script src="{{ url('js/datagrid/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ url('js/datagrid/datatables/datatables.export.js') }}"></script>
   
    <script>
    $(document).ready( function () {
    $('#datatables').DataTable({
        
        processing: true,
        serverSide: true,
        searching: true, 
        paging: true,
        ajax: "{{ route('tasks.datatabletask') }}",
        columns: [
          { data: 'no', orderable: false, searchable: true},
          { data: 'name', orderable: false, searchable: true},
          { data: 'price', orderable: false, searchable: false},
          { data: 'details', orderable: false, searchable: false},
          { data: 'publish', orderable: false, searchable: false},
          { data: 'action', name: 'action', class: 'text-center', orderable: false, searchable: false, responsivePriority: 1 },
        ],
        order: [[ 0, "desc" ]],
    });
  });


  function taskdelete(id)
      {
          var url = '{{ route("tasks.taskdelete", ":id") }}'
          url = url.replace(':id', id);     
         

          Swal.fire({
              title: 'Are you sure?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url: url,
                      type: 'get',
                      dataType: 'json',
                      async: true,
                      contentType: false,
                      processData: false
                  }).always(function (data) {
                      $('#datatables').DataTable().draw(false);
                  });
                  
              }
          })
          
      }

    </script>
@stop
