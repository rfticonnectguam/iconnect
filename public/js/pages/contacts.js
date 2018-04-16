/*! This is script is for iconnectguam contact page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.home = (typeof $.iconnectguam.home !== 'undefined') ? $.iconnectguam.home : {};

$.iconnectguam.contacts = (function() {

	var __attachedEvents = function(){

		console.log("attached events on contact page");

		$('#sendMsg').on('click',function(e){
			
			e.preventDefault();

			var data = {
				Name: $('#Name').val(),
				Email: $('#Email').val(),
				Message: $('#Message').val(),
				recaptcha_response : grecaptcha.getResponse(),
			}

			if(__validateMessage(data)){

				$('.loader').removeClass('hidden');
				$('#submitMsg').submit();

			}else{
				console.log("Failed on validation");
			}

		});

		if(status != ""){
			console.log(status);
			if(status == "SUCCESS"){
	        	//show swal alert
	        	swal("Great!", "Your message has been sent!", "success");
	     
	        }else if(status == "FAILED"){
	        	//catch errors
	        	if(typeof(data) !== "undefined"){
	        		//show error for name
	        		
	        		if(typeof(data.Name) !== "undefined"){
	        			$('.ErrorName').html(data.Name[0]);
	        		}

	        		if(typeof(data.Email) !== "undefined"){
	        			$('.ErrorEmail').html(data.Email[0]);
	        		}

	        		if(typeof(data.Message) !== "undefined"){
	        			$('.ErrorMessage').html(data.Message[0]);
	        		}
	        		
	        	}
	         	console.log("Failed to send message");
	        	
	        }else{
	        	swal("Oops!", "Failed to send your message!", "error");
	        }
		}


		var __validateMessage = function(data){
			
			var submit = true;
			$('.Error').html("");//clear error message
    	    $('.form-group').removeClass("ErrorField");//clear error message


	        if($.xcript.validateInputs(data.Name) == false){
              $('.ParentName').addClass("ErrorField");   
              $('.ErrorName').html("Required");  
              submit = false; 
	        }

	        if($.xcript.validateInputs(data.Email) == false){
              $('.ParentEmail').addClass("ErrorField");   
              $('.ErrorEmail').html("Required");  
              submit = false; 
	        
	        }else{
	        	//validate email
               	var Email = $.xcript.validateEmail(data.Email);
               	if(Email == false){
                	$('.ParentEmail').addClass("ErrorField");   
                  	$('.ErrorEmail').html("Invalid Email");  
                 	submit = false; 
               	}
	        }

	        if($.xcript.validateInputs(data.Message) == false){
              $('.ParentMessage').addClass("ErrorField");   
              $('.ErrorMessage').html("Required");  
              submit = false; 
	        }

	        //validate recaptcha
	        var response = grecaptcha.getResponse();
	        if(response.length == 0){
              submit = false;
              console.log("false");
              $('.ErrorRecaptcha').html("This captcha is required.");

	        }


			if(submit){
				return true;
			}

			return false;
		};

	};

	return {
		attachedEvents : __attachedEvents
	};
}());