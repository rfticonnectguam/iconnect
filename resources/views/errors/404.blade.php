@extends('layouts.app')

@section('title', '404')

@section('content')

<div class="ErrorPage">
	<div class="container ">
	<img src="{{ asset('images/iconnect-i.png') }}">
		<h1>404</h1>
		<p class="subtitle">Looks like you've got lost...</p>
		<p class="message">The page that you are looking for doesn't exist.</p>	
	</div>{{-- container --}}
</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/reload/payment.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
        });
    </script>
@endsection