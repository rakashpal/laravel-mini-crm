@extends('admin.layouts.app')
@section('title',$title)
@section('user_name',$user->name)
@section('content')

        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-account icon-lg text-success"></i>
                    <div class="ml-3">
                      <p class="mb-0">Total Companies</p>
                    <h6>{{$com_count}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-md-center">
                    <i class="mdi mdi-account icon-lg text-success"></i>
                    <div class="ml-3">
                      <p class="mb-0">Total Employees</p>
                      <h6>{{$emp_count}}</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
       
@endsection

@section('footerScript')
@parent
 
@endsection