/**
 * Created by telmo on 20/9/2015.
 */
var AppSubscribers = {
	node: document.createElement('div'),
	id: 'AppSubscribers',
	url: System.url + 'subscribers/',
	uuid: null,
	//EasyUI options
	options: {
		iconCls: 'fa fa-dashboard',
		href: System.url + 'subscribers/index',
		bodyCls: 'dashboard-app',
		fit: true,
		border: false,
		noheader: true,
		queryParams: [],
		onLoad: function(){}
	},

	//Load the application in the respective node
	render: function(options){
		var _options = $.extend(AppSubscribers.options, options);
		_options.id = AppSubscribers.id;

		$(AppSubscribers.node).panel(_options);

		return AppSubscribers;
	},

	empty: function(){
		return $(AppSubscribers.node).html().trim() == '';
	},

	show: function(){
		$(AppSubscribers.node).show();
	},

	Grid:{
		getId: function(){
			return 'datagrid-subscribers-' + AppSubscribers.uuid;
		},

		get: function(){
			return $('#' + AppSubscribers.Grid.getId());
		},

		reload: function(){
			AppSubscribers.Grid.get().datagrid('reload');
		},

		Dialog: {
			getId: function(){
				return 'subscribers-dialog-' + AppSubscribers.uuid;
			},

			get: function(){
				return $('#' + AppSubscribers.Grid.Dialog.getId());
			},

			open: function(){
				AppSubscribers.Grid.Dialog.get().dialog('open').dialog('center');

				return AppSubscribers.Grid.Dialog.get();
			},

			close: function(e){
				e.preventDefault();
				AppSubscribers.Grid.Dialog.get().dialog('close');
			},

			form: {
				get: function(){
					return $('#' + AppSubscribers.Grid.Dialog.getId() + ' form')[0];
				}
			},

			reset: function(){
				var form = AppSubscribers.Grid.Dialog.form.get();
				$(form).form('reset');
				form['id'].value = '';

				return $(form);
			},

			setData: function(row){
				if(row){
					var form = AppSubscribers.Grid.Dialog.form.get();
					$(form).form('reset');
					$(form).form('load', row);
				}

				return $(form);
			}
		}
	},

	add: function(){
		AppSubscribers.Grid.Dialog.reset();
		AppSubscribers.Grid.Dialog.open();
	},

	edit: function(){
		if(row = AppSubscribers.Grid.get().datagrid('getSelected')){
			AppSubscribers.Grid.Dialog.reset();
			AppSubscribers.Grid.Dialog.setData(row);

			AppSubscribers.Grid.Dialog.open();
		}
	},

	save: function(e){
		var dialog_id = '#' + AppSubscribers.Grid.Dialog.getId();

		var form = $(dialog_id + ' form')[0];
		var url = AppSubscribers.url + 'create';
		if(form['id'].value > 0){
			url = AppSubscribers.url + 'save/' + form['id'].value;
		}

		if($(form).form('validate')){
			$.post(url, $(form).serialize())
				.done(function(data){
					AppSubscribers.Grid.Dialog.close(e);
					AppSubscribers.Grid.reload();
				})
				.fail(function(data){
					$.messager.show({
						title: 'Error',
						msg: 'Something happend please retry latter'
					});
				})
				.always(function(data){

				});
		}
	}
};