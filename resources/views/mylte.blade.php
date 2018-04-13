@extends('layouts.app')

@section('title', 'My LTE')

@section('content')

<div class="MyMobileDiv">

</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/mylte/login.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.mylte.login.attachedEvents();
        });
    </script>
@endsection