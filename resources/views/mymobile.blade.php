@extends('layouts.app')

@section('title', 'My Mobile')

@section('content')

<div class="MyMobileDiv">
	<div class="container">
		<div class="row">
			<div class="offset-lg-4 col-lg-4 loginForm">

				  <div class="form-group">
				  	<div class="logoDiv">
				  	 <img class="logo" src="{{ asset('images/iconnect-logo-mobile.png') }}" >
				    </div>
				    <br/>

				    <div class="input-group mb-2">
			        	<div class="input-group-prepend">
			          		<div class="input-group-text"><i class="far fa-envelope fa-fw"></i></div>
			        	</div>
			        	<input type="text" class="form-control" id="email" placeholder="Email Address">
			     	 </div>

			     	 <div class="input-group mb-2">
			        	<div class="input-group-prepend">
			          		<div class="input-group-text"><i class="fas fa-lock fa-fw"></i></div>
			        	</div>
			        	<input type="password" class="form-control" id="password" placeholder="Password">
			     	 </div>

				  </div>
				 
				  <button  id="loginToMyMobile" class="btn btn-block">LOGIN</button>
					<br/>

				<div class="formLinks">
					<span>Create New Account</span>
					<span>Forgot Password?</span>
					<span>Resend Confirmation Email</span>
				</div>

			</div>


		</div>
	</div>
</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/mymobile/login.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.mymobile.login.attachedEvents();
        });
    </script>
@endsection