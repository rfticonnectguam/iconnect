@extends('layouts.app')

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
				
				<div class="row">
					<div class="col-lg-12">
						<div class="offset-2 col-lg-8">
							<br/>
							<p>A digital copy of your purchase information will be snet to this email.<br/>
							Please make sure that thi is a valid.</p>
							<input type="text" class="form-control" placeholder="Email">
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
							
							<div class="form-group">
							    <input type="text" class="form-control" placeholder="First Name">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Last Name">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Credit Card Number">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="CVV">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Address">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="City">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="State">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Zipcode">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Country">
							</div>

							<div class="form-group">
							    <input type="text" class="form-control" placeholder="Expiry Date">
							</div>

							<br/>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="">
							 	I am an iConnect Advanced Prepaid Subscriber
							</div>
							
							<div class="form-check">
							<br/>
							  <input class="form-check-input" type="checkbox" value="" id="">
							  I agree that any PIN purchase I make is FINAL and NON-REFUNDABLE
							 
							</div>
							

						</div>
					</div>


					<div class="col-lg-12">
						<br/>
						<div class="alert alert-warning" >
							Clicking on the PAY button below will trigger a payment that amounts to your reaload card selection. <br/> Please double check all the above information and make sure you have chosen your desired reload card!
						</div>
					</div>


					<div class="col-lg-12">
						<div class="offset-2 col-lg-8">
							<br/>
							<button class="btn btn-primary btn-block">CONFIRM</button>
							<br/>
							<label>For instructions on how to use your reload card, click <a href="#">here</a></label>
						</div>
					</div>

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