/*! This is script is for iconnectguam home page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.home = (typeof $.iconnectguam.home !== 'undefined') ? $.iconnectguam.home : {};

$.iconnectguam.home = (function() {

	var __attachedEvents = function(){

		console.log("attached events on home page");

	};

	return {
		attachedEvents : __attachedEvents
	};
}());