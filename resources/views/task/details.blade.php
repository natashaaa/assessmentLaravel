@extends('task.layout')

@section('body')

    <main id="js-page-content" role="main" class="page-content">

        <div class="row">
            <div class="col-xl-12">
              <div id="panel-1" class="panel">
                <div class="panel-hdr mb-3">
                  <h2>
                    Show Product
                  </h2>
                  <a href="{{ route('tasks.index') }}" class="btn btn-primary waves-effect waves-themed mr-2">Back</a>
                </div>
                
                  @csrf
                  <div class="panel-container">
                    <div class="panel-content">
                      <div class="row">
                          <div class="col-2 pl-1 form-group">
                              <label class="form-label" for="name">Name: {!! $detailss->name !!}</label>  
                          </div>
                      </div>


                      <div class="row">
                        <div class="col-2 pl-1 form-group">
                            <label class="form-label" for="price">Price:  {!! $detailss->price !!}</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 pl-1 form-group">
                          <label class="form-label" for="detials">Details: {!! $detailss->details !!}</label>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-2 pl-1 form-group">
                            <label class="form-label" for="Publish">Publish: {!! $detailss->publish !!}</label>
                        </div>  
                    </div>
                    
                    </div>
                  </div>
              </div>
            </div>
          </div>
    </main>
@stop
@section('css')

   
@stop
@section('js')


    <script>
  
    </script>
@stop
