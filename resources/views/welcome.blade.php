@extends('layouts.app')

@section('content')

<div class="HomePageDiv">

</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/home.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.home.attachedEvents();
        });
    </script>
@endsection