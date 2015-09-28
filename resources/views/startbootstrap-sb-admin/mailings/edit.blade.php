<div id="page-wrapper">
    <div class="row">&nbsp;
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default" style="max-height: 250px">
                <div class="panel-heading">
                    <i class="fa fa-envelope fa-fw"></i> Correos
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Acciones
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a class="fa fa-plus fa-fw"> Agregar</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table class="easyui-datagrid" title="Mails" style="width:700px;height:250px"
                           data-options="singleSelect:true,collapsible:true,url:'{{asset('mailings')}}',method:'post'">
                        <thead>
                        <tr>
                            <th data-options="field:'id',width:80">Item ID</th>
                            <th data-options="field:'subject',width:100">Product</th>
                            <th data-options="field:'created-at',width:80,align:'right'">Unit Cost</th>
                            <th data-options="field:'status',width:60,align:'center'">Status</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    <!-- /.row -->
</div>