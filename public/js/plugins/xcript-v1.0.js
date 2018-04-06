/*! xcript v1.1 | 
 * Author: Reygie Florida Tarroquin
 * Date  : 11/16/16
 */
$( document ).ready(function() {
   	$ = (typeof $) !== 'undefined' ? $ : {};
	$.xcript = (function() {

	var __library = function(){

		// === no spacing on first inputs === //
		$('input[type="text"]').keydown(function(e) {
	   		var x = $(this).val();
				
			if(x.length === 0){
	   			if (e.keyCode == 32){ // 32 is the ASCII value for a space
	              e.preventDefault();
	         	}
	   		}else{
	   			var y = x.substr(x.length - 1); // => "1"

	   			if(y == ' '){
		            if (e.keyCode == 32){ // 32 is the ASCII value for a space
		                e.preventDefault();
		            }
	      		}
	   		}
	       
		});

		//Text
		$('input[type="text"]').keydown(function(e) {
	   			var x = $(this).val();
	   			var y = x.substr(x.length - 1); // => "1"
	       if(y == ' '){
	          if (e.keyCode == 32){ // 32 is the ASCII value for a space
	                e.preventDefault();
	          }
	       }
		});

		//Text
		$('input[type="text"]').on('blur',function(e) {
			var data = $(this).val();
			var dataResult = '';
			var inputedData = data.replace(/\s\s+/g, ' ');
			var FirstChar = inputedData.charAt(0);

			if(FirstChar === ' '){
				dataResult = inputedData.substring(1);
			}else{
				dataResult = inputedData;
			}
		
			$(this).val(dataResult);
		});

		//Search
		$('input[type="search"]').keydown(function(e) {
			var x = $(this).val();
			var y = x.substr(x.length - 1); // => "1"
		   if(y == ' '){
		      if (e.keyCode == 32){ // 32 is the ASCII value for a space
		            e.preventDefault();
		      }
		   }
		});
		// === /no spacing on first inputs === //



		// === No spacing event === //
		$('.xSpacing').on('keypress',function(e) {
				
	      if (e.keyCode == 32){ // 32 is the ASCII value for a space
	            e.preventDefault();
	      }
		});

		$('.xSpacing').on('blur',function(e) {
			var data = $(this).val();
			$(this).val(data.replace(/\s/g, ''));
		});	
		// === /No spacing event === //


	    // ====== Bind Events ====== // 
	    $('.xCut').bind("cut",function(e) {
			e.preventDefault();
	 	});
		 
		$('.xCopy').bind("copy",function(e) {
			e.preventDefault();   
	 	});

		$('.xPaste').bind("paste",function(e) {
			e.preventDefault();
	 	});

		$('.BindAll').bind("cut copy paste",function(e) {
		     e.preventDefault();
		});
		// ====== /Bind Events ====== // 


	   // ====== Keypress Events ====== //

	   //Aplhabet (w/spacing)
	   $('.xAlpha').on('keypress',function(){
	   		var regex = new RegExp("^[a-zA-Z\u00f1\u00d1 ]*$");
		    var theEvent = event || window.event;
		    var key = theEvent.keyCode || theEvent.which;
		    if(key===8||key===9){return;}
		    key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		    if (!regex.test(key)) {
		       event.preventDefault();
		       return false;
		    }
	   });

	   //Aplhabet only (no Spacing)
	   $('.xStrictAlpha').on('keypress',function(){
	   		var regex = new RegExp("^[a-zA-Z\u00f1\u00d1]*$");
		    var theEvent = event || window.event;
		    var key = theEvent.keyCode || theEvent.which;
		    if(key===8||key===9){return;}
		    key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		    if (!regex.test(key)) {
		       event.preventDefault();
		       return false;
		    }
	   });

	    //Numeric Only (no spacing)
	   $('.xStrictNum').on('keypress',function(){
	   		var regex = new RegExp("^[0-9]*$");
		    var theEvent = event || window.event;
		    var key = theEvent.keyCode || theEvent.which;
		    if(key===8||key===9){return;}
		    key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		    if (!regex.test(key)) {
		       event.preventDefault();
		       return false;
		    }
	   });

	    //Aplhamumeric (w/spacing)
	   $('.xAlphaNum').on('keypress',function(){
	   		var regex = new RegExp("^[0-9a-zA-Z\u00f1\u00d1 ]*$");
		    var theEvent = event || window.event;
		    var key = theEvent.keyCode || theEvent.which;
		    if(key===8||key===9){return;}
		    key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		    if (!regex.test(key)) {
		       event.preventDefault();
		       return false;
		    }
	   });

	    //Aplhamumeric  (no Spacing)
	   $('.xStrictAlphaNum').on('keypress',function(){
	   		var regex = new RegExp("^[0-9a-zA-Z\u00f1\u00d1]*$");
		    var theEvent = event || window.event;
		    var key = theEvent.keyCode || theEvent.which;
		    if(key===8||key===9){return;}
		    key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
		    if (!regex.test(key)) {
		       event.preventDefault();
		       return false;
		    }
	   });

	    //Convert text to Capital letters
	    $('.xToCapital').on('keypress',function(event){
	   		$(this).val(function (_, val) {
				return val + String.fromCharCode(event.which).toUpperCase();
	  		});
	  		return false;
	    });

	    //Convert text to Capital letters
	    $('.xToLower').on('keypress',function(){
	   		$(this).val(function (_, val) {
				return val + String.fromCharCode(event.which).toLowerCase();
	  		});
	  		return false;
	  	});

	  	// ====== /Keypress Events ====== //

  	};


	 	//Inputs validations
	var __validateInputs = function(textField){
		
		if(textField == null || textField == "" || textField == " "){
			return false;
		}
		return true;
	};

	//__validateLength('first_name',data.first_name,2,25).status ? '' : submit = false;
	//  sample input on function
	var __validateLength = function(label,data,min,max){

        var valid = true;
        var msg = [];

        if(data == '' || data == null){
            valid = false;
            msg.push("Required");
        }

        if(data.length < min ){
            valid = false;
            msg.push("Minimum of "+ min +" char.");
        }

        if(data.length > max){
            valid = false;
            msg.push("Must not be greater than "+max+" char.");
        }

        if(valid){
            return  {
                        status : true,
                    };
        }

        __showFormError(label,msg[0]);

         return {   
                    status : false,
                    message : msg,
                };

    };//__validateLength


    //RFC 5322 EMAIL REGEX
	var __validateEmail = function(data){
	    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	    return re.test(data);
	};

	
	//credit card validation
	//https://gist.github.com/DiegoSalazar/4075533

	// takes the form field value and returns true on valid number
	var __validateCreditCard = function(data){
	  // accept only digits, dashes or spaces
		if (/[^0-9-\s]+/.test(data)) return false;

		// The Luhn Algorithm. It's so pretty.
		var nCheck = 0, nDigit = 0, bEven = false;
		data = data.replace(/\D/g, "");

		for (var n = data.length - 1; n >= 0; n--) {
			var cDigit = data.charAt(n),
				  nDigit = parseInt(cDigit, 10);

			if (bEven) {
				if ((nDigit *= 2) > 9) nDigit -= 9;
			}

			nCheck += nDigit;
			bEven = !bEven;
		}

		return (nCheck % 10) == 0;
	}


    var __showFormError = function(id,message){
		$('.Error-'+id).addClass('has-error');
		$('.ErrorMsg-'+id).html(message);
	};

	var __cleanFormError = function(){
    	$('.Error').removeClass('has-error');
    	$('.ErrorMsg').html("");
	};

	

  	return {
			library : __library,
			validateInputs : __validateInputs,
			validateEmail : __validateEmail,
			validateCreditCard : __validateCreditCard,
			validateLength : __validateLength,
			showFormError : __showFormError
		};
	}());
});