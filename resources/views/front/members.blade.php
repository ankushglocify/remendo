@extends('layouts.main')

@section('content')
<!---- Dashboard ----->
<section class="navbarMenu">
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
  <div class="container-fluid">
      <div class="tabBody" id="myTabContentEx">
          <div id="home-ex" class="contactTable">
            <div class="card dataTable">
              <div class="card-body tableBody">
                <div class="contactHeader">
                    <div class="conatctTitle">
                      <h3>Contact List</h3>
                    </div>
                    <div class="contactBtn">
                      <div class="searchorder">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search...">
                        </div>
                      </div>
                      <div class="addBtns">
                        <a href="{{url('/addMember')}}"><button type="button" class="btn btn default addUserBtn"> <i class="fas fa-user-plus"></i> <span>Add user</span></button></a>
                        <button type="button" class="btn btn-default addUserBtn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-file-import"></i> <span>Import</span></button>
                      </div>
                    </div>
                  </div>
                <!-- <div class="orderSearchHistory">
                  
                </div> -->
                <div class="tableData">
                  <div class="table-responsive">
                    <table class="table orderTable" id="dataTableAllOrder">
                      <thead>
                        <tr>
                          <th class="tableCell"><span style="">Name</span></th>
                          <th class="tableCell"><span style="">Phone Number</span></th>
                          <th class="tableCell"><span style="">Email</span></th>
                          <th class="tableCell"><span style="">Birthday</span></th>
                          <th class="tableCell"><span style="">Aniversary</span></th>
                          <th class="tableCell"><span style="">Action</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $value)
                        <tr>
                         <td>{{$value->name}}</td>
                         <td>{{$value->phone}}</td>
                         <td>{{$value->email}}</td>
                         <td>{{$value->dob ? date('d-m-Y', strtotime($value->dob)) :''}}</td>
                         <td>{{$value->aniversary ? date('d-m-Y', strtotime($value->aniversary)) : ''}}</td>
                         <td><a class="pull-left" href="{{url('editMember')}}/{{$value->id}}"  title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                            <a class="pull-left" href="{{url('deleteMember')}}/{{$value->id}}" onclick="return confirm('Are you sure you want to delete record')" title="Delete"><i class="fa fa-trash"></i></a></td>
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
          <!-- <input type='button' class='btn btn-info' value='Upload' id='btn_upload'> -->
        </form>

        <!-- Preview-->
        <div id='preview'></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id='btn_upload'>Upload</button>
        <a href="{{url('all-tweets-csv')}}"><button type="button" class="btn btn-primary" id='btn_upload'>Sample Csv</button></a>
      </div>
    </div>
  </div>
</div>
@endsection
