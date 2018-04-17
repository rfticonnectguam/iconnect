/*! This is script is for iconnectguam reload success payment page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.success = (typeof $.iconnectguam.success !== 'undefined') ? $.iconnectguam.success : {};
$.iconnectguam.success.payment = (typeof $.iconnectguam.success.payment !== 'undefined') ? $.iconnectguam.success.payment : {};

$.iconnectguam.success.payment = (function() {

	var __attachedEvents = function(){

      let base_url = 'http://34.217.45.230/reygie/iconnect/';
      
  		console.log("attached events on success payment page");

      if(status =="SUCCESS"){
          console.log(data);
          var pin = data[0].pin;
          var serial = data[0].serial_number;

          //var base_url = window.location.origin ;
          $('#generateCard').attr("src",base_url+"/api/successpayment/"+pin+"/"+serial);

          $('#pin').html(pin);
          $('#serial').html(serial);

      }else{
        window.location.href = base_url+'/reload';//go to reload page
      }

	};

	return {
		attachedEvents : __attachedEvents
	};
}());