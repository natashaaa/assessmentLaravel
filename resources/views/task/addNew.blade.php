@extends('task.layout')

@section('body')

    <main id="js-page-content" role="main" class="page-content">

        <div class="row">
            <div class="col-xl-12">
              <div id="panel-1" class="panel">
                <div class="panel-hdr mb-3">
                  <h2>
                    Add New Product
                  </h2>
                  <a href="{{ route('tasks.index') }}" class="btn btn-primary waves-effect waves-themed mr-2">Back</a>
                </div>
                <form action="{{ route('tasks.taskstore') }}" method="POST" enctype="multipart/form-data" id="taskaddnew"> 
                
                  @csrf
                  <div class="panel-container">
                    <div class="panel-content">
                      <div class="row">
                        <div class="col-12 pl-1 form-group">
                            <label class="form-label" for="name">Name: </label>
                            <input name="name" class="form-control" id="name" placeholder="Name"/>
                        </div>

                        <div class="col-12 pl-1 form-group">
                            <label class="form-label" for="price">Price: </label>
                            <input name="price" class="form-control" id="price" placeholder="Price" />
                        </div> 

                        <div class="col-12 pl-1 form-group">
                            <label class="form-label" for="name">Details: </label>
                            <textarea name="details" class="form-control" id="details" placeholder="Details"></textarea>
                        </div>

                        <div class="col-12 pl-1 form-group">
                          <label class="form-label" for="publish">Publish: </label>
                            <div class="custom-control custom-radio custom-control">
                              <input type="radio" class="custom-control-input" id="yes" name="publish" value="yes">
                              <label class="custom-control-label" for="yes">Yes</label>
                            </div>

                              <div class="custom-control custom-radio custom-control">
                                <input type="radio" class="custom-control-input" id="no" name="publish" value="no">
                                <label class="custom-control-label" for="no">No</label>
                              </div>
                      </div> 

                        
                        <div class="d-flex justify-content-center mt-5 mb-3">
                            <div class="ml-3 mt-4">
                            <button id="submitBtn" name="submitBtn" type="submit" class="btn btn-primary waves-effect btn-lg waves-themed submitBtn">Submit</button>
                            </div>
                        </div>

                      </div>
                    
                    </div>
                  </div>
                </form>
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
