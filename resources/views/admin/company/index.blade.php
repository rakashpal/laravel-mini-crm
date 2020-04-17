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
                            <form method="post" action="{{route('companies.destroy',[$com->id])}}"  class="delete_form_action" >
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
