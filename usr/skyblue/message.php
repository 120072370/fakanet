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
                                    <table class="table table-bordered table-responsive" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th class="border_right border_bottom">选择</th>
                                                <th class="border_right border_bottom">标题</th>
                                                <th class="border_right border_bottom">发件人</th>
                                                <th class="border_bottom">时间</th>
                                                <th >查看</th>
                                            </tr>
                                        </thead>
                                        <?php if($lists): ?>
                                        <?php foreach($lists as $key=>$val): ?>
                                        <tr class="lightbox">
                                            <td class="border_right border_bottom">
                                                <input type="checkbox" name="listid[]" value="<?php echo $val['id'] ?>" /></td>
                                            <td class="border_right border_bottom" style="text-align: left; padding-left: 10px">
                                                <img src="weiqi/images/ico_mail2.gif" align="absmiddle">
                                                <a href="javascript:void(0)" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')"<?php echo $val['is_read']==0 ? ' class="bold"' : '' ?>><?php echo $val['title'] ?></a></td>
                                            <td class="border_right border_bottom">管理员</td>
                                            <td class="border_bottom"><?php echo $val['addtime'] ?></td>
                                            <td>
                                                <button type="button" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')" class="btn btn-blue btn-sm">查看</button>
                                                <button type="button" onclick="showview('?action=write','写新消息')" class="btn btn-green btn-sm">回复</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <!--<tr>
                                <td colspan="4" class="border_bottom" style="text-align: left; padding-left: 10px">
                                    <input type="button" class="btn btn-success" value="全选" id="selectall" />
                                    <input type="button" class="btn btn-red" value="反选" id="unselectall" />
                                    <input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
                            </tr>-->
                                        <tr>
                                            <td class="bg" colspan="5" style="text-align: left; padding-left: 10px"><?php echo $pagelist ?></td>
                                        </tr>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5">
                                                <div class="alert alert-warning">暂无消息</div>
                                            </td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </table>
                                </form>
                            </div>

                            <div class="tab-pane <?php echo $action=='outbox' ? 'active' : '' ?>" id="profile-2">
                                <?php if($action=='outbox'): ?>
                                <form name="del" method="post" action="?action=delall">
                                    <table class="table table-bordered table-responsive" cellspacing="1">
                                        <thead>
                                            <tr>
                                                <th class="border_right border_bottom">选择</th>
                                                <th class="border_right border_bottom">标题</th>
                                                <th class="border_right border_bottom">收件人</th>
                                                <th class="border_bottom">时间</th>
                                                 <th >查看</th>
                                            </tr>
                                        </thead>
                                        <?php if($lists): ?>
                                        <?php foreach($lists as $key=>$val): ?>
                                        <tr class="lightbox">
                                            <td class="border_right border_bottom">
                                                <input type="checkbox" name="listid[]" value="<?php echo $val['id'] ?>" /></td>
                                            <td class="border_right border_bottom" style="text-align: left; padding-left: 10px">
                                                <img src="weiqi/images/ico_mail2.gif" align="absmiddle">
                                                <a href="javascript:void(0)" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')"><?php echo $val['title'] ?></a></td>
                                            <td class="border_right border_bottom">管理员</td>
                                            <td class="border_bottom"><?php echo $val['addtime'] ?></td>
                                            <td>
                                                <button type="button" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','<?php echo $val['title'] ?>')" class="btn btn-blue btn-sm">查看</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <!--<tr>
                                            <td colspan="4" class="border_bottom" style="text-align: left; padding-left: 10px">
                                                <input type="button" class="button_bg_1" value="全选" id="selectall" />
                                                <input type="button" class="button_bg_1" value="反选" id="unselectall" />
                                                <input type="submit" class="button_bg_1" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
                                        </tr>-->
                                        <tr>
                                            <td class="bg" colspan="5" style="text-align: left; padding-left: 10px"><?php echo $pagelist ?></td>
                                        </tr>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="5"> <div class="alert alert-warning">暂无消息</div></td>
                                        </tr>
                                        <?php endif; ?>
                                    </table>
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