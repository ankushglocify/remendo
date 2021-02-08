@extends('layouts.main')

@section('content')
<!---- Dashboard ----->
<section class="navbarMenu">
  <!-- <div class="navBarList">
        <div class="orderList">
          <ul class="nav nav-pills">
            <li ><a data-toggle="pill" id="home-tab-ex" href="#home-ex" class="active">All Orders<span id="all_orders_count">(1359)</span></a></li>
            <li><a data-toggle="pill" id="profile-tab-ex" href="#profile-ex">New Orders<span id="new_orders_count">(451)</span></a></li>
            <li><a data-toggle="pill" id="process-tab-ex" href="#process-ex">Process<span id="process_orders_count">(12)</span></a></li>
            <li><a data-toggle="pill" id="manifest-tab-ex" href="#manifest-ex">Manifest List<span id="manifest_orders_count">(154)</span></a></li>
            <li><a data-toggle="pill" id="cancelorder-tab-ex" href="#cancelorder-ex">Cancel List<span id="cancel_orders_count">(116)</span></a></li>
            <li><a data-toggle="pill" id="holdorder-tab-ex" href="#holdorder-ex">Hold List<span id="hold_orders_count">(3)</span></a></li>
            <li><a data-toggle="pill" id="trackorder-tab-ex" href="#trackorder-ex">Track List<span id="track_orders_count">(663)</span></a></li>
            <li><a data-toggle="pill" id="rto-tab-ex" href="#rtoorder-ex">RTO List<span id="rto_orders_count">(81)</span></a></li>
          </ul>
        </div>        
         <div class="orderDetails">
           <button class="btn btn-primary" id="syncOrder" data-toggle="tooltip" data-placement="top" title="Sync"><span><i class="fas fa-sync"></i></span></button>
           <button class="btn btn-primary" id="return" data-toggle="tooltip" data-placement="top" title="Create Return"><span><i class="fas fa-plus-square"></i></span></button>
          <button class="btn btn-primary" id="rto" data-toggle="tooltip" data-placement="top" title="Mark as RTO"><span><i class="fas fa-thumbtack"></i></span></button>
          <button class="btn btn-primary" id="exportOrdersFirstTab" data-toggle="tooltip" data-placement="top" title="Export Orders"><span><i class="fas fa-file-export"></i></span></button>
          <button class="btn btn-primary" id="uploadFile" data-toggle="tooltip" data-placement="top" title="Select CSV File"><input type="file" id="csvfileOrd" name="csvfileOrd"><span><i class="fas fa-upload"></i></span></button> -->
          <!-- <button class="btn btn-primary" id="importOrd" data-toggle="tooltip" data-placement="top" title="Import"><span><i class="fas fa-file-import"></i></span></button> 
        </div> 
      </div> -->
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
                          <th class="tableCell tableCheckBox"><span style="width: 20px;"><label class="checkbox checkbox-single checkbox-all"><input type="checkbox">&nbsp;<span></span></label></span></th>
                          <th class="tableCell"><span style="">Name</span></th>
                          <th class="tableCell"><span style="">Phone Number</span></th>
                          <th class="tableCell"><span style="">Email</span></th>
                          <th class="tableCell"><span style="">Birthday</span></th>
                          <th class="tableCell"><span style="">Aniversary</span></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $value)
                        <tr>
                        <td></td>
                         <td>{{$value->name}}</td>
                         <td>{{$value->phone}}</td>
                         <td>{{$value->email}}</td>
                         <td>{{date('d-m-Y', strtotime($value->dob))}}</td>
                         <td>{{date('d-m-Y', strtotime($value->aniversary))}}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="paginationList">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                        <div class="shortList">
                        <div class="dataTables_length">
                          <label>
                            <select id="num_rows" name="num_rows" class="custom-select custom-select-sm form-control form-control-sm">
                              <option value="5">5</option>
                              <option value="10">10</option>
                              <option value="20">20</option>
                              <option value="40">40</option>
                              <option value="50">50</option>
                              <option value="100" selected="selected">100</option>
                              <option value="150">150</option>                              
                            </select>
                          Records</label>
                        </div>
                      </div>
                      </div>
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
      </div>
    </div>
  </div>
</div>
@endsection
