@extends('admin.layouts.app')
@section('title',$title)
@section('user_name',$user->name)

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
               <a class="nav-link add_button" href="{{route('companies.create')}}">
                <i class=" icon-plus menu-icon"></i>
                <span class="menu-title">Add</span>
              </a>
               <div class="table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Name</th>
                           <th>Email</th>
                           <th>logo</th>
                           <th>website</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @php $key=1
                        @endphp
                        @if($companies->isNotEmpty())
                        @foreach ($companies as $com)
                        <tr>
                           <td>{{$key++}}</td>
                           <td>{{@$com->name}}</td>
                           <td>{{@$com->email}}</td>
                           <td>{{@$com->logo}}</td>
                           <td >
                              {{@$com->website}}
                           </td>
                           <td>
                           <a class="action-button" href="{{route('companies.edit',[$com->id])}}" data-toggle="tooltip" title="Edit">
                            <i class=" icon-pencil menu-icon"></i>
                            <span class="menu-title"></span>
                            </a>
                         </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                           <td colspan="6" style="text-align:center">No Company record exist</td>
                        </tr>
                        @endif
                     </tbody>
                  </table>
                  {{ $companies->links() }}
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
