@extends('layouts.app')

@section('content')

<div class="ShowiPhoneXPage">
	<div class="container">
		
		<div class="row">
			<div class="offset-lg-3 col-lg-6 itemDiv">
				<img src="{{ asset('images/iphonex-1.png') }}">
			</div>
		</div>


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