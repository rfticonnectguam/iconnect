@extends('layouts.app')

@section('content')

<div class="SelectCardDiv BuyloadDiv">
	<div class="container ">
		<div class='row row1'>
			<div class="col-lg-12">
			<br/><br/>
				<h1>Reload Cards</h1>
				<h3>for advanced prepaid and lte prepaid subscribers</h3>
			</div>
		</div>

		<div class='row row2'>
			<div class="col-lg-6">
				<img class="stacked" src="{{ asset('images/stacked.png') }}">
			</div>
			<div class="col-lg-6">
				<img class="stackedlte" src="{{ asset('images/stacked-lte.png') }}">
			</div>
		</div>

		<div class='row row3'>
			<div class="offset-2 col-lg-8 BuyloadForm">
				
				<div class="alert alert-warning" role="alert">
					All prepaid PIN purchases are <span class="solid">FINAL</span> and <span class="solid">NON-REFUNDABLE</span>
				</div>
		

			
				<div class="alert alert-info" role="alert">
					We currently only accept <span class="solid">Visa, Mastercard</span> and <span class="solid">American Express</span> for processing.
					<img class="vma" src="{{ asset('images/vma.png') }}">
				</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="offset-2 col-lg-8">
							<br/>
							<select class="form-control" id="selectReloadCard">
						 		 <option>Please select a Reload Card</option>
							</select>
							<span class="Error ErrorselectReloadCard"></span>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="offset-2 col-lg-8">

							<br/>
							<div class="form-check">
							  <input class="form-check-input" type="checkbox" value="" id="reloadChkBox">
							  <label class="form-check-label" for="reloadChkBox">
							    I am an iConnect Advanced Prepaid Subscriber
							  </label>
							</div>
							<span class="Error ErrorreloadChkBox"></span>
							<br/><br/>
							<button class="btn btn-primary btn-block" id="submitReload">CONFIRM</button>
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
   <script type="text/javascript"  src="{{ asset('js/pages/reload/reload.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.reload.attachedEvents();
        });
    </script>
@endsection