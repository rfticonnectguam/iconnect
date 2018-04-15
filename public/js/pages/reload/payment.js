/*! This is script is for iconnectguam reload payment page | 
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
      //clear data
      $('.form-control').val("");
      $("input:checkbox").prop("checked",false);

      //store cards in array
      var validCard = ['prepaid_5','prepaid_10','Lte_3_days'];

      //check if cards is exist
      if(!validCard.includes($.cookie('selectedCard'))){
         window.location.href ='/reload';//go to reload page
      }else{

        //check if has available card
          $.service.executeGet('api/getAvailableCard').done(function (result) {
              
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

          $('#Card_type').val(selectedCartType);

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


      //check if has an error
      if(status == "FAILED"){
        //show errors
        console.log("Failed on backend validation");
        console.log(data);
        //TODO MINIFIED
        if(typeof(data.data.Email) !== "undefined"){
          $('.ParentEmail').addClass("ErrorField");   
          $('.ErrorEmail').html(data.data.Email[0]);  
        }

        if(typeof(data.data.First_name) !== "undefined"){
          $('.ParentFirst_name').addClass("ErrorField");   
          $('.ErrorFirst_name').html(data.data.First_name[0]);  
        }

        if(typeof(data.data.Last_name) !== "undefined"){
          $('.ParentLast_name').addClass("ErrorField");   
          $('.ErrorLast_name').html(data.data.Last_name[0]);  
        }

        if(typeof(data.data.Last_name) !== "undefined"){
          $('.ParentLast_name').addClass("ErrorField");   
          $('.ErrorLast_name').html(data.data.Last_name[0]);  
        }

        if(typeof(data.data.CCNumber) !== "undefined"){
          $('.ParentCCNumber').addClass("ErrorField");   
          $('.ErrorCCNumber').html(data.data.CCNumber[0]);  
        }

        if(typeof(data.data.CVV) !== "undefined"){
          $('.ParentCVV').addClass("ErrorField");   
          $('.ErrorCvv').html(data.data.CVV[0]);  
        }

        if(typeof(data.data.Address) !== "undefined"){
          $('.ParentAddress').addClass("ErrorField");   
          $('.ErrorAddress').html(data.data.Address[0]);  
        }

        if(typeof(data.data.City) !== "undefined"){
          $('.ParentCity').addClass("ErrorField");   
          $('.ErrorCity').html(data.data.City[0]);  
        }

        if(typeof(data.data.State) !== "undefined"){
          $('.ParentState').addClass("ErrorField");   
          $('.ErrorState').html(data.data.State[0]);  
        }

        if(typeof(data.data.ZipCode) !== "undefined"){
          $('.ParentZipCode').addClass("ErrorField");   
          $('.ErrorZipCode').html(data.data.ZipCode[0]);  
        }

        if(typeof(data.data.Country) !== "undefined"){
          $('.ParentCountry').addClass("ErrorField");   
          $('.ErrorCountry').html(data.data.Country[0]);  
        }

        if(typeof(data.data.Expiry_date) !== "undefined"){
          $('.ParentExpiry_date').addClass("ErrorField");   
          $('.ErrorExpiry_date').html(data.data.Expiry_date[0]);  
        }
        
      }else if(status == "ERROR"){
        //show error logs
        console.log($data);
      }//end of if and else



      $('#Expiry_date').MonthPicker({ 
          Button: false,
          MinMonth: 0
      });

      $("#exp_date").MonthPicker('option', 'MonthFormat', 'mm/y');


      $('#submitPayment').on('click',function(e){

          e.preventDefault();

          var data = {
              Email : $('#Email').val(),
              First_name : $('#First_name').val(),
              Last_name : $('#Last_name').val(),
              CCNumber : $('#CCNumber').val(),
              CVV: $('#CVV').val(),
              Address: $('#Address').val(),
              City: $('#City').val(),
              State: $('#State').val(),
              ZipCode: $('#ZipCode').val(),
              Country: $('#Country').val(),
              Expiry_date: $('#Expiry_date').val(),
              Card_type: $.cookie('selectedCard'),
              captcha_response: grecaptcha.getResponse()
          }
         
          if(__validateSubmitPayment(data)){
              
              $('.loader').removeClass('hidden');
              $('#paymentForm').submit(); 

          }else{
            console.log("failed on validation");
          }

      });//submit payment trigger

      var __validateSubmitPayment = function(data){
          var submit = true;
          $('.Error').html("");//clear error message
          $('.form-group').removeClass("ErrorField");//clear error message

          var First_name = $.xcript.validateLength('',data.First_name,2,25);
          var Last_name = $.xcript.validateLength('',data.Last_name,2,25);

          var Address = $.xcript.validateLength('',data.Address,5,50);
          var City = $.xcript.validateLength('',data.City,2,25);
          
          if(First_name.status == false){
              $('.ParentFirst_name').addClass("ErrorField");   
              $('.ErrorFirst_name').html(First_name.message[0]);   
              submit = false;
          }

          if(Last_name.status == false){
              $('.ParentLast_name').addClass("ErrorField");   
              $('.ErrorLast_name').html(Last_name.message[0]); 
              submit = false;  
          }

          //TODO CREDIT CARD AND CCV

          var CCNumber = $.xcript.validateInputs(data.CCNumber);
          if(CCNumber == false){
              $('.ParentCCNumber').addClass("ErrorField");   
              $('.ErrorCCNumber').html("Required");  
              submit = false; 
          }else{

              if($.xcript.validateCreditCard(data.CCNumber) == false){
                  $('.ParentCCNumber').addClass("ErrorField");   
                  $('.ErrorCCNumber').html("Invalid Credit Card Number");  
                  submit = false; 
              }
          }

           var CVV = $.xcript.validateInputs(data.CVV);
          if(CVV == false){
              $('.ParentCVV').addClass("ErrorField");   
              $('.ErrorCVV').html("Required");  
              submit = false; 
          }

          if(Address.status == false){
              $('.ParentAddress').addClass("ErrorField");   
              $('.ErrorAddress').html(Address.message[0]);  
              submit = false; 
          }

           if(City.status == false){
              $('.ParentCity').addClass("ErrorField");   
              $('.ErrorCity').html(City.message[0]);  
              submit = false; 
          }


          var State = $.xcript.validateInputs(data.State);
          if(State == false){
              $('.ParentState').addClass("ErrorField");   
              $('.ErrorState').html("Required");  
              submit = false; 
          }

          var ZipCode = $.xcript.validateInputs(data.ZipCode);
          if(ZipCode == false){
              $('.ParentZipCode').addClass("ErrorField");   
              $('.ErrorZipCode').html("Required");  
              submit = false; 
          }

          var Country = $.xcript.validateInputs(data.Country);
          if(Country == false){
              $('.ParentCountry').addClass("ErrorField");   
              $('.ErrorCountry').html("Required");  
              submit = false; 
          }

          var Expiry_date = $.xcript.validateInputs(data.Expiry_date);
          if(Expiry_date == false){
              $('.ParentExpiry_date').addClass("ErrorField");   
              $('.ErrorExpiry_date').html("Required");  
              submit = false; 
          }

          //validate email
          var Email = $.xcript.validateInputs(data.Email);
          if(Email ==  false){
               $('.ParentEmail').addClass("ErrorField");   
               $('.ErrorEmail').html("Required");  
               submit = false; 
          }else{
             //validate email
               var Email = $.xcript.validateEmail(data.Email);
               if(Email == false){
                  $('.ParentEmail').addClass("ErrorField");   
                  $('.ErrorEmail').html("Invalid Email");  
                  submit = false; 
               }
          }

          //check checkbox
          if($('#AgreeOne').is(":checked") == false){
            $('.ErrorAgreeOne').html("Please check this box if you want to proceed.");
            submit = false;
          }

          if($('#AgreeTwo').is(":checked") == false){
            $('.ErrorAgreeTwo').html("Please check this box if you want to proceed.");
            submit = false;
              console.log("false");
          }

          //validate recaptcha
          var response = grecaptcha.getResponse();
          if(response.length == 0){
              //submit = false;
              console.log("false");
              $('.ErrorRecaptcha').html("This captcha is required.");

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