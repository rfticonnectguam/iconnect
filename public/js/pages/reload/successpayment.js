/*! This is script is for iconnectguam home page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.success = (typeof $.iconnectguam.success !== 'undefined') ? $.iconnectguam.success : {};
$.iconnectguam.success.payment = (typeof $.iconnectguam.success.payment !== 'undefined') ? $.iconnectguam.success.payment : {};

$.iconnectguam.success.payment = (function() {

	var __attachedEvents = function(){

  		console.log("attached events on success payment page");

      console.log();
      //check if cookie exist
       if(typeof($.cookie('pin')) !== "undefined" && 
            typeof($.cookie('serial')) !== "undefined" &&
              $.cookie('pin') != '' && 
              $.cookie('pin') != null &&
              $.cookie('serial') != '' && 
              $.cookie('serial') != null){
              
              $pin = $.cookie('pin');
              $serial = $.cookie('serial');

              $('#pin').html($pin);
              $('#serial').html($serial);

      
      }else{
         console.log("not set");
         window.location.href ='/reload';//go to reload page
      }
      

	};

	return {
		attachedEvents : __attachedEvents
	};
}());