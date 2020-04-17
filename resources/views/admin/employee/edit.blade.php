@extends('admin.layouts.app')
@section('title',$title)
@section('user_name',$user->name)
@section('content')
<div class="content-wrapper">
   <div class="row">
   <div class="col-md-8 offset-md-2 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                @if (\Session::has('error'))
                  <div class="alert alert-danger">
                     {!! \Session::get('error') !!}
                  </div>
                @endif
                  <h4 class="card-title">{{$title}}</h4>
                  
                  <form class="forms-sample" method="post"  id="create_employee">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">

                    <div class="form-group">
                      <label for="first_name">First Name</label>
                      <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name"
                       value="{{$employee->first_name}}" required />
                    @if ($errors->has('first_name'))
                    <div class="error">{{ $errors->first('first_name') }}</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="last_name">Last Name</label>
                      <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name"
                       value="{{$employee->last_name}}" required />
                    @if ($errors->has('last_name'))
                    <div class="error">{{ $errors->first('last_name') }}</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email"
                       value="{{$employee->email}}" required />
                    @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" class="form-control" id="phone" placeholder="phone"
                       value="{{$employee->phone}}" required />
                    @if ($errors->has('phone'))
                    <div class="error">{{ $errors->first('phone') }}</div>
                    @endif
                    </div>
                    
                    <div class="form-group">
                      <label for="phone">Company</label>
                      <select name="company_id" class="form-control" required>
                        <option  value="">--Select Company--</option>
                        @foreach($companies as $co)
                      <option  value="{{$co->id}}" {{$employee->company_id==$co->id?'selected="selected"':''}}>{{$co->name}}</option>
                          @endforeach
                      </select>
                     
                    @if ($errors->has('company_id'))
                    <div class="error">{{ $errors->first('company_id') }}</div>
                    @endif
                    </div>

                    <button type="submit" class="btn own_btn_background mr-2">update</button>
                  </form>
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
  $(document).on("submit","#create_employee",function($e){
    $e.preventDefault();
 
var form_data = $(this).serializeArray();

var currentObj=$(this);
    $.ajax({
          type:'POST',
          url:'{{route("employees.update",[$employee->id])}}',
         // data:{ "_token": "{{ csrf_token() }}"},
         data: form_data,
          success:function(response){
             if(response.status==1){
              alert(response.message);
        //      currentObj.trigger("reset");
             }else{
              alert(response.message);
             }       
      }
 });
  });
});
  </script>
  
  
  @endsection