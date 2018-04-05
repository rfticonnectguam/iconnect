/*! This is script is for iconnectguam reload page
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.iconnectguam = (typeof $.iconnectguam !== 'undefined') ? $.iconnectguam : {};
$.iconnectguam.reload = (typeof $.iconnectguam.reload !== 'undefined') ? $.iconnectguam.reload : {};

$.iconnectguam.reload = (function() {

	var __attachedEvents = function(){

	   	//remove existing cookie
	    $.removeCookie("selectedCard");

		  console.log("attached events on reload page");

      $('.ErrorselectReloadCard').html(""); // remove existing dom data

      $('#selectReloadCard').on('change',function(){

         if($(this).val() != 0){
            //check if available
             $.service.executeGet('api/getAvailableCard').done(function (result) {
                  
                if(result.status == "SUCCESS"){

                  $.each(result.data,function(index,val){

                      if($('#selectReloadCard').val() == index){

                          if(val == 1){
                              console.log("available");
                              $('.ErrorselectReloadCard').html("");
                          }else{
                             $('.ErrorselectReloadCard').html("This is not available. Please select other service");
                          }   
                      }
                  });

                   //show card type message 
                   if($('#selectReloadCard').val() == 'prepaid_5' || $('#selectReloadCard').val() == 'prepaid_10'  ){
                      //show prepaid message
                      $('#PrepaidDropMessage').removeClass('hidden');
                      $('#LteDropMessage').addClass('hidden');
                   }else if($('#selectReloadCard').val() == 'Lte_3_days' ){
                      //show lte message
                      $('#LteDropMessage').removeClass('hidden');
                      $('#PrepaidDropMessage').addClass('hidden');

                   }

                }else{
                  //show error message
                  console.log("Failed to get available card");
                }//

             });//getAvailableCard

         }else{
            //show error message
            $('.ErrorselectReloadCard').html("Please select an option.");
         }

      });//end of onchage selectReloadCard


      $('#submitReload').on('click',function(){

      	//check if has a selected value and checkbox is active
      	if(__validateReload()){
          
            //check if available
            $.service.executeGet('api/getAvailableCard').done(function (result) {
                if(result.status == "SUCCESS"){

                    $.each(result.data,function(index,val){

                        if($('#selectReloadCard').val() == index){

                            if(val == 1){

                                //store data in cookie then process to payment
                                $.cookie("selectedCard", $('#selectReloadCard').val(), { expires : 1 });
                                //store select
                                $.cookie("selectedCard", $('#selectReloadCard').val(), { expires : 1 });
                                
                                //console.log($.cookie('selectedCard'));
                                window.location.href = '/reloadpayment';//page redirect

                            }else{
                               $('.ErrorselectReloadCard').html("This is not available. Please select other service");
                            }   
                        }
                    });

                }else{
                  //show error message
                  console.log("Failed to get available card");
                }   
            });

      	}else{
      		console.log("failed on validation");
      	}

      });


      var __validateReload = function(){

      	var submit = true;
      	$('.Error').html("");//clear error message

      	if($('#selectReloadCard').val() == 0){
      		$('.ErrorselectReloadCard').html("Please select an option.");
      		submit = false;
      	}

      	if($('#reloadChkBox').is(":checked") == false){
      		$('.ErrorreloadChkBox').html("Please check this bo if you want to proceed.");
      		submit = false;
      	}

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