/*! This is script is for global event v1.0 | 
 * Author: Reygie Florida Tarroquin
 * Date  : 04/02/18
 */
$( document ).ready(function() {
   	$ = (typeof $) !== 'undefined' ? $ : {};
	$.global = (function() {

	var __library = function(){

		let base_url = 'http://34.217.45.230/reygie/iconnect';
		//let base_url = window.location.origin;

		//add active class when page load;		
		let url = window.location.pathname.split( '/' );
		$('.NavItem').removeClass('active');
		$('.loader').addClass('hidden');

		if(url[1] == 'mymobile'){
			$('.myMobile').addClass('active');
		}else if(url[1] == 'mylte'){
			$('.myLTE').addClass('active');
		}else if(url[1] == 'contacts'){
			$('.connectWithUs').addClass('active');
		}

		//attached events on buttons;
		// $('#goToHomePage').on('click',function(){
		// 	console.log("go to home page");
		// 	window.location.href = activeUrl+'/';
		// });
		
		// $('#goToEventsPage').on('click',function(){
		// 	console.log("go to events page");
		// 	window.location.href = activeUrl+'/events';
		// });

		// $('#goToContactsPage').on('click',function(){
		// 	console.log("go to contacts page");
		// 	//todo
		// 	window.location.href = activeUrl+'/contacts';
		// });

		// $('#buyLoad').on('click',function(){
		// 	window.location.href = activeUrl+'/reload';
		// });

		// $('#goToMobileAcount').on('click',function(){
		// 	console.log("go to mobile account login page");
		// 	window.location.href = activeUrl+'/mymobile';
		// });

		// $('#goToLTEAccount').on('click',function(){
		// 	console.log("go to LTE Account login page page");
		// 	window.location.href = activeUrl+'/mylte';
		// });

		//attached event for show dropdown on nav
		$('.dropdown-toggle').on('mouseenter click',function(){
			$('.show .dropdown-menu').removeClass('show');
			$('.dropdown').removeClass('show');
			$(this).parent().addClass('show');
			var parentElement = $(this).parent();
			$('.show .dropdown-menu').addClass('show');
		});

		$('body').on('click',function(){
			$('.show .dropdown-menu').removeClass('show');
			$(this).parent().removeClass('show');
		})

		// $('.dropdown-toggle').on('mouseout click',function(){
		// 	// console.log();
		// 	$('.show .dropdown-menu').removeClass('show');
		// 	$(this).parent().removeClass('show');
			
		// });

		$('.navCollapseBtn').on('click',function(){
			$('.sideNav').removeClass('d-none');
			$('.navCollapseBtn').hide();
			$('.sideNav').animate({
			    width: "300px"

			}, 200, 'linear',function(){
				$('.sideNav li').css('display','block');
				$('.backdrop').css('width','100%');
			});
		});

		$('.SideNavCommandDiv .fa-times').on('click',function(){
			__hideSideNav();
		});

		$('.backdrop').on('click',function(){
			__hideSideNav();
		});
		

		var __hideSideNav = function(){

			console.log("Hide side nav");
			$('.navCollapseBtn').show();
			$('.sideNav li').css('display','none');
			$('.sideNav').animate({
			    width: "0px"

			}, 200, 'linear',function(){
				$('.sideNav').addClass('d-none');
				$('.backdrop').css('width','0px');
			});
		};

		

  	};

  	return {
			library : __library
		};
	}());
});