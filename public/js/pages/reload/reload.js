/*! This is script is for iconnectguam home page | 
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

		//get available cards
		$.service.executeGet('api/getAvailableCard').done(function (result) {
           	
           	console.log(result);

           	$('#selectReloadCard').empty();//clear drop down
           	$('#selectReloadCard').append("<option value='0'>Please select a Reload Card</option>");

           	if(result.status == "SUCCESS"){

           		$.each(result.data,function(index,val){

           			//append data
           			if(index == 'prepaid_5' && val == 1){
           				$('#selectReloadCard').append('<option value="'+index+'">$5.00 iConnect Advanced Prepaid Reload Card</option>');
           			}else if(index == 'prepaid_10' && val == 1){
           				$('#selectReloadCard').append('<option value="'+index+'">$10.00 iConnect Advanced Prepaid Reload Card</option>');
           			}else if(index == 'Lte_3_days' && val == 1){
           				$('#selectReloadCard').append('<option value="'+index+'">$10.00 3-Day iConnect 4G LTE Reload Card</option>');
           			}
           		});

           		$('#selectReloadCard').on('change',function(){
       				console.log($(this).val());
       			});

           	}else{
           		console.log(result.message);
           	}

        });//api/getAvailableCard

        $('#submitReload').on('click',function(){

        	//check if has a selected value and checkbox is active
        	if(__validateReload()){
        		//store data in cookie then process to payment
        		$.cookie("selectedCard", $('#selectReloadCard').val(), { expires : 1 });
        		
        		//console.log($.cookie('selectedCard'));
        		window.location.href = '/reloadpayment';//page redirect

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