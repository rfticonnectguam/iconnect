/*! This is script is for iconnectguam mylte login page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.mylte = (typeof $.iconnectguam.mylte !== 'undefined') ? $.iconnectguam.mylte : {};
$.iconnectguam.mylte.login = (typeof $.iconnectguam.mylte.login !== 'undefined') ? $.iconnectguam.mylte.login : {};

$.iconnectguam.mylte.login = (function() {

	var __attachedEvents = function(){

		console.log("attached events on my mobile login page");

	};

	return {
		attachedEvents : __attachedEvents
	};
}());