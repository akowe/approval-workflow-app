@extends('layouts.app')
@section('content')

 <!-- Begin Page Content -->
        <div class="container-fluid">
        	 <!-- Content Row -->
  <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
            @if(Auth::user()->department_id == 1)
             Director of Operation Dashboard
            @endif

           @if(Auth::user()->department_id == 2)
            Director of Finance Dashboard
            @endif
          </h1>
           
          </div>

          <div class="row">
            <div class="col-md-12">
               @if (session('status'))
                <div class="alert alert-success  text-center" role="alert">
                  {{ session('status') }}
                </div>
              @endif

               @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
            </div>
            </div>

            <div class="row">
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">
                     @if(Auth::user()->department_id == 1) requisition (s) awaiting approval
                       operation department
                      @endif

                     @if(Auth::user()->department_id == 2) requisition (s) awaiting approval
                      finance department
                      @endif
                  </h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                 <table class="table">
                   <thead>
                     <tr>
                      <th>Date</th>
                      <th>title</th>
                      <th>Description</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th></th>
                     </tr>
                   </thead>

                   <tbody>
                   @foreach($requisition as $data)
                     <tr class="small">
                      <td>{{ date('d/M/Y', strtotime($data->date))}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->description}}</td>
                      <td>{{$data->name}}</td>
                      <td>
                           <i class="fas fa-check"></i>  Good - by Chief

                            <div class="btn-group" >
                             <form method="POST" action="{{ url('confirm_request') }}">
                                 @csrf
                              <input type="text" name="id" value="{{$data->id}}" hidden>
                              <button type="submit" class="btn btn-success btn-sm">Approve</button>
                            </form>
                            <span>&nbsp;</span>
                             <form method="POST" action="{{ url('reject_request') }}">
                              @csrf
                              <input type="text" name="id" value="{{$data->id}}" hidden>
                            <button type="submit" class="btn btn-danger btn-sm"> Reject</button>
                          </form>
                        </div>             
                    </td> 

                     </tr>

                     @endforeach
                   </tbody>
                 </table>
                </div>
              </div>
            </div>

          </div>
         </div>
       
@endsection      