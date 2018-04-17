@extends('layouts.app')

@section('title', 'iPhone X')

@section('content')

<div class="BuyIphoneXPage">
	<div class="container">
		
		<div class="row">
			<div class="col-lg-12 header">
				<h1>iPhone X</h1>
			</div>
		</div>

		<div class="row">
			<div class="offset-lg-3 col-lg-6 infoDiv">
				<p>
					Our vision has always been to create an iPhone that is entirely screen.One so immersive the device itself disappears into the experience. And so intelligent it can respond to a tap, and even a glance.With iPhone X, that vision is now a reality. Say hello to the future. 
				</p>
			</div>
		</div>

		<div class="row">
			<div class="offset-lg-3 col-lg-6 itemDiv">
				<img src="{{ asset('images/iphonex-1.png') }}">
			</div>
		</div>


		<div class="row">
			<div class="offset-lg-2 col-lg-8 mechanicsDiv">
				<label>iPhone X Web Order Mechanics:</label>
				<ol>
					<li>iPhone X units can be picked up starting December 13, 2017 (office hours are 9-6pm).</li>
					
					<li>All iPhone X units do not include SIM card and are unlocked for use on any network.</li>

					<li>All iPhone X online ordering sales are limited to TWO units per person.</li>
					
					<li>All qualified iPhone X orders must be paid in full.</li>

					<li> All qualified iPhone X purchasers MUST bring a valid Government of Guam issued ID and the actual credit card used when making the purchase to claim the iPhone X. Only the actual purchaser, whose name appears on the Government of Guam issued ID and the credit card used in the purchase, will be authorized to pick up the iPhone X unit. No written or verbal authorizations will be allowed. There will be no exceptions.</li>
					
					<li>Upon presentation of the credit card, iConnect will run the credit card with a $5 nominal charge for authentication purposes. This will be reversed/refunded upon successful processing.</li>
					<li>iConnect staff will make copies of the valid Government of Guam ID and actual credit card used in the purchase (front and back) as well as take a picture of purchaser receiving the iPhone X.</li>
					<li>By purchasing an iPhone X, you hereby provide your consent for copies to be made of your Government of Guam ID and actual credit card used as well as your photo taken while receiving the iPhone X.</li>
					<li>Supplies are limited and available on a first come first served basis. While supplies last.</li>
					<li> All sales are final. No exchange of memory size or color once purchase is made.</li>
					<li>Qualified sold units are non-transferable.</li>
					<li>iConnect management reserves the right to make the final decision on any possible question/s that may arise.</li>
					<li>In joining this iConnect Ordering event, the purchaser/customer hereby agrees to abide by all iConnect mechanics, rules and regulations and other terms and conditions the may apply.</li>
				</ol>
			</div>
		</div>
		

		<div class="row">
			<div class="offset-lg-3 col-lg-6 agreementDiv">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
				    I HAVE READ AND AGREE TO THE TERMS AND CONDITIONS
				  </label>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="offset-lg-4 col-lg-4 ">
				<button class="btn btn-block selectPhoneBtn">SELECT PHONE</button>
			</div>
		</div>

	</div>{{-- container --}}
</div>
		
		

@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/contacts.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.contacts.attachedEvents();
        });
    </script>
@endsection