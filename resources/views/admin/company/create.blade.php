@extends('admin.layouts.app')
@section('title',$title)
@section('user_name',$user->first_name." ".$user->last_name)
@section('role',$user->role)
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
                  
                  <form class="forms-sample" method="post" enctype="multipart/form-data" id="create_company">
                  @csrf
                    <div class="form-group">
                      <label for="name"> Name</label>
                      <input type="text" name="name" class="form-control" id="name" placeholder="Company Name"
                       value="{{old('name')}}" required />
                    @if ($errors->has('name'))
                    <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="emil">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Company Email"
                       value="{{old('email')}}" required />
                    @if ($errors->has('email'))
                    <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                    </div>
                    <div class="form-group">
                      <label for="emil">Website</label>
                      <input type="text" name="website" class="form-control" id="website" placeholder="Company Website"
                       value="{{old('website')}}" required />
                    @if ($errors->has('website'))
                    <div class="error">{{ $errors->first('website') }}</div>
                    @endif
                    </div>
                    
                  <div class="form-group">
                      <label>Logo </label>
                      <input type="file" name="logo" class="file-upload-default" accept="image/*"  onchange="readURL(this);" >
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image" >
                        <span class="input-group-btn">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                      @if ($errors->has('logo'))
                        <div class="error">{{ $errors->first('logo') }}</div>
                    @endif
                    <img id="blah" style="display:none" src="" alt="service Image" style="margin-top:10px;border:3px solid #3bc3c4" />
                    </div>
                    <button type="submit" class="btn own_btn_background mr-2">Create</button>
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
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#blah')
                  .attr('src', e.target.result)
                  .width(200)
                  .height('auto')
                  .css({'display':'block',"margin-top":"10px","border":"3px solid #3bc3c4"});
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
    
$(document).ready(function(){
  $(document).on("submit","#create_company",function($e){
    $e.preventDefault();
 
var form_data = $(this).serializeArray();

var currentObj=$(this);
    $.ajax({
          type:'POST',
          url:'{{route("companies.store")}}',
         // data:{ "_token": "{{ csrf_token() }}"},
         data: form_data,
          success:function(response){
             if(response.status==1){
              alert(response.message);
              currentObj.trigger("reset");
              $('#blah').hide();
             }else{
              alert(response.message);
             }       
      }
 });
  });
});
  </script>
  
  
  @endsection