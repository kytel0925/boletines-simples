<div>
    <table id="datagrid-mailings-{{$uuid}}" class="easyui-datagrid" title="Mails"
           data-options="singleSelect:true,collapsible:true,url:'{{asset('mailings/list')}}',method:'post',
                pagination:true,fill:true,fitColumns:true,
                toolbar:[{
                    text:'Add',
                    iconCls:'icon-add',
                    handler:AppMailings.add
                },{
                    text:'Edit',
                    iconCls:'icon-edit',
                    handler:AppMailings.edit
                },{
                    text:'Delete',
                    iconCls:'icon-remove',
                    handler:AppMailings.delete
                },'-',{
                    text:'Search',
                    iconCls:'icon-search',
                    handler:AppMailings.search
                }]
    ">
        <thead>
        <tr>
            <th data-options="field:'code',width:40">Code</th>
            <th data-options="field:'subject',width:40">Subject</th>
            <th data-options="field:'created_at',width:20,align:'right'">Created At</th>
            <th data-options="field:'status',width:20,align:'center'">Status</th>
        </tr>
        </thead>
    </table>
</div>

<div id="mailing-dialog-{{$uuid}}" class="easyui-dialog" style="width:90%;height:80%;max-width:1000px;"
     data-options="modal:true,draggable:false,resizable:false,title:'Mailings edition',iconCls:'fa fa-envelope',closed:true,
         toolbar:[{
            text:'Save',
                iconCls:'icon-save',
                handler:AppMailings.save
            },{
            text:'Cancel',
                iconCls:'icon-cancel',
                handler:AppMailings.closeEdition
            }
         ]
     ">
    <div class="easyui-tabs" data-options="fit:true">
        <div title="Basic data" style="padding:10px">
            <form id="mailing-form" method="post">
                <input type="hidden" name="id" value="">
                <table cellpadding="5">
                    <tr>
                        <th>Subject:</th>
                        <td><input class="easyui-textbox" type="text" name="subject" data-options="required:true,width:200" /></td>
                    </tr>
                    <tr>
                        <th>From:</th>
                        <td><input class="easyui-textbox" type="text" name="from_name" data-options="required:true,width:200" /></td>
                    </tr>
                    <tr>
                        <th>Mail:</th>
                        <td><input class="easyui-textbox" type="text" name="from_mail" data-options="required:true,width:200,validType:'email'" /></td>
                    </tr>
                    <tr>
                        <th>Created by:</th>
                        <td><input readonly disabled class="easyui-textbox" type="text" name="created_by" data-options="required:true,width:200" value="{{Auth::user()->name}}" /></td>
                    </tr>
                    <tr>
                        <th>Created at:</th>
                        <td><input readonly disabled class="easyui-textbox" type="text" name="created_at" data-options="required:true,width:200" value="{{\Carbon\Carbon::now()}}" /></td>
                    </tr>
                </table>
                <textarea name="body" style="display: none"></textarea>
            </form>
        </div>
        <div title="Content" style="padding:10px">
            <textarea id="mailing-html-{{$uuid}}" name="body"></textarea>
        </div>
    </div>
</div>
<script type="text/javascript">
    AppMailings.uuid = '{{$uuid}}';
</script>