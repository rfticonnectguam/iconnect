/* 
 * This the main API js of icconnectguam
 *  Portal web services.
 */
$ = (typeof $ !== 'undefined') ? $ : {};
$.service = (typeof $.service !== 'undefined') ? $.service : {};

$.service = (function() {

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
	    });

	    var __executePost = function (path,data) {

	    	//$('.loader').removeClass('hidden');

			var dfd = $.Deferred();
			$.ajax({
			  type: "POST",
			  url: path,
	          data: data
			})
			.done(function(data){
				dfd.resolve(data);
				//$('.loader').addClass('hidden');
			})
			.fail(function(qXHR, textStatus, errorThrown){
				dfd.resolve({
	                status : 'ERROR',
	                message : qXHR
	            });
			}).always(function(data){

			});
			return dfd.promise();
		};

		var __executePostNoLoader = function (path,data) {

			var dfd = $.Deferred();
			$.ajax({
			  type: "POST",
			  url: path,
	          data: data
			})
			.done(function(data){
				dfd.resolve(data);
			})
			.fail(function(qXHR, textStatus, errorThrown){
				dfd.resolve({
	                status : 'ERROR',
	                message : qXHR
	            });
			}).always(function(data){

			});
			return dfd.promise();
		};

		var __executeGet = function (path) {

			//$('.loader').removeClass('hidden');

			var dfd = $.Deferred();
			$.get(path, function(data) {})
			.done(function(data){
				dfd.resolve(data);
				//$('.loader').addClass('hidden');
			})
			.fail(function(qXHR, textStatus, errorThrown){
				dfd.resolve({
	                status : 'ERROR',
	                message : errorThrown
	            });
			})
			.always(function(data){

			});
			return dfd.promise();
		};

		var __executeGetNoLoader = function (path) {

			var dfd = $.Deferred();
			$.get(path, function(data) {})
			.done(function(data){
				dfd.resolve(data);
			})
			.fail(function(qXHR, textStatus, errorThrown){
				dfd.resolve({
	                status : 'ERROR',
	                message : errorThrown
	            });
			})
			.always(function(data){

			});
			return dfd.promise();
		};


	return {
    	executePost : __executePost,
    	executePostNoLoader : __executePostNoLoader,
    	executeGet : __executeGet,
    	executeGetNoLoader : __executeGetNoLoader,
    };
}());