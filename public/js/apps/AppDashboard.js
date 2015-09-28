var AppDashboard = {
	node: document.createElement('div'),
	id: 'AppDashboard',
	//EasyUI options
	options: {
		iconCls: 'fa fa-dashboard',
		href: System.url + 'dashboard/dash',
		bodyCls: 'dashboard-app',
		fit: true,
		border: false,
		noheader: true,
		queryParams: [],
		onLoad: function(){}
	},

	//Load the application in the respective node
	render: function(options){
		var _options = $.extend(AppDashboard.options, options);
		_options.id = AppDashboard.id;

		$(AppDashboard.node).panel(_options);

		return AppDashboard;
	},

	empty: function(){
		return $(AppDashboard.node).html().trim() == '';
	},

	show: function(){
		$(AppDashboard.node).show();
	}
};

var SideBar = {
	selector: null,
	map: function(){
		$('div.app-item').bind('click', SideBar.load);
		SideBar.selector = $('#dashboard-sidebar');
	},

	//Event handler
	load: function(e){
		e.preventDefault();
		var options = $.parser.parseOptions(this);
		if(options.app){
			SideBar.loadApp(options.app, e.ctrlKey);
			return options.app;
		}

		throw new Error("no app defined");
	},

	loadApp: function(app, reload){
		Dashboard.select(app, reload);
	}
};

var Dashboard = {
	node: null,
	apps: [],

	map: function(){
		Dashboard.node = document.getElementById('dashboard-apps');
	},

	hideEverything: function(){
		$.each(Dashboard.apps, function(index, app){
			app.node && $(app.node).hide();
		});
	},

	findOrAdd: function(app){
		if(app.id == false) throw new Error("the app doesn't have an id");

		var exist = false;
		$.each(Dashboard.apps, function(index, _app){
			(app.id === _app.id) && (exist = true);
		});

		if(!exist){
			Dashboard.apps.push(app);
			$(Dashboard.node).append(app.node);
		}

		return app;
	},

	select: function(app, reload){
		Dashboard.hideEverything();
		Dashboard.findOrAdd(app);

		(app.empty() || reload) && app.render();
		app.show();
	}
};

$(document).ready(function(){
	SideBar.map();
	Dashboard.map();
});