/**
 * Created by telmo on 20/9/2015.
 */
var AppSubscribersLists = {
	node: document.createElement('div'),
	id: 'AppSubscribersLists',
	//EasyUI options
	options: {
		iconCls: 'fa fa-dashboard',
		href: System.url + 'subscribers-lists/',
		bodyCls: 'dashboard-app',
		fit: true,
		border: false,
		noheader: true,
		queryParams: [],
		onLoad: function(){}
	},

	//Load the application in the respective node
	render: function(options){
		var _options = $.extend(AppSubscribersLists.options, options);
		_options.id = AppSubscribersLists.id;
		console.log('Opciones de la aplicacion');
		console.log(_options);

		$(AppSubscribersLists.node).panel(_options);

		return AppSubscribersLists;
	},

	empty: function(){
		return $(AppSubscribersLists.node).html().trim() == '';
	},

	show: function(){
		$(AppSubscribersLists.node).show();
	}
};