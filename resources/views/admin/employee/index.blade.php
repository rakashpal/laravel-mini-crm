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
                           <form method="post" action="{{route('employees.destroy',[$emp->id])}}"  class="delete_form_action" >
                              @csrf
                              <input type="hidden" name="_method" value="DELETE">
                             <button type="submit"> <i class=" icon-trash menu-icon"></i>
                              <span class="menu-title"></span></button>
                            </form>
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

@section('footerScript')
@parent
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$(document).ready(function(){
  $(document).on("submit",".delete_form_action",function($e){
    $e.preventDefault();
 
var form_data = $(this).serializeArray();
var url=$(this).attr('action');

var currentObj=$(this);
    $.ajax({
          type:'POST',
          url:url,
         // data:{ "_token": "{{ csrf_token() }}"},
         data: form_data,
          success:function(response){
             if(response.status==1){
              alert(response.message);
        //      currentObj.trigger("reset");
        window.location.reload();
             }else{
              alert(response.message);
             }       
      }
 });
  });
});
  </script>
  
  
  @endsection

