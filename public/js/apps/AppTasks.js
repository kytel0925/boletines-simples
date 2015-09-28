/**
 * Created by telmo on 20/9/2015.
 */
var AppTasks = {
	node: document.createElement('div'),
	id: 'AppTasks',
	//EasyUI options
	options: {
		iconCls: 'fa fa-dashboard',
		href: System.url + 'tasks/',
		bodyCls: 'dashboard-app',
		fit: true,
		border: false,
		noheader: true,
		queryParams: [],
		onLoad: function(){}
	},

	//Load the application in the respective node
	render: function(options){
		var _options = $.extend(AppTasks.options, options);
		_options.id = AppTasks.id;
		console.log('Opciones de la aplicacion');
		console.log(_options);

		$(AppTasks.node).panel(_options);

		return AppTasks;
	},

	empty: function(){
		return $(AppTasks.node).html().trim() == '';
	},

	show: function(){
		$(AppTasks.node).show();
	}
};