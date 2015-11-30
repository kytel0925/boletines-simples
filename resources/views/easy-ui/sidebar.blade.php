<div class="easyui-panel" data-options="fit:true,border:false">
    <div class="easyui-menu" data-options="inline:true,fit:true" id="dashboard-sidebar">
        <div data-options="iconCls:'fa fa-dashboard',app:AppDashboard" class="app-item">Dashboard</div>
        <div data-options="iconCls:'fa fa-envelope'">
            <span>Mailings</span>
            <div style="width:150px;">
                <div data-options="iconCls:'fa fa-edit',app:AppMailings" class="app-item">Edit</div>
                <!--<div data-options="iconCls:'fa fa-tasks',app:AppTasks" class="app-item">Tasks</div>-->
                <div data-options="iconCls:'fa fa-paper-plane',app:AppSenders" class="app-item">Senders</div>
            </div>
        </div>
        <div data-options="iconCls:'fa fa-user'">
            <span>Subscribers</span>
            <div style="width:150px;">
                <div data-options="iconCls:'fa fa-database',app:AppSubscribers" class="app-item">Database</div>
                <!--<div data-options="iconCls:'fa fa-list',app:AppSubscribersLists" class="app-item">Lists</div>-->
            </div>
        </div>
    </div>
</div>