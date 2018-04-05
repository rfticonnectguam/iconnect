@extends('layouts.app')

@section('content')


@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/events.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.events.attachedEvents();
        });
    </script>
@endsection