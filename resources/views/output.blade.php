@extends('layouts.app')

@section('content')

@if(!empty($status))
	@if ($status === "SUCCESS")
	   <p>{{ var_dump($data) }}</p>
	@else
	    I don't have any records!
	@endif
@endif

@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/events.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
        });
    </script>
@endsection