/*! This is script is for iconnectguam home page | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.reload = (typeof $.iconnectguam.reload !== 'undefined') ? $.iconnectguam.reload : {};
$.iconnectguam.reload.payment = (typeof $.iconnectguam.reload.payment !== 'undefined') ? $.iconnectguam.reload.payment : {};

$.iconnectguam.reload.payment = (function() {

	var __attachedEvents = function(){

		console.log("attached events on reload page");

    // check if cookie is exist
    console.log($.cookie('selectedCard'));

    //store cards in array
    var validCard = ['prepaid_5','prepaid_10','Lte_3_days'];

    //check if cards is exist
    if(!validCard.includes($.cookie('selectedCard'))){
       window.location.href ='/reload';//go to reload page
    }else{

      //check if has available card
        $.service.executeGet('api/getAvailableCard').done(function (result) {
            console.log(result);
            
            if(result.status == "SUCCESS"){
                
                $.each(result.data,function(index,val){
                    
                    if(index == $.cookie('selectedCard')){
                        if(val != 1){
                            window.location.href ='/reload';//go to reload page
                        }
                    }

                });

            }else{
                console.log("failed on getting available card");
            }

        });//getAvailableCard


        //generate DOM data
        var selectedCartType = $.cookie('selectedCard');
        
        if(selectedCartType == 'prepaid_5' || selectedCartType == 'prepaid_10' ){

           $('#HeaderMsg').html("iConnect 4G LTE Reload Cards are only for LTE SIMs."+
                              " If you are subscribed to our Postpaid plans,"+
                              " there realod cards are not applicable for your SIM");
        
        }else if(selectedCartType == 'Lte_3_days'){

           $('#HeaderMsg').html("iConnect 4G LTE Reload Cards are only for LTE SIMs."+
                              " If you are subscribed to our Postpaid plans,"+
                              " there realod cards are not applicable for your SIM");
        }
       



    }//end of if and else



      var __validateReload = function(){

      	var submit = true;
      	$('.Error').html("");//clear error message


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