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
       if(typeof($.cookie('iConnectGuam') !== "undefined")){
          
        //validate cookie
        if($.cookie('iConnectGuam') != '' && $.cookie('iConnectGuam') != null){
              var data = {
                token : $.cookie('iConnectGuam'),
              }

              $.service.executePost('api/generateToken',data).done(function (result) {
                if(result.status == "SUCCESS"){
                    console.log("ok");
                    //page redirect with cookie
                }else{
                   console.log("not set");
                   window.location.href ='/reload';//go to reload page
                }
           });//prepaidPayment
        }else{
          console.log("not set");
          window.location.href ='/reload';//go to reload page
        }
      
      }else{
         console.log("not set");
         window.location.href ='/reload';//go to reload page
      }
      

	};

	return {
		attachedEvents : __attachedEvents
	};
}());