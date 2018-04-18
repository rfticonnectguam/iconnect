/*! This is script is for iconnectguam mymobile login page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.mymobile = (typeof $.iconnectguam.mymobile !== 'undefined') ? $.iconnectguam.mymobile : {};
$.iconnectguam.mymobile.login = (typeof $.iconnectguam.mymobile.login !== 'undefined') ? $.iconnectguam.mymobile.login : {};

$.iconnectguam.mymobile.login = (function() {

	var __attachedEvents = function(){

		console.log("attached events on my mobile login page");

		$('#loginToMyMobile').on('click',function(){
			var data = {
				email : $('#email').val(),
				password : $('#password').val(),
			}

			if(__validateLogin(data)){
				console.log('send data to API');
				console.log(data);
			}else{
				console.log("failed on validation");
			}


		});

		var __validateLogin = function(data){
				
				return true;			
		};

	};

	return {
		attachedEvents : __attachedEvents
	};
}());