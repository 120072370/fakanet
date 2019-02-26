<?php if(!defined('WY_ROOT')) exit; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow">
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
                    <div class="col-md-12">
                        <form name="search" method="get" action="">
                            <div class="alert alert-minimal">
                                <select name="cateid" class="form-control">
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

                                <select name="goodid" class="form-control">
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
                                <input type="submit" class="btn btn-success form-control" value="立即查询">&nbsp;
					<input type="button" title="导出商品卡密" onclick="window.location.href='?action=export&cateid=<?php echo $cateid ?>    &goodid=<?php echo $goodid ?>    '" class="btn btn-blue form-control" value="导出卡密">
                            </div>
                        </form>
                    </div>
                    <form name="cate" method="post" action="?action=delall">
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

                        <div class="col-md-7" id="record_<?php echo $val['id'] ?>">

                            <blockquote class="blockquote-default">
                                <p>
                                    <input type="checkbox" name="listid[]" class="checkbox" value="<?php echo $val['id'] ?>">
                                    <strong>商品名称:<?php echo $goodname ?></strong>
                                </p>
                                <p>
                                    库存卡信息:<br /><?php if(!$_SESSION['login_user_safe_key']): ?>
                                    &nbsp;<span class="gray">**安全保护**</span>
                                    <?php else: ?>
                                    卡号：<?php echo $val['cardnum'] ?><br /><?php echo $val['cardpwd']!='' ? '卡密：'.$val['cardpwd'] : '' ?>
                                    <?php endif; ?>
                                </p>
                                <p>商品价格:<?php echo number_format($price,2,'.','') ?></p>
                                <p>添加时间:<?php echo $val['addtime'] ?></p>
                                <p>
                                    <a href="javascript:void(0)" onclick="delData(<?php echo $val['id'] ?>)" class="btn btn-white btn-xs">
                                        <img src="weiqi/images/ico_del.png" title="删除卡密" /></a>
                                </p>
                            </blockquote>
                        </div>
                        <?php endforeach; ?>

                        <div class="col-md-7">
                            <input type="checkbox" class="selectAllCheckbox"  /><label>全选</label>&nbsp;
						    <input type="submit" class="btn btn-warning" value="删除" onclick="if(!confirm('是否要执行 删除 操作？'))return false" />
                            <?php if($goodid): ?>&nbsp;
							<input type="button" class="btn btn-danger" value="清空" onclick="if(!confirm('确认要删除该商品所有卡密吗？')){return false;}else{window.location.href='?action=delForGoodID&goodid=<?php echo $goodid ?>        ';}" />
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                            <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                        </div>
                        <?php else: ?>
                        <div class="col-md-7">
                            <div class="alert alert-warning">暂无商品</div>
                        </div>
                        <?php endif; ?>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
 

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
