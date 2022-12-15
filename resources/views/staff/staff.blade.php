@extends('layouts.app')
@section('content')

 <!-- Begin Page Content -->
        <div class="container-fluid">
        	 <!-- Content Row -->

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
            <!-- send request -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Requisition Form</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                 
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                
                 <form method="POST" action="{{ url('requisition') }}" enctype=”multipart/form-data”>
                   @csrf
                  <div class="form-group">
                  <input type="text" name="title" placeholder="Title" class="form-control">
                  
                </div>

                 <div class="form-group">
                 <textarea cols="2" rows="3" name="description" class="form-control" placeholder="Enter your request here"></textarea>
                
                </div>

                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Send</button>
                </div>
                 </form>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Direct
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Social
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Referral
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All my requisition (s)</h6>
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
                      <th>Status</th>
                     </tr>
                   </thead>

                   <tbody>
                    @foreach($requisition as $data)
                     <tr>
                      <td>{{ date('d/M/Y', strtotime($data->date))}}</td>
                      <td>{{$data->title}}</td>
                      <td>{{$data->description}}</td>
                      <td>
                        @if($data->level== 1)
                          {{$data->request_status}}
                          @endif

                         @if($data->level== 2 and $data->request_status == 'good' )
                          <span class="text-success"><i class="fas fa-check"></i></span> by Manager
                          @endif

                           @if($data->level== 2 and $data->request_status == 'reject' )
                          <span class="text-danger"><i class="fas fa-times"></i></span> by Manager
                          @endif

                          @if($data->level== 3 and $data->request_status == 'good' )
                          <span class="text-success"><i class="fas fa-check"></i></span>  by Chief
                          @endif

                          @if($data->level== 3 and $data->request_status == 'reject' )
                          <span class="text-danger"><i class="fas fa-times"></i></span> by Chief
                          @endif

                          @if($data->level== 4 and $data->request_status == 'good' )
                          <span class="text-success">Approved</span>
                          @endif

                           @if($data->level== 4 and $data->request_status == 'reject' )
                          <span class="text-danger"><i class="fas fa-times"></i></span> by Director
                          @endif
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