<?php if(!defined('WY_ROOT')) exit; ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">站内信</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="panel minimal minimal-gray">

                    <div class="panel-heading">
                        <div class="panel-title"><a href="javascript:void(0)" onclick="showview('?action=write','写新消息')" class="btn btn-success">写新消息</a></div>
                        <div class="panel-options">

                            <ul class="nav nav-tabs">
                                <li class="<?php echo $action=='' ? 'active' : '' ?>"><a href="message.php">收件箱</a></li>
                                <li class="<?php echo $action=='outbox' ? 'active' : '' ?>"><a href="message.php?action=outbox">发件箱</a></li>

                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <?php if(_G('add_suc')): ?><div id="tipMsg" class="alert alert-success">消息发送成功</div><?php endif; ?>
                        <?php if(_G('add_err')): ?><div id="tipMsg" class="alert alert-danger">消息发送失败</div><?php endif; ?>
                        <script>setTimeout(hideMsg, 2600)</script>
                        <div class="tab-content">
                            <div class="tab-pane <?php echo $action=='' ? 'active' : '' ?>" id="profile-1">
                                <?php if($action==''): ?>
                                <form name="del" method="post" action="?action=delall">

                                   
                                        <?php if($lists): ?>
                                        <?php foreach($lists as $key=>$val): ?>

                                        <div class="alert <?php echo $val['is_read']==0 ? ' alert-danger"' : 'alert-default' ?>">
                                            <p>
                                                <strong>
                                                    <a href="javascript:void(0)" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')"<?php echo $val['is_read']==0 ? ' class="bold"' : '' ?>><?php echo $val['title'] ?></a>
                                                </strong>
                                            </p>
                                            <p>发件人:管理员</p>
                                            <p>时间:<?php echo $val['addtime'] ?></p>
                                            <button type="button" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')" class="btn btn-blue btn-sm">查看</button>
                                             <button type="button" onclick="showview('?action=write','写新消息')" class="btn btn-green btn-sm">回复</button>
                                        </div>

                                      
                                        <?php endforeach; ?>
                                        <!--<tr>
                                <td colspan="4" class="border_bottom" style="text-align: left; padding-left: 10px">
                                    <input type="button" class="btn btn-success" value="全选" id="selectall" />
                                    <input type="button" class="btn btn-red" value="反选" id="unselectall" />
                                    <input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
                            </tr>-->
                                        <div class="col-md-12">
                                            <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-warning">暂无消息</div>
                                        </div>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                   
                                </form>
                            </div>

                            <div class="tab-pane <?php echo $action=='outbox' ? 'active' : '' ?>" id="profile-2">
                                <?php if($action=='outbox'): ?>
                                <form name="del" method="post" action="?action=delall">
                                    
                                        <?php if($lists): ?>
                                        <?php foreach($lists as $key=>$val): ?>

                                         <div class="alert <?php echo $val['is_read']==0 ? ' alert-danger"' : 'alert-default' ?>">
                                            <p>
                                                <strong>
                                                    <a href="javascript:void(0)" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')"<?php echo $val['is_read']==0 ? ' class="bold"' : '' ?>><?php echo $val['title'] ?></a>
                                                </strong>
                                            </p>
                                            <p>发件人:管理员</p>
                                            <p>时间:<?php echo $val['addtime'] ?></p>
                                            <button type="button" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')" class="btn btn-blue btn-sm">查看</button>
                                        </div>
                                   
                                        <?php endforeach; ?>
                                        
                                        <div class="col-md-12">
                                            <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                                        </div>
                                        <?php else: ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-warning">暂无消息</div>
                                        </div>
                                        <?php endif; ?>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
