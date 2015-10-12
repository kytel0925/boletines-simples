<div>
    <table id="datagrid-senders-{{$uuid}}" class="easyui-datagrid" title="Senders"
           data-options="singleSelect:true,collapsible:true,url:'{{asset('senders/list')}}',method:'post',
                pagination:true,fill:true,fitColumns:true,
                toolbar:[{
                    text:'Add',
                    iconCls:'icon-add',
                    handler:AppSenders.add
                },{
                    text:'Edit',
                    iconCls:'icon-edit',
                    handler:AppSenders.edit
                },{
                    text:'Delete',
                    iconCls:'icon-remove',
                    handler:AppSenders.delete
                },'-',{
                    text:'Search',
                    iconCls:'icon-search',
                    handler:AppSenders.search
                }]
    ">
        <thead>
        <tr>
            <th data-options="field:'id',width:10">Id</th>
            <th data-options="field:'alias',width:30">Alias</th>
            <th data-options="field:'username',width:30">User</th>
            <th data-options="field:'host',width:30">Host</th>
            <th data-options="field:'status',width:10,align:'center'">Status</th>
        </tr>
        </thead>
    </table>
</div>

<div id="senders-dialog-{{$uuid}}" class="easyui-dialog" style="width:50%;height:30%;max-width:400px;min-width: 400px; min-height: 250px;"
     data-options="modal:true,draggable:false,resizable:false,title:'Senders edition',iconCls:'fa fa-database',closed:true,
         toolbar:[{
            text:'Save',
                iconCls:'icon-save',
                handler:AppSenders.save
            },{
            text:'Cancel',
                iconCls:'icon-cancel',
                handler:AppSenders.closeEdition
            }
         ]
     ">
    <form id="senders-form" method="post">
        <input type="hidden" name="id" value="">
        <table cellpadding="5">
            <tr>
                <th>Alias:</th>
                <td><input class="easyui-textbox" type="text" name="alias" data-options="required:true,width:200" /></td>
            </tr>
            <tr>
                <th>User:</th>
                <td><input class="easyui-textbox" type="text" name="username" data-options="required:true,width:200" /></td>
            </tr>
            <tr>
                <th>Password:</th>
                <td><input class="easyui-textbox" type="text" name="password" data-options="required:true,width:200" /></td>
            </tr>
            <tr>
                <th>Host:</th>
                <td><input class="easyui-textbox" type="text" name="host" data-options="required:true,width:200" /></td>
            </tr>
            <tr>
                <th>Max per day:</th>
                <td><input class="easyui-textbox" type="text" name="maximum_per_day" data-options="required:true,width:200" /></td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    AppSenders.uuid = '{{$uuid}}';
</script>