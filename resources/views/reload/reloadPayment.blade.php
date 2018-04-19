@extends('layouts.app')

@section('title', 'Buy Load')

@section('content')

<div class="ReloadPayment BuyloadDiv">
	<div class="container ">
		<div class='row row1'>
			<div class="col-lg-12">
			<br/><br/>
				<h1>Reload Cards</h1>
				<h3>for advanced prepaid and lte prepaid subscribers</h3>
			</div>
		</div>

		{{-- <div class='row row2'>
			<div class="col-lg-6">
				<img class="stacked" src="{{ asset('images/stacked.png') }}">
			</div>
			<div class="col-lg-6">
				<img class="stackedlte" src="{{ asset('images/stacked-lte.png') }}">
			</div>
		</div> --}}

		<div class='row row3'>
			<div class="offset-2 col-lg-8 BuyloadForm">
				
				{{-- <div class="alert alert-warning" role="alert">
					All prepaid PIN purchases are <span class="solid">FINAL</span> and <span class="solid">NON-REFUNDABLE</span>
				</div> --}}
		

			
				<div class="alert alert-info" role="alert" id="HeaderMsg">
					
				</div>

				<div class="row">
					<div class="col-lg-12">
					<br/>
						<h4>You are purchasing a $10.00 iCnnect 4G LTE Reload Card</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-12">
					<br/>
						<img class="stackedlte" src="{{ asset('images/card3.png') }}">
					</div>
				</div>
				
				<script type="text/javascript">
					@if(!empty($status))
						@if($status == "FAILED" || $status == "ERROR")
							
							var status = {!! json_encode($status) !!};

					  		@if(!empty($message))
								 var message = {!! json_encode($message) !!};
							@else
								var message = "";
							@endif


							@if(!empty($data))
								 var data = {!! json_encode($data) !!};
							@else
								var data = "";
							@endif
							
						@else
							var status;
							var data;
							var message;
						@endif
					@else
					@endif	
				</script>

				<form id="paymentForm" action="{{url('reloadpayment')}}" method="post">
					{{ csrf_field() }}
					<input type="hidden" id="Card_type" name="Card_type">
					<div class="row">
						<div class="col-lg-12">
							<div class="offset-2 col-lg-8">
								<br/>
								<p>A digital copy of your purchase information will be snet to this email.<br/>
								Please make sure that thi is a valid.</p>

								<div class="form-group ParentEmail ">
								    <input type="text" name="Email" class="form-control" id="Email" placeholder="Email">
								    <span class="Error ErrorEmail"></span>
								</div>
							</div>
						</div>

						<div class="col-lg-12">
							<br/>
							<div class="alert alert-info" role="alert">
								We currently only accept <span class="solid">Visa, Mastercard</span> and <span class="solid">American Express</span> for processing.
								<img class="vma" src="{{ asset('images/vma.png') }}">
							</div>
						</div>
						
						<div class="col-lg-12">
							<div class="offset-2 col-lg-8">
								<p>Please enter your credit card information</p>
								<br/>
								
								<div class="form-group ParentFirst_name ">
								    <input type="text" class="form-control xStrictAlpha Capitalized" name="First_name" id="First_name" placeholder="First Name">
								    <span class="Error ErrorFirst_name"></span>
								</div>

								<div class="form-group ParentLast_name">
								    <input type="text" name="Last_name" class="form-control Capitalized" id="Last_name" placeholder="Last Name">
								    <span class="Error ErrorLast_name"></span>
								</div>

								<div class="form-group ParentCCNumber">
								    <input type="text" name="CCNumber" class="form-control xStrictNum" id="CCNumber" placeholder="Credit Card Number">
									<span class="Error ErrorCCNumber"></span>
								</div>

								<div class="form-group ParentCVV">
								    <input type="text" class="form-control" name="CVV" id="CVV" placeholder="CVV">
									<span class="Error ErrorCVV"></span>
								</div>

								<div class="form-group ParentAddress">
								    <input type="text" class="form-control" name="Address" id="Address" placeholder="Address">
									<span class="Error ErrorAddress"></span>
								</div>

								<div class="form-group ParentCity ">
								    <input type="text" name="City" class="form-control Capitalized" id="City" placeholder="City">
									<span class="Error ErrorCity"></span>
								</div>

								<div class="form-group ParentState">
								    <input type="text" name="State" class="form-control" id="State" placeholder="State">
									<span class="Error ErrorState"></span>
								</div>

								<div class="form-group ParentZipCode">
								    <input type="text" name="ZipCode" class="form-control xStrictNum" id="ZipCode" placeholder="Zipcode">
									<span class="Error ErrorZipCode"></span>
								</div>

								<div class="form-group ParentCountry">
								    <input type="text" name="Country" class="form-control Capitalized" id="Country" placeholder="Country">
									<span class="Error ErrorCountry"></span>
								</div>

								<div class="form-group ParentExpiry_date">
								    <input type="text"  name="Expiry_date" class="form-control xStrictNum" id="Expiry_date" placeholder="Expiry Date ( mm/yyyy )">
									<span class="Error ErrorExpiry_date"></span>
								</div>

								<br/>
								<div class="form-check">
								  <input class="form-check-input" type="checkbox" id="AgreeOne">
								 	I am an iConnect Advanced Prepaid Subscriber
								</div>
									<span class="Error ErrorAgreeOne ErrorChk"></span>
									<br/>
								<div class="form-check">
								<br/>
								  <input class="form-check-input" type="checkbox" id="AgreeTwo">
								  I agree that any PIN purchase I make is FINAL and NON-REFUNDABLE
								</div>
									<span class="Error ErrorAgreeTwo ErrorChk"></span>

							</div>
						</div>


						<div class="col-lg-12">
							<br/>
							<div class="alert alert-warning configAlert" >
								Clicking on the PAY button below will trigger a payment that amounts to your reaload card selection. <br/> Please double check all the above information and make sure you have chosen your desired reload card!
							</div>
						</div>

						<div class="col-lg-12 recaptchaDiv">
							<div class="offset-3 col-lg-4 ">
								{!! Recaptcha::render() !!}

								
							</div>
							<span class="Error ErrorRecaptcha"></span>
						</div>
						<div class="col-lg-12">
							<div class="offset-2 col-lg-8">
									


								<br/>
								<button type="submit" class="btn btn-primary btn-block" id="submitPayment">CONFIRM</button>
								<br/>
								<label>For instructions on how to use your reload card, click <a href="#">here</a></label>
							</div>
						</div>

				</form>{{-- end of form --}}
			
				</div>
			</div> {{-- buyloadform --}}
		</div>{{-- row3 --}}
	</div>{{-- container --}}
</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/reload/payment.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.reload.payment.attachedEvents();
        });
    </script>
@endsection