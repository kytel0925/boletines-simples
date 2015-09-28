/**
 * Created by telmo on 20/9/2015.
 */
var System = {
	url: null,

	ajaxDefaults: {
		onComplete: function(){},
		onSuccess: function(){},
		onFailure: function(){},
		onBusy: function(){},
		data: {}
	},

	get: function(resource, options){
		var options = $.extend(System.ajaxDefaults, options);
		var url = System.url + resource
		try{options.onBusy();} catch(ex){console.log('callbak error, onBusy'); console.log(ex);}
		$.get(url, options.data)
			.done(options.onSuccess)
			.fail(options.onFailure)
			.always(function(data, status){
				try{options.onBusy();} catch(ex){}
				options.onComplete(data, status);
			});
	}
}
