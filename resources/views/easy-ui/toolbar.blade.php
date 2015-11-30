<div class="easyui-panel" style="padding:5px;" data-options="fit:true,border:false">
    <div style="float: left;">
        &nbsp;
    </div>
    <div style="float: right;">
        <a href="#" class="easyui-menubutton" data-options="menu:'#mm1',menuAlign:'right',iconCls:'fa fa-user'">{{Auth::user()->name}}</a>
    </div>
</div>
<div id="mm1" style="width:150px;">
    <div data-options="iconCls:'fa fa-gear'">Settings</div>
    <div data-options="iconCls:'fa fa-inbox'">Notifications</div>
    <div class="menu-sep"></div>
    <div data-options="iconCls:'fa fa-power-off'" onclick="location.href = '{{asset('logout')}}'">Logout</div>
</div>