/*! This is script is for iconnectguam home page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.home = (typeof $.iconnectguam.home !== 'undefined') ? $.iconnectguam.home : {};

$.iconnectguam.contacts = (function() {

	var __attachedEvents = function(){

		console.log("attached events on contact page");

		$('#sendMsg').on('click',function(){

			var data = {
				Name: $('#Name').val(),
				Email: $('#Email').val(),
				Message: $('#Message').val(),
			}

			console.log(data);
			if(__validateMessage(data)){
				console.log("ok");

				$.service.executePost('api/saveMessage',data).done(function (result) {
                    if(result.status =="SUCCESS"){
                        
                    	//show swal alert
                    	swal("Great!", "Your message has been sent!", "success");
                    	//clean up	
                    	$('#Name').val("");
                    	$('#Email').val("");
                    	$('#Message').val("");

                    }else{
                        console.log("Failed to send message");
                    	swal("Oops!", "Failed to send your message!", "error");
                    }
              	});//prepaidPayment

			}else{
				console.log("Failed on validation");
			}

		});


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