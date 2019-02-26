<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    td.astyle a {
        color: #000;
    }

        td.astyle a.red {
            color: red;
        }

        td.astyle a.green {
            color: green;
        }

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
                <div class="panel-title">商品分类</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <!--<div class="right_title" style="float:left;position:relative;margin-top:-38px;left:125px"><a href="#add" onclick="addNew()">添加新分类</a></div>-->
                    <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">分类保存成功</div><?php endif; ?>
                    <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">分类保存失败</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>
                    <form name="cate" method="post" action="?action=editsave">
                        <table class="table table-bordered table-responsive" cellspacing="1">
                            <thead>
                                <tr>
                                    <th  class="border_right border_bottom">分类名称</th>
                                    <th width="" class="border_right border_bottom">分类排序</th>
                                    <th class="border_bottom">分类管理</th>
                                </tr>
                            </thead>
                            <?php if($lists): ?>
                            <?php 
                                      foreach($lists as $key=>$val): 
                            ?>
                            <tr class="lightbox" id="record_<?php echo $val['id'] ?>">
                                <td class="border_right border_bottom">
                                    <input type="text" name="catename_<?php echo $val['id'] ?>" class="input" style="width:90%" value="<?php echo $val['catename'] ?>" maxlength="50" />
                                </td>
                                <td class="border_right border_bottom">
                                    <input type="text" name="sortid_<?php echo $val['id'] ?>" class="input" style="width:40px" maxlength="4" value="<?php echo $val['sortid'] ?>" />
                                </td>
                                <td class="border_bottom astyle">
                                    <a href="?action=edit&id=<?php echo $val['id'] ?>">编辑</a>&nbsp;

							<a href="rates.php?cateid=<?php echo $val['id'] ?>">卡价值</a>&nbsp;
							
							<a href="javascript:void(0)" class="red" onclick="showview('?action=link&id=<?php echo $val['linkid'] ?>&cateid=<?php echo $val['id'] ?>','获取分类[<?php echo $val['catename'] ?>]链接')">链接</a>&nbsp;

							<a href="goodlist.php?cateid=<?php echo $val['id'] ?>&do=search">商品</a>&nbsp;
							<a href="goodInvent.php?cateid=<?php echo $val['id'] ?>&do=search">库存卡</a>&nbsp;

							<a href="javascript:void(0)" onclick="delData(<?php echo $val['id'] ?>)">
                                <img src="weiqi/images/ico_del.gif" title="移除分类" /></a>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                            <tr id="addNewCate" style="display: none">
                                <a name="add"></a>
                                <td class="border_right border_bottom">
                                    <input type="text" name="catename" class="input" style="width: 90%" maxlength="50" /></td>
                                <td class="border_right border_bottom">
                                    <input type="text" name="sortid" class="input" style="width: 40px" maxlength="4" value="100" /></td>
                                <td class="border_bottom">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="border_bottom" style="text-align: left; padding-left: 5px;">
                                    <a href="javascript:void(0)" class="btn btn-red  btn-icon icon-left" id="addNew">
                                        添加分类
                                        <i class="entypo-plus"></i>
                                    </a> <span class="gray">(当前操作需要保存设置后才能生效)</span></td>
                            </tr>
                            <tr>
                                <td class="bg" style="text-align: left; padding-left: 20px">
                                    <input type="submit" class="btn btn-success" value="保存设置"></td>
                                <td colspan="2" class="bg" style="padding-left: 10px"><?php echo $pagelist ?></td>
                            </tr>
                        </table>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $("#addNew").click(function () {
        $('#addNewCate').show();
    })
 

    var delData = function (id) {
						<?php if(!$_SESSION['login_user_safe_key']): ?>
        userSafeVerify(1); return false;
						<?php endif ?>
        if (confirm('是否要删除此分类？')) {
            $.get('goodCate.php', { action: 'del', id: id }, function (data) {
                if (data == 'ok') {
                    $('#record_' + id).fadeOut();
                } else {
                    alert(data);
                }
            })
        }
    }

  
</script>
