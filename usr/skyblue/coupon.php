<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .right_title a {
        display: inline-block;
        width: 126px;
        height: 27px;
        line-height: 27px;
        background: url(weiqi/images/bg.gif) no-repeat;
    }

        .right_title a.current {
            background: url(weiqi/images/main_right_title_bg.gif) no-repeat;
            color: #fff;
            font-weight: bold;
        }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">优惠券管理</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if(isset($_SESSION['login_is_api']) && $_SESSION['login_is_api']): ?>
                    <div class="right_title" style="float: left; position: relative; margin-top: -38px; left: 125px"><a href="coupon.php?action=add">生成优惠券</a></div>
                    <?php endif; ?>
                    <?php if(_G('add_suc')): ?><div id="tipMsg" class="actived">添加成功</div><?php endif; ?>
                    <?php if(_G('add_err')): ?><div id="tipMsg" class="errmsg">添加失败</div><?php endif; ?>
                    <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">修改失败</div><?php endif; ?>
                    <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">修改成功</div><?php endif; ?>
                    <?php if(_G('del_err_1')): ?><div id="tipMsg" class="errmsg">请选择要删除的优惠券</div><?php endif; ?>
                    <?php if(_G('del_err')): ?><div id="tipMsg" class="errmsg">删除失败</div><?php endif; ?>
                    <?php if(_G('del_suc')): ?><div id="tipMsg" class="actived">删除成功</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>

                    <div style="padding: 10px 0">
                        <form name="search" method="get" action="">
                            <select name="cateid">
                                <option value="">全部分类</option>
                                <?php 
                                if($goodCate): 
                                    foreach($goodCate as $key=>$val):
                                        if($val['userid']==$_SESSION['login_userid']):
                                ?>
                                <option value="<?php echo $val['id'] ?>" <?php echo $cateid==$val['id'] ? 'selected' : '' ?>><?php echo $val['catename'] ?></option>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </select>&nbsp;&nbsp;

					<select name="is_state" class="search_select">
                        <option value="" <?php echo $is_state=='' ? 'selected' : '' ?>>全部</option>
                        <option value="s1" <?php echo $is_state=='s1' ? 'selected' : '' ?>>未使用</option>
                        <option value="s2" <?php echo $is_state=='s2' ? 'selected' : '' ?>>已使用</option>
                        <option value="s3" <?php echo $is_state=='s3' ? 'selected' : '' ?>>已过期</option>
                    </select>&nbsp;&nbsp;

					<input type="text" name="keyword" class="input" value="<?php echo $keyword ?>" />
                            <input type="hidden" name="do" value="search">
                            <input type="submit" class="btn btn-success" value="查询">
                        </form>
                    </div>
                    <?php if($is_state=='s2'): ?>
                    <table class="table table-bordered table-responsive" cellspacing="1">
                        <thead>
                            <tr>
                                <th class="border_right border_bottom">优惠券号码</th>
                                <th class="border_right border_bottom">绑定分类</th>
                                <th class="border_right border_bottom">面额</th>
                                <th class="border_right border_bottom">使用时间</th>
                                <th class="border_right border_bottom">订单号</th>
                            </tr>
                        </thead>
                        <?php
                              if($lists):
                                  foreach($lists as $key=>$val): 						
                        ?>
                        <tr class="lightbox" id="record_<?php echo $val['id'] ?>">
                            <td class="border_right border_bottom"><?php echo $val['couponcode'] ?></td>
                            <td class="border_right border_bottom"><span class="blue"><?php echo $val['catename'] ?></span></td>
                            <td class="border_right border_bottom"><?php echo $val['ctype']==1 ? $val['coupon'].' 元' : $val['coupon'].'%' ?></td>
                            <td class="border_right border_bottom"><?php echo $val['updatetime'] ?></td>
                            <td class="border_right border_bottom"><a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank"><?php echo $val['orderid'] ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="7" style="padding-left: 10px" class="bg"><?php echo $pagelist ?></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td colspan="7"><div class="alert alert-warning">暂无记录</div></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <?php elseif($is_state=='s3'): ?>
                    <table class="table table-bordered table-responsive" cellspacing="1">
                        <thead>
                        <tr>
                            <th width="150" class="border_right border_bottom">优惠券号码</th>
                            <th class="border_right border_bottom">绑定分类</th>
                            <th class="border_right border_bottom">面额</th>
                            <th class="border_right border_bottom">生成时间</th>
                            <th class="border_right border_bottom">过期时间</th>
                        </tr>
                            </thead>
                        <?php
                              if($lists):
                                  foreach($lists as $key=>$val): 						
                        ?>
                        <tr class="lightbox" id="record_<?php echo $val['id'] ?>">
                            <td class="border_right border_bottom"><?php echo $val['couponcode'] ?></td>
                            <td class="border_right border_bottom"><span class="blue"><?php echo $val['catename'] ?></span></td>
                            <td class="border_right border_bottom"><?php echo $val['ctype']==1 ? $val['coupon'].' 元' : $val['coupon'].'%' ?></td>
                            <td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['updatetime'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="7" style="padding-left: 10px" class="bg"><?php echo $pagelist ?></td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td colspan="7"><div class="alert alert-warning">暂无记录</div></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                    <?php else: ?>
                    <form name="d" method="post" action="?action=delall">
                        <table class="table table-bordered table-responsive" cellspacing="1">
                            <thead>
                            <tr>
                                <th class="border_right border_bottom">优惠券号码</th>
                                <th class="border_right border_bottom">绑定分类</th>
                                <th class="border_right border_bottom">面额</th>
                                <th class="border_right border_bottom">生成时间</th>
                                <th class="border_right border_bottom">有效期</th>
                                <th class="border_right border_bottom">管理</th>
                                <th class="border_bottom">
                                    <input type="checkbox" id="selectall2" />全选</th>
                            </tr>
                                </thead>
                            <?php
                              if($lists):
                                  foreach($lists as $key=>$val): 						
                            ?>
                            <tr class="lightbox" id="record_<?php echo $val['id'] ?>">
                                <td class="border_right border_bottom"><?php echo $val['couponcode'] ?></td>
                                <td class="border_right border_bottom"><span class="blue"><?php echo $val['catename'] ?></span></td>
                                <td class="border_right border_bottom"><?php echo $val['ctype']==1 ? $val['coupon'].' 元' : $val['coupon'].'%' ?></td>
                                <td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
                                <td class="border_right border_bottom"><?php echo $val['is_state'] ?></td>
                                <td class="border_right border_bottom"><a href="?action=edit&id=<?php echo $val['id'] ?>">编辑</a></td>
                                <td class="border_bottom">
                                    <input type="checkbox" name="listid[]" value="<?php echo $val['id'] ?>" /></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="6" style="padding-left: 10px" class="bg"><?php echo $pagelist ?></td>
                                <td class="bg">
                                    <input type="submit" onclick="if (!confirm('确定要删除优惠券吗？')) return false" class="button_bg_1" value="删除" /></td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="7"><div class="alert alert-warning">暂无记录</div></td>
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
