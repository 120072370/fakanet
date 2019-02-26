<?php if(!defined('WY_ROOT')) exit; ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">最近卖出卡密</div>
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
                            <div class="col-md-2">
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
                                </select>&nbsp;&nbsp;
                            </div>
                            <div class="col-md-1">
                                <select name="st" class="form-control">
                                    <option value="">查询类别</option>
                                    <option value="st1"<?php echo $st=='st1' ? ' selected' : '' ?>>订单号</option>
                                    <option value="st2"<?php echo $st=='st2' ? ' selected' : '' ?>>充值卡号</option>
                                    <option value="st3"<?php echo $st=='st3' ? ' selected' : '' ?>>联系方式</option>
                                    <option value="st4"<?php echo $st=='st4' ? ' selected' : '' ?>>商品卡号</option>
                                </select>&nbsp;&nbsp;
                            </div>
                            <div class="col-md-2">
                                <input type="text" placeholder="输入关键词" name="kw"  class="form-control"  value="<?php echo $kw ?>" />
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="do" value="search">
                                <input type="submit" class="btn btn-success " value="立即查询">
                            </div>
                        </form>
                    </div>
                    <form name="cate" method="post" action="?action=delall">

                        <?php if($lists): ?>
                        <?php 
                                  foreach($lists as $key=>$val):
                        ?>
                        <div class="well" id="record_<?php echo $val['id'] ?>">
                            <p>时间:<?php echo $val['addtime'] ?></p>
                            <p>商品名称:<a href="?goodid=<?php echo $val['goodid'] ?>"><?php echo $val['goodname'] ?></a><span class="red"><?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?> <?php echo $val['is_discount'] ? '<span style="color:red;vertical-align:super;font-size:9px">批</span>' : '' ?> <?php echo $val['is_coupon'] ? '<span style="color:red;vertical-align:super;font-size:9px">券</span>' : '' ?> <?php echo $val['is_pwdforsearch'] ? '<span style="color:red;vertical-align:super;font-size:9px">取</span>' : '' ?></span></p>
                            <p class="text-danger">
                                卡密信息:
                                     <?php if($val['is_status']==2): ?>
                                <span class="blue">部分成功</span>
                                <?php else: ?>
                                <?php if($val['is_receive']==0): ?>
                                <a href="../orderquery.htm?orderid=<?php echo $val['orderid'] ?>" style="color:red;text-decoration:underline">暂未提取卡密</a>
                                <?php else: ?>
                                <a href="javascript:void(0)" style="color:#000;text-decoration:underline" onclick="showview('?action=getgoodinfo&orderid=<?php echo $val['orderid'] ?>','<?php echo $val['goodname'] ?>')">查看卡密</a>(<span class="red"><?php echo $val['quantity'] ?></span>张)
							<?php endif ?>
                                <?php endif; ?>
                            </p>
                            <p class="text-info">支付方式:<?php echo $val['channelname'] ?></p>
                            <p class="text-info">购买者信息:<?php echo $val['contact'] ?></p>
                            <p>金额:<?php echo number_format($val['realmoney'],2,'.','') ?></p>
                            <p>分成:<?php echo number_format($val['income'],2,'.','') ?></p>
                        </div>

                        <?php endforeach; ?>
                        <div class="col-md-12">
                            <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                        </div>

                        <div class="alert alert-info">
                            今日<span class="red"><?php echo $today_total_quantity ?></span>条，
						昨日<span class="red"><?php echo $yestoday_total_quantity ?></span>条
                        </div>
                        <?php else: ?>
                        <div class="col-md-12">
                            <div class="alert alert-warning">暂无记录</div>
                        </div>
                        <?php endif; ?>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
