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

      //let base_url = 'http://34.217.45.230/reygie/iconnect';
      let base_url = window.location.origin;

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
         window.location.href = base_url+'/reload';//go to reload page
      }else{
        
        //check if has available card
          $.service.executeGet('api/getAvailableCard').done(function (result) {
              
              if(result.status == "SUCCESS"){
                  
                  $.each(result.data,function(index,val){
                      
                      if(index == $.cookie('selectedCard')){
                          if(val != 1){
                              window.location.href = base_url+'/reload';//go to reload page
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

          //get all list of countries
          $.service.executeGet('api/getAllCountries').done(function (result) {

              if(result.status == "SUCCESS"){
                  //clean up
                  $('#Country').empty();
                  $.each(result.data,function(i,val){
                      $('#Country').append(" <option value="+val.value+" selected>"+val.name+"</option>");
                  });
                  $('#Country').append(" <option value='0' selected>--Select Country--</option>");
              }else{
                  console.log("failed to get list of countries");
              }
          });

      }//end of if and else

      var __showError = function(field,msg){
         $('.Parent'+field).addClass("ErrorField");   
         $('.Error'+field).html(msg);  
      };

      //check if has an error
      if(status == "FAILED"){
        //show errors
        console.log("Failed on backend validation");
        console.log(data);

        typeof(data.data.Email) !== "undefined" ? __showError("Email",data.data.Email[0]) : "";
        typeof(data.data.First_name) !== "undefined" ? __showError("First_name",data.data.First_name[0]) : "";
        typeof(data.data.Last_name) !== "undefined" ? __showError("Last_name",data.data.Last_name[0]) : "";
        typeof(data.data.CCNumber) !== "undefined" ? __showError("CCNumber",data.data.CCNumber[0]) : "";
        typeof(data.data.CVV) !== "undefined" ? __showError("CVV",data.data.CVV[0]) : "";
        typeof(data.data.Address) !== "undefined" ? __showError("Address",data.data.Address[0]) : "";
        typeof(data.data.City) !== "undefined" ? __showError("City",data.data.City[0]) : "";
        typeof(data.data.State) !== "undefined" ? __showError("State",data.data.State[0]) : "";
        typeof(data.data.ZipCode) !== "undefined" ? __showError("ZipCode",data.data.ZipCode[0]) : "";
        typeof(data.data.Country) !== "undefined" ? __showError("Country",data.data.Country[0]) : "";
        typeof(data.data.Expiry_date) !== "undefined" ? __showError("Expiry_date",data.data.Expiry_date[0]) : "";

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
          
          First_name.status == false ? (__showError('First_name',"Required"), submit=false) : "";
          Last_name.status == false ? (__showError('Last_name',"Required"), submit=false) : "";
              
       
          var CCNumber = $.xcript.validateInputs(data.CCNumber);
          if(CCNumber == false){
              __showError('CCNumber',"Required")
              submit = false; 
          }else{

              if($.xcript.validateCreditCard(data.CCNumber) == false){
                  __showError('CCNumber',"Invalid Credit Card Number")
                  submit = false; 
              }
          }

          var CVV = $.xcript.validateInputs(data.CVV);
          CVV == false ? (__showError('CVV',"Required"), submit=false) : "";

          Address.status == false ? (__showError('Address',"Required"), submit=false) : "";
          City.status == false ? (__showError('City',"Required"), submit=false) : "";

          var State = $.xcript.validateInputs(data.State);
          State == false ? (__showError('State',"Required"), submit=false) : "";
              
          var ZipCode = $.xcript.validateInputs(data.ZipCode);
          ZipCode == false ? (__showError('ZipCode',"Required"), submit=false) : "";
              

          var Country = $.xcript.validateInputs(data.Country);
          Country == false ? (__showError('Country',"Required"), submit=false) : "";
              
          var Expiry_date = $.xcript.validateInputs(data.Expiry_date);
          Expiry_date == false ? (__showError('Expiry_date',"Required"), submit=false) : "";
              
          //validate email
          var Email = $.xcript.validateInputs(data.Email);
          if(Email ==  false){
               __showError('Email',"Required");
               submit = false; 
          }else{
             //validate email
               var Email = $.xcript.validateEmail(data.Email);
               if(Email == false){
                  __showError('Email',"Invalid Email");
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
              submit = false;
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