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
      
      

	};

	return {
		attachedEvents : __attachedEvents
	};
}());