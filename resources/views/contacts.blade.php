@extends('layouts.app')

@section('content')

<div class="ContactPageDiv">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
			<h4>About Us</h4>

			<p>
			We are iCONNECT™, a premier provider of world-class telecommunications services and products on Guam, the Marianas, and the Western Pacific.</p>

			<p>For more than a decade, we have been instrumental in pioneering a telecommunications system that enabled our subscribers enjoy a better work-life balance—allowing them to stay in touch with more people—with our wider network coverage and faster connection speeds at more cost-friendly rates.</p>

			<br/>
			<h4>Our Innovations</h4>
			<p>On September 3, 2014, iConnect proudly launches the next generation of voice and data communications. iConnect Advanced 4G LTE is an entirely new HSPA+/LTE voice and data network that offers crystal clear voice service and wireless data speeds of up to 21 Mbps.</p>

			<p>iConnect Advanced is an end to end Alcatel-Lucent network, the same network that has been supplied to Verizon and AT&T by Alcatel-Lucent. This brand new HSPA+/LTE network with leading 4G technology supports a wide selection of smartphones from major manufacturers. The iConnect Advanced network is Public Safety rated to ensure continued operations under adverse conditions.</p>

			<p>With our signature Push-To-Talk (PTT) digital cellular and text messaging technology on both prepaid and postpaid platforms, based on Motorola's cutting-edge iDEN® technology, our subscribers have enjoyed the fastest and widest PTT network coverage in the region since the year 2000.</p>

			<p>In 2013, we bring to Guam another first: iCONNECT™ True LTE 4G, an all-new network technology that provides a faster way of connecting to the Internet. And, alongside our GSM cellular network Buddy, we offer more affordable and wider choices for our subscribers to customize their telecommunications experience, allowing them to have the best and most innovative wireless telecommunications service that is fit for their needs.</p>

			<br/>
			<h4>Our History</h4>
			<p>In 1999, iCONNECT™ took over Motorola's existing mobile radio network on Guam and Saipan, and deployed a next-generation, enhanced, and specialized mobile radio service.</p>

			<p>Two years after our 2001 debut on Guam, iCONNECT™ extended its services to Saipan and, by the spring of 2004, Tinian and Rota were added in the network—uniting all four islands for the first time and offering the widest coverage by one service provider.</p>

			<p>Today, iCONNECT subscribers enjoy huge savings from Nationwide Minutes, one of our distinctive call services that allow calls to all 50 U.S. states, at the cost of doing a local phone call.</p>
			
			<br><br/>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-4">
				<img class="logo" src="{{ asset('images/iconnect-i.jpg') }}" >
			</div>

			<div class="col-md-8">
				<h4>Our List of Firsts</h4>
				<p>We take pride in being a revolutionary telecommunications company in the region. Here are some of the innovations we introduced.</p>

				<ul>
					<li>The first all-digital Push-To-Talk cellular service on Guam</li>
					<li>The first and only company offering Split Bill for corporate accounts</li>
					<li>The world's first to offer global Push-To-Talk service with iMessenger</li>
					<li>The first to extend Push-To-Talk cellular service to Saipan, Tinian, and Rota</li>
					<li>The first and only telecommunications company in the Marianas offering Uniform Cellular Access Numbers; same 868, 878, 888, and 898 prefixes when calling between Guam and the CNMI</li>
					<li>The world's first prepaid Push-To-Talk service</li>
					<li>The first to offer Nationwide Minutes; zero long distance charges for calls to the US Mainland, Hawaii, and Alaska</li>
				</ul>
			</div>

		</div>

			<div class="row">
				<div class="col-lg-12 messageHeader">
					<br/><br/><br/>
					<h1>CONTACT US</h1>
					<br/>
				</div>

				<div class="col-md-6">
					<div class="form-group ParentName">
					    <input type="text" class="form-control" id="Name" placeholder="Enter Name">
						<span class="Error ErrorName"></span>
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group ParentEmail">
					    <input type="text" class="form-control" id="Email" placeholder="Enter Email">
						<span class="Error ErrorEmail"></span>
					</div>
				</div>
				<br/><br/>

				<div class="col-md-12">
					<div class="form-group ParentMessage">
					 <textarea class="form-control" rows="6" id="Message" placeholder="Enter your message"></textarea>
					 <span class="Error ErrorMessage"></span>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="offset-4 col-lg-4 recaptchaContactDiv">
						{!! Recaptcha::render() !!}

						<span class="Error ErrorRecaptcha"></span>
					</div>
				</div>

				<div class="offset-4 col-md-4">
					<br/>
					 <button id="sendMsg" class="btn btn-block submitMsg">SUBMIT</button>
				</div>
			</div>

			<br/><br/>

			
		</div>{{-- container --}}
		
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="bigTitleheader">
						<h1>CALL (671)888-8888</h1>
						<h3>EMAIL INFORMATION@ICONNECTGUAM.COM</h3>
					</div>
				</div>
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