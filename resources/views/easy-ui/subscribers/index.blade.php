<div>
    <table id="datagrid-subscribers-{{$uuid}}" class="easyui-datagrid" title="Subscribers"
           data-options="singleSelect:true,collapsible:true,url:'{{asset('subscribers/list')}}',method:'post',
                pagination:true,fill:true,fitColumns:true,
                toolbar:[{
                    text:'Add',
                    iconCls:'icon-add',
                    handler:AppSubscribers.add
                },{
                    text:'Edit',
                    iconCls:'icon-edit',
                    handler:AppSubscribers.edit
                },{
                    text:'Delete',
                    iconCls:'icon-remove',
                    handler:AppSubscribers.delete
                },'-',{
                    text:'Search',
                    iconCls:'icon-search',
                    handler:AppSubscribers.search
                }]
    ">
        <thead>
        <tr>
            <th data-options="field:'id',width:10">Id</th>
            <th data-options="field:'name',width:30">Name</th>
            <th data-options="field:'email',width:30">Email</th>
            <th data-options="field:'lists',width:30,align:'center'">Lists</th>
            <th data-options="field:'status',width:10,align:'center'">Status</th>
        </tr>
        </thead>
    </table>
</div>

<div id="subscribers-dialog-{{$uuid}}" class="easyui-dialog" style="width:50%;height:30%;max-width:400px;min-width: 300px; min-height: 200px;"
     data-options="modal:true,draggable:false,resizable:false,title:'Subscribers edition',iconCls:'fa fa-database',closed:true,
         toolbar:[{
            text:'Save',
                iconCls:'icon-save',
                handler:AppSubscribers.save
            },{
            text:'Cancel',
                iconCls:'icon-cancel',
                handler:AppSubscribers.closeEdition
            }
         ]
     ">
    <form id="subscribers-form" method="post">
        <input type="hidden" name="id" value="">
        <table cellpadding="5">
            <tr>
                <th>Name:</th>
                <td><input class="easyui-textbox" type="text" name="name" data-options="required:true,width:200" /></td>
            </tr>
            <tr>
                <th>Email:</th>
                <td><input class="easyui-textbox" type="text" name="email" data-options="required:true,width:200,validType:'email'" /></td>
            </tr>
        </table>
    </form>
</div>
<script type="text/javascript">
    AppSubscribers.uuid = '{{$uuid}}';
</script>