@extends('layouts.super.main')

@section('content')
<!---- Dashboard ----->
<section class="contactLists">
  
  <div class="container">
      <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="flash-message">
            @if($errors->any())
            <p class="alert alert-danger">{{$errors->first()}}</p>
            @endif
         </div>
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
          @endif


          @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
            </div>
          @endif
            <div class="card contactTable">
              <div class="card-body tableBody">
                <div class="contactHeader">
                    <div class="conatctTitle">
                      <h3>Contact List</h3>
                    </div>
                   <!--  <div class="contactBtn">
                      <div class="addBtns">
                        <a href="{{url('/addMember')}}"><button type="button" class="btn btn default addUserBtn"> <i class="fas fa-user-plus"></i> <span>Add user</span></button></a>
                        <button type="button" class="btn btn-default addUserBtn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-import"></i> <span>Import</span></button>
                      </div>
                    </div> -->
                  </div>
                <!-- <div class="orderSearchHistory">
                  
                </div> -->
                <div class="tableData">
                  <div class="table-responsive">
                    <table class="table orderTable" id="dataTableAllOrder">
                      <thead>
                        <tr>
                          <th class="tableCell"><span style="">Name</span></th>
                          <th class="tableCell"><span style="">Email</span></th>
                          <th class="tableCell"><span style="">Created AT</span></th>
                          <th class="tableCell"><span style="">Updated AT</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $value)
                        <tr>
                         <td>{{$value->name}}</td>
                         <td>{{$value->email}}</td>
                         <td>{{$value->email}}</td>
                         <td>{{$value->created_at ? date('d-m-Y', strtotime($value->created_at)) :''}}</td>
                         <td>{{$value->updated_at ? date('d-m-Y', strtotime($value->updated_at)) : ''}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Import Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <!-- Form -->
        <form method='post' action='' enctype="multipart/form-data" id="import_form">
          {{ csrf_field() }}
          Select file : <input type='file' name='file' id='file_import' class='form-control' ><br>
          Download Sample CSV : <a href="{{url('all-tweets-csv')}}"><button type="button" class="btn btn-primary" >Download Csv</button></a>
        </form>

        <!-- Preview-->
        <div id='preview'></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='btn_upload'>Upload</button>
        
      </div>
    </div>
  </div>
</div>
@endsection
