/*! This is script is for iconnectguam home page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.events = (typeof $.iconnectguam.events !== 'undefined') ? $.iconnectguam.events : {};

$.iconnectguam.events = (function() {

	var __attachedEvents = function(){

		console.log("attached events on events page");

	};

	return {
		attachedEvents : __attachedEvents
	};
}());