@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="offset-lg-4 col-lg-4">
			<br/><br/>
			<form id="login" action="test" method="post">
			{{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Username</label>
			    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" placeholder="Username">
			   
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
			  </div>
			 
			  <button id="submitData" type="submit" class="btn btn-primary">Submit</button>
			</form>
			<br/><br/>
		</div>
	</div>
</div>


{{-- @if(!empty($status))
	@if ($status === "SUCCESS")
	   <p>{{ var_dump($data) }}</p>
	@else
	    I don't have any records!
	@endif
@endif --}}

@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/events.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
        	 $.global.library();
            $('#submitData').on('click',function(e){
            	
            	e.preventDefault();

            	var data = {
            		username : $('#username').val(),
            		password : $('#password').val(),
            	}

            	if(data.username !== ""){
            		$('#login').submit();
            	}else{
            		console.log("failed on validation");
            	}
            	// console.log(data);
            	// $.service.executePost('test',data).done(function (result) {
            	// });//prepaidPayment

            });
        });
    </script>
@endsection