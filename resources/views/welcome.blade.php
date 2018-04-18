@extends('layouts.app')

@section('title', 'Home')

@section('content')

<div class="HomePageDiv">
	<div class="container">
		<div class="row">

			{{-- <div class="offset-4 col-lg-4">
				<br/><br/>
				<div class="card">
		                <div class="card-header">Upload File Example</div>
		 
		                <div class="card-body">

							 <form action="{{url('/fileupload')}}" method="post" enctype="multipart/form-data">
					            @csrf
					            <div class="form-group">
					                <input type="file" class="form-control" name="fileToUpload" id="exampleInputFile" aria-describedby="fileHelp">
					                <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
					            </div>
					            <button type="submit" class="btn btn-primary">Submit</button>
					        </form>
					    </div>
				</div>
			</div> --}}
		</div>
	 </div>
</div>
    
@endsection

@section('script')
   <script type="text/javascript"  src="{{ asset('js/pages/home.js') }}"></script>
   <script type="text/javascript">
        $(document).ready(function() {
            $.global.library();
            $.iconnectguam.home.attachedEvents();

            $('#browseImage').on('click',function(){
            	$('#uploadinput').click();
            });

        });
    </script>
@endsection
