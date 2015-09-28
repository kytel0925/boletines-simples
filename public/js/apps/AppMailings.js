/**
 * Created by telmo on 20/9/2015.
 */
var AppMailings = {
	node: document.createElement('div'),
	id: 'AppMailings',
	url: System.url + 'mailings/',
	uuid: null,
	//EasyUI options
	options: {
		iconCls: 'fa fa-dashboard',
		href: System.url + 'mailings/index',
		bodyCls: 'dashboard-app',
		fit: true,
		border: false,
		noheader: true,
		queryParams: [],
		onLoad: function(){}
	},

	//Load the application in the respective node
	render: function(options){
		var _options = $.extend(AppMailings.options, options);
		_options.id = AppMailings.id;

		$(AppMailings.node).panel(_options);

		return AppMailings;
	},

	empty: function(){
		return $(AppMailings.node).html().trim() == '';
	},

	show: function(){
		$(AppMailings.node).show();
	},

	getGrid: function(){
		return $('#datagrid-mailings-' + AppMailings.uuid);
	},

	add: function(){
		var dialog_id = '#mailing-dialog-' + AppMailings.uuid;
		$(dialog_id).dialog('open').dialog('center');

		var form = $(dialog_id + ' form')[0];
		$(form).form('reset');
		form['id'].value = '';

		var textareas = $(dialog_id + ' textarea');
		textareas[0].value = '';
		textareas[1].value = '';
		AppMailings.setEditor(textareas[1]);
	},

	edit: function(){
		if(row = AppMailings.getGrid().datagrid('getSelected')){
			var dialog_id = '#mailing-dialog-' + AppMailings.uuid;
			$(dialog_id).dialog('open').dialog('center');

			var form = $(dialog_id + ' form')[0];
			$(form).form('reset');
			$(form).form('load', row);

			var textareas = $(dialog_id + ' textarea');
			textareas[1].value = textareas[0].value;
			AppMailings.setEditor(textareas[1]);
		}
	},

	save: function(e){
		var dialog_id = '#mailing-dialog-' + AppMailings.uuid;

		var form = $(dialog_id + ' form')[0];
		var url = AppMailings.url + 'create';
		if(form['id'].value > 0){
			url = AppMailings.url + 'save/' + form['id'].value;
		}

		var textareas = $(dialog_id + ' textarea');

		form['body'].value = tinymce.get(textareas[1].id).getContent();

		if($(form).form('validate')){
			$.post(url, $(form).serialize())
				.done(function(data){
					AppMailings.closeEdition(e);
					AppMailings.reloadGrid();
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
	},

	reloadGrid: function(){
		$('#datagrid-mailings-' + AppMailings.uuid).datagrid('reload');
	},

	closeEdition: function(e){
		e.preventDefault();
		var dialog_id = '#mailing-dialog-' + AppMailings.uuid;

		$(dialog_id).dialog('close');
	},

	setEditor: function(selector){
		if(!tinymce.get(selector.id)){
			tinymce.init({
				selector: '#' + selector.id,
				skin:'light',
				theme: "modern",
				height : "320",
				valid_children : "+body[style],p[strong|a|#text],hr[class|width|size|noshade],font[face|size|color|style],img[href|src|name|title|onclick|align|alt|title|width|height|vspace|hspace]",
				extended_valid_elements: 'style',
				menubar : false,
				toolbar_items_size: 'small',
				plugins: "image code fullscreen table link fullpage",
				table_grid: false,
				toolbar: [
					'undo redo cut copy paste tools format view insert edit preview searchreplace fontselect fontsizeselect view insert bold italic underline strikethrough', // media table image print
					'alignleft aligncenter alignright alignjustify  bullist numlist outdent indent blockquote removeformat subscript superscript link image print preview code table inserttable tableprops deletetable cell row column fullscreen textcolor backgroundcolor'
				]
			});
		}

		if(tinymce.get(selector.id)){
			tinymce.get(selector.id).setContent(selector.value);
		}
		else{
			setTimeout(function(){
				tinymce.get(selector.id).setContent(selector.value)
			}, 1000);
		}

		return true;
	}
};