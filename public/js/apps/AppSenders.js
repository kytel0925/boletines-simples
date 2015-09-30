/**
 * Created by telmo on 20/9/2015.
 */
var AppSenders = {
	node: document.createElement('div'),
	id: 'AppSenders',
	url: System.url + 'senders/',
	uuid: null,
	//EasyUI options
	options: {
		iconCls: 'fa fa-dashboard',
		href: System.url + 'senders/index',
		bodyCls: 'dashboard-app',
		fit: true,
		border: false,
		noheader: true,
		queryParams: [],
		onLoad: function(){}
	},

	//Load the application in the respective node
	render: function(options){
		var _options = $.extend(AppSenders.options, options);
		_options.id = AppSenders.id;

		$(AppSenders.node).panel(_options);

		return AppSenders;
	},

	empty: function(){
		return $(AppSenders.node).html().trim() == '';
	},

	show: function(){
		$(AppSenders.node).show();
	},

	Grid:{
		getId: function(){
			return 'datagrid-senders-' + AppSenders.uuid;
		},

		get: function(){
			return $('#' + AppSenders.Grid.getId());
		},

		reload: function(){
			AppSenders.Grid.get().datagrid('reload');
		},

		Dialog: {
			getId: function(){
				return 'senders-dialog-' + AppSenders.uuid;
			},

			get: function(){
				return $('#' + AppSenders.Grid.Dialog.getId());
			},

			open: function(){
				AppSenders.Grid.Dialog.get().dialog('open').dialog('center');

				return AppSenders.Grid.Dialog.get();
			},

			close: function(e){
				e.preventDefault();
				AppSenders.Grid.Dialog.get().dialog('close');
			},

			form: {
				get: function(){
					return $('#' + AppSenders.Grid.Dialog.getId() + ' form')[0];
				}
			},

			reset: function(){
				var form = AppSenders.Grid.Dialog.form.get();
				$(form).form('reset');
				form['id'].value = '';

				return $(form);
			},

			setData: function(row){
				if(row){
					var form = AppSenders.Grid.Dialog.form.get();
					$(form).form('reset');
					$(form).form('load', row);
				}

				return $(form);
			}
		}
	},

	add: function(){
		AppSenders.Grid.Dialog.reset();
		AppSenders.Grid.Dialog.open();
	},

	edit: function(){
		if(row = AppSenders.Grid.get().datagrid('getSelected')){
			AppSenders.Grid.Dialog.reset();
			AppSenders.Grid.Dialog.setData(row);

			AppSenders.Grid.Dialog.open();
		}
	},

	save: function(e){
		var dialog_id = '#' + AppSenders.Grid.Dialog.getId();

		var form = $(dialog_id + ' form')[0];
		var url = AppSenders.url + 'create';
		if(form['id'].value > 0){
			url = AppSenders.url + 'save/' + form['id'].value;
		}

		if($(form).form('validate')){
			$.post(url, $(form).serialize())
				.done(function(data){
					AppSenders.Grid.Dialog.close(e);
					AppSenders.Grid.reload();
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