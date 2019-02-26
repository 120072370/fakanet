<?php if(!defined('WY_ROOT')) exit; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">支付方式管理</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <table class="table table-bordered table-responsive" cellspacing="1">
                         <thead>
                        <tr>
                            <th width="220" class="border_right border_bottom">支付方式</th>
                            <th width="100" class="border_right border_bottom">商户费率</th>
                            <th width="100" class="border_right border_bottom">状态</th>
                            <th class="border_bottom">操作</th>
                        </tr>
                             </thead>
                        <?php
                        if($lists):
                            foreach($lists as $key=>$val):						
                        ?>
                        <tr class="lightbox" id="record_<?php echo $val['id'] ?>">
                            <td class="border_right border_bottom"><?php echo $val['channelname'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['price']*100 ?>%</td>
                            <td class="border_right border_bottom" id="i<?php echo $val['id'] ?>">
                                <?php echo $val['is_state']==0 ? '<img src="default/images/ico_ok.png" title="正常开通">' : '<img src="default/images/ico_remove.png" title="已关闭">' ?>
                            </td>
                            <td class="border_bottom" id="t<?php echo $val['id'] ?>">
                                <?php if($val['is_state']==0):?>
                                <input type="button" onclick="op(<?php echo $val['id'] ?>,1)" class="button_bg_1" value="关闭">

                                <?php else: ?>
                                联系客服开通
						<?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" height="20" class="bg"></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var op=function(id,t){
						<?php if(!$_SESSION['login_user_safe_key']): ?>
				        userSafeVerify(1);return false;
						<?php endif ?>
				        $.get('channels.php',{action:'op',id:id,t:t},function(data){
				            // if(data=='ok'){
				            if(t==0){
				                $('td#i'+id).html('<img src="weiqi/images/ico_ok.png" title="正常开通">');
				                $('td#t'+id).html('<input type="button" onclick="op('+id+',1)" class="button_bg_1" value="关闭">');
				            } else {
				                $('td#i'+id).html('<img src="weiqi/images/ico_remove.png" title="已关闭">');
				                $('td#t'+id).html('联系客服开通');
				            }
				            //}
				        })
				    }
</script>
