@extends('admin.layouts.app')
@section('title',$title)
@section('user_name',$user->first_name." ".$user->last_name)

@section('content')
<div class="content-wrapper">
   <div class="row">
      <div class="col-lg-12 stretch-card">

         <div class="card">
            <div class="card-body">
            @if (\Session::has('success'))
                  <div class="alert alert-success">
                     {!! \Session::get('success') !!}
                  </div>
                @endif
                @if (\Session::has('error'))
                  <div class="alert alert-danger">
                     {!! \Session::get('error') !!}
                  </div>
                @endif
               <h4 class="card-title">{{$title}}</h4>
               <a class="nav-link add_button" href="{{route('employees.create')}}">
                <i class=" icon-plus menu-icon"></i>
                <span class="menu-title">Add</span>
              </a>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Company</th>
                           <th>Email</th>
                           <th>phone</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $key=1
                        @endphp
                        @if($employees->isNotEmpty())
                        @foreach ($employees as $emp)
                        <tr>
                           <td>{{$key++}}</td>
                           <td>{{@$emp->full_name}}</td>
                           <td>{{@$emp->company->name}}</td>
                           <td>{{@$emp->email}}</td>
                           <td>{{@$emp->phone}}</td>
                           <td>
                              {{--rl('admin/company/'.$com->id.'/edit') --}}
                           <a class="action-button" href="{{route('employees.edit',[$emp->id])}}" data-toggle="tooltip" title="Edit">
                            <i class=" icon-pencil menu-icon"></i>
                            <span class="menu-title"></span>
                            </a>
                         </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                           <td colspan="6" style="text-align:center">No Employee record exist</td>
                        </tr>
                        @endif
                     </tbody>
                  </table>
                  {{ $employees->links() }}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
