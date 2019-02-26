<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .boxy-wrapper {
        width: 300px;
    }

    .search_btn {
        display: inline-block;
        border-radius: 16px;
        width: 120px;
        height: 32px;
        line-height: 32px;
        color: #fff;
        background: #7b7dea;
        font-size: 14px;
        border: 1px solid #7b7dea;
        width: 120px;
        margin-left: 0;
        margin: 0;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">库存卡密</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if(_G('del_suc')): ?><div id="tipMsg" class="actived">删除成功</div><?php endif; ?>
                    <?php if(_G('del_err')): ?><div id="tipMsg" class="actived">删除失败</div><?php endif; ?>
                    <?php if(_G('del_err_1')): ?><div id="tipMsg" class="actived">请选择要删除的记录</div><?php endif; ?>
                    <script>setTimeout(hideMsg,2600)</script>
                    <div style="padding: 10px 0">
                        <form name="search" method="get" action="">
                            <select name="cateid" style="width: 10%; display: inline-block; height: 32px; vertical-align: middle;">
                                <option value="">请选择分类</option>
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
                            </select>

                            <select name="goodid" style="width: 10%; display: inline-block; height: 32px; vertical-align: middle;">
                                <option value="">请选择商品</option>
                                <?php 
                                if($goodList): 
                                    foreach($goodList as $key=>$val):
                                        if($val['userid']==$_SESSION['login_userid']):
                                ?>
                                <option value="<?php echo $val['id'] ?>" <?php echo $goodid==$val['id'] ? 'selected' : '' ?>><?php echo $val['goodname'] ?></option>
                                <?php
                                        endif;
                                    endforeach;
                                endif;
                                ?>
                            </select>
                            <input type="hidden" name="do" value="search">
                            <input type="submit" class="btn btn-success" value="立即查询">&nbsp;
					<input type="button" title="导出商品卡密" onclick="window.location.href='?action=export&cateid=<?php echo $cateid ?>    &goodid=<?php echo $goodid ?>    '" class="btn btn-blue" value="导出卡密">
                        </form>
                    </div>
                    <form name="cate" method="post" action="?action=delall">
                        <table class="table table-bordered table-responsive" cellspacing="1">
                            <tr>
                                <th  class="border_right border_bottom">
                                    <input type="checkbox" class="selectAllCheckbox" /></th>
                                <th class="border_right border_bottom">商品名称</th>
                                <th  class="border_right border_bottom">库存卡信息</th>
                                <th class="border_right border_bottom">商品价格</th>
                                <th class="border_right border_bottom">添加时间</th>
                                <th class="border_bottom">删除</th>
                            </tr>
                            <?php if($lists): ?>
                            <?php 
                                      foreach($lists as $key=>$val):
                                          foreach($goodList as $key2=>$val2){
                                              if($val2['id']==$val['goodid']){
                                                  $goodname=$val2['goodname'];
                                                  $price=$val2['price'];
                                                  break;
                                              }
                                          }
                            ?>
                            <tr class="lightbox" id="record_<?php echo $val['id'] ?>">
                                <td class="border_right border_bottom">
                                    <input type="checkbox" name="listid[]" class="checkbox" value="<?php echo $val['id'] ?>"></td>
                                <td class="border_right border_bottom"><?php echo $goodname ?></td>
                                <td class="border_right border_bottom" style="text-align: left">
                                    <?php if(!$_SESSION['login_user_safe_key']): ?>
                                    &nbsp;<span class="gray">**安全保护**</span>
                                    <?php else: ?>
                                    卡号：<?php echo $val['cardnum'] ?><br /><?php echo $val['cardpwd']!='' ? '卡密：'.$val['cardpwd'] : '' ?>
                                    <?php endif; ?>
                                </td>
                                <td class="border_right border_bottom"><?php echo number_format($price,2,'.','') ?></td>
                                <td class="border_right border_bottom"><?php echo $val['addtime'] ?></td>
                                <td class="border_bottom">
                                    <a href="javascript:void(0)" onclick="delData(<?php echo $val['id'] ?>)">
                                        <img src="weiqi/images/ico_del.png" title="删除卡密" /></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td class="bg" colspan="6" style="text-align: center; padding-left: 10px">
                                    <p style="float: left; margin-right: 10px">
                                        <input type="checkbox" class="selectAllCheckbox" />&nbsp;
						    <input type="submit" class="btn btn-warning" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
                                        <?php if($goodid): ?>&nbsp;
							<input type="button" class="btn btn-danger" value="清空" onclick="if(!confirm('确认要删除该商品所有卡密吗？')){return false;}else{window.location.href='?action=delForGoodID&goodid=<?php echo $goodid ?>        ';}" />
                                        <?php endif; ?>
                                    </p>

                                    <p style="float: right;"><?php echo $pagelist ?></p>
                                </td>
                            </tr>
                            <?php else: ?>
                            <tr>
                                <td colspan="6">
                                    <div class="alert alert-warning">暂无商品</div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var addNew=function(){
        $('#addNewCate').toggle();
    }

    var delData=function(id){
						<?php if(!$_SESSION['login_user_safe_key']): ?>
					    userSafeVerify(1);return false;
						<?php endif ?>
					    if(confirm('是否要删除卡密信息？')){
					        $.get('goodInvent.php',{action:'del',id:id},function(data){							
					            if(data=='ok'){
					                $('#record_'+id).fadeOut();
					                alert('删除成功！');
					            } else {
					                alert(data);
					            }
					        })
					    }
					}
</script>
