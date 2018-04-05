@extends('layouts.app')

@section('content')

<div class="ShowLteTrue4g">
	<div class="container-fluid">
		
		<div class="row firstRow">
			
			<div class="container-fluid Sub1Row">
				<div class="row">
					<div class="container">
						<div class="col-lg-12">
							<br/><br/>
							<h3>Less waiting, more surfing</h3>
							<p>iCONNECT™ LTE True 4G is an all-new, world-class network service that provides a faster way of connecting to the Internet.</p>

							<p>Our LTE True 4G technology is 10 times faster than 3G—do Skype calls or watch YouTube HD videos with little to no buffering time. With download speeds of up to 21 mbps and uploads of up to 5 mbps, this means less waiting, more surfing..</p>
						</div>
					</div>
				</div>
		</div>
	</div>{{-- container-fluid --}}
	
	<div class="container-fluid">
			<div class="row secondRow">
					<div class="col-lg-12 header">
						<h2>LTE True 4G Features You'll Love</h2>
						<p>Connect with the power of pure LTE, only from iCONNECT™</p>
					</div>
			</div>
	</div>{{-- container-fluid --}}

	<div class="container">
		<div class="row thirdRow">
			
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-4">
						<img  src="{{ asset('images/ltef1.jpg') }}">
					</div>
					<div class="col-lg-8">
						<p class='header'>The Most Advanced LTE Network on Guam</p>
						<p>Our iCONNECT™ network is created from the ground up by Alcatel-Lucent—the same company that built the AT&T© and Verizon® 4G LTE networks in the U.S.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-4">
						<img  src="{{ asset('images/ltef2.jpg') }}">
					</div>
					<div class="col-lg-8">
						<p class='header'>Made on Guam</p>
						<p>iCONNECT™ started in 1999—with love for Guam in mind. Nearly two decades after, we are still serving up telecommunication innovations that continue to excite Guam.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-4">
						<img  src="{{ asset('images/ltef4.jpg') }}">
					</div>
					<div class="col-lg-8">
						<p class='header'>Choose Your Connection</p>
						<p>Whether you want it for your home, office, or on-the-go, there's an iCONNECT™ connection that's right for you.</p>
					</div>
				</div>
			</div>
		</div>

		<hr>
	</div>{{-- container- --}}

	<div class="container-fluid">
			<div class="row fourthRow">
					<div class="col-lg-12">
						<h2>LTE True 4G Devices</h2>
						<p>Whether you want it for your home, office or on-the-go, there's an iCONNECT™ LTE True 4G connection that's right for you!</p>
					</div>
			</div>
	</div>{{-- container-fluid --}}

	<div class="container">
		<div class="row fifthRow">
			<div class="col-lg-4 Sub1Row">
				<img src="{{ asset('images/device1.jpg') }}">
				<p class="header">Home and Office Router</p>
				<hr/>
				<p>Jumpstart your home network or reduce office broadband downtime with our plug-and-surf router.</p>
			</div>
			<div class="col-lg-4 Sub1Row">
				<img src="{{ asset('images/device2.jpg') }}">
				<p class="header">Mobile Hotspot</p>
				<hr/>
				<p>Connect up to five devices with this handy portable wireless hotspot that uses iCONNECT™ LTE True 4G MiFi technology.</p>
			</div>
			<div class="col-lg-4 Sub1Row">
				<img src="{{ asset('images/device3.jpg') }}">
				<p class="header">Corporate and Large Scale Application</p>
				<hr/>
				<p>Get affordable, high speed LTE 4G connection solutions for your large-scale business requirements.</p>
			</div>
		</div>
	</div>

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