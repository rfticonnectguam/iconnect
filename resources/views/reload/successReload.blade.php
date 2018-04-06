@extends('layouts.app')

@section('content')

<div class="ReloadPayment BuyloadDiv">
	<div class="container ">
		<div class='row row1'>
			<div class="col-lg-12">
			<br/><br/>
				<h1>Success Reload!</h1>
				<h3>Successfully Reloading your Card.</h3>
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
		

			
				{{-- <div class="alert alert-info" role="alert" id="HeaderMsg">
					
				</div> --}}

				{{-- <div class="row">
					<div class="col-lg-12">
					<br/>
						<h4>You are purchasing a $10.00 iCnnect 4G LTE Reload Card</h4>
					</div>
				</div> --}}

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

							{{-- <div class="form-group ParentEmail ">
							    <input type="text" class="form-control" id="Email" placeholder="Email">
							    <span class="Error ErrorEmail"></span>
							</div> --}}
						</div>
					</div>

					{{-- <div class="col-lg-12">
						<br/>
						<div class="alert alert-info" role="alert">
							We currently only accept <span class="solid">Visa, Mastercard</span> and <span class="solid">American Express</span> for processing.
							<img class="vma" src="{{ asset('images/vma.png') }}">
						</div>
					</div> --}}
					
				

					{{-- <div class="col-lg-12">
						<br/>
						<div class="alert alert-warning" >
							Clicking on the PAY button below will trigger a payment that amounts to your reaload card selection. <br/> Please double check all the above information and make sure you have chosen your desired reload card!
						</div>
					</div> --}}

				</div>{{-- row --}}
			</div> {{-- buyloadform --}}
		</div>{{-- row3 --}}
	</div>{{-- container --}}
</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/reload/successpayment.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.success.payment.attachedEvents();
        });
    </script>
@endsection