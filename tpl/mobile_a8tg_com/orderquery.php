<?php if(!defined('WY_ROOT')) exit; ?>


<link rel="stylesheet" href="tpl/weiqi/css/regapp.css" />
<link rel="stylesheet" href="tpl/weiqi/css/footstrap.css" />
<script src="tpl/weiqi/js/footstrap.js"></script>
<script src="/css/layer/layer.js" type="text/javascript"></script>
<link href="/css/layer/theme/default/layer.css" rel="stylesheet" type="text/css" />

<div style="margin-top: 0px; padding-top: 8px; background-color: #f1f1f1">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation">&nbsp;&nbsp;&nbsp;</li>
        ﻿
        <div class="tab-content" style="padding: 10px 20px">
            <div role="tabpanel" class="tab-pane active content_style">

                <?php if(!$st && !$kw): ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>友情提示：</strong>
                    </div>
                    <div class="panel-body">
                        <p>
                          如遇商品问题，请自行与商家取得联系，解决问题。若商家12小时内不提供相关帮助，请到“购买页面下方点击举报投诉”。
                            <br />
                            平台仅限查询近一周内的订单记录，请各自留存订单信息。
                        </p>
                    </div>
                    <?php endif; ?>

                    <?php if($st!='orderid' && $st!='' && $kw!=''): ?>
                    <div class="search_result">
                        <span>查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
                        <?php if($lists): ?>
                        <?php foreach($lists as $key=>$val): ?>

                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <strong>交易订单</strong><span id="tips"></span>
                            </div>
                            <div class="panel-body">
                                <p>提交时间：<strong><?php echo $val['addtime'] ?></strong></p>
                                <p>订单号码：<strong><?php echo $val['orderid'] ?></strong></p>
                                <p>支付类型：<strong><?php echo $val['channelname'] ?></strong></p>
                                <p>商品金额：<strong><?php echo $val['price'] ?></strong>元</p>
                                <p>实付金额：<strong><?php echo $val['realmoney'] ?></strong>元</p>
                            </div>
                            <div class="panel-footer text-center"><a href="orderquery.htm?orderid=<?php echo $val['orderid'] ?>" target="_blank" style="color:red">点击查看/领取卡密</a></div>
                        </div>

                        <?php endforeach; ?>
                        <?php else: ?>
                        <tr>
                            <td colspan="6">暂无记录</td>
                        </tr>
                        <?php endif; ?>
                
                    </div>
                </div>
                <?php endif; ?>

                <?php if($st=='orderid' && $kw!=''): ?>
                <div class="search_result">
                    <span>查询时间：<?php echo date('Y-m-d H:i:s') ?></span>
                    <?php if($lists): ?>
                    <?php if($lists[0]['is_status']==1): ?>

                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if($lists): ?>
                        <?php 
                                  foreach($lists as $key=>$val): 
                                      $userid=$val['userid'];
                                      $goodremark=$val['goodremark'];
                                      $is_display_remark=$val['is_display_remark'];
                                      $order_status=$val['is_status'];
                                      $qq = $val["qq"];
                        ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>交易订单</strong><span id="tips"></span>
                        </div>
                        <div class="panel-body">
                            <p>订单日期：<strong><?php echo $val['addtime'] ?></strong></p>
                            <p>订单号码：<strong><?php echo $val['orderid'] ?></strong></p>

                            <p>商品金额：<strong><?php echo $val['price']*$val['quantity'] ?></strong>元</p>
                            <p>实付金额：<strong><?php echo $val['realmoney'] ?></strong>元</p>

                            <?php if(count($lists) >1): ?>
                            <p>
                                <span><a href="orderquery.htm?st=orderid&kw=<?php echo $val['orderid'] ?>" >查看卡密信息</a></span>
                            </p>
                            <?php else: ?>
                             <p>
                        <span style="coloe:red;">
                            商家客服：<?php echo $qq ?>
                            <a target="blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq ?>&amp;Site=&amp;Menu=yes">
                                <img border="0" src="/lin/default/images/button_11.gif" alt="点击这里给我发消息" align="absmiddle" />
                            </a>
                        </span>
                    </p>
                                     <p>
                                <div id="cardinfo" style="color: red">
                                    
                                    <?php if($val['is_state']==0): ?>
                                    <img src="tpl/skyblue/images/load.gif" align="absmiddle" />
                                    请稍候，正在查询(请勿刷新)......
							<script>
							    $(function () {
							        getgoods();
							    })

							    var getgoods = function () {
							        $.ajax({
							            type: "GET",
							            url: "checkgoods.htm?orderid=<?php echo $val['orderid'] ?>",
							            dataType: "json",
							            cache: false,
							            timeout: 10000,
							            error: function (XMLHttpRequest, textStatus, errorThrown) {
							                alert('取卡过程中出现故障，请重试！');
							                window.location.reload();
							            },
							            success: function (data) {
							                $('#cardinfo').html(data.msg);
							                if (data.status == 1) {
							                    $('#tips').html('(已发货/购买数：' + data.quantity + '/' + data.quantity + ')');
							                }
							            }
							        });
							    }
                            </script>
                                    <?php else: ?>
                                    该订单已人工处理
						<?php endif; ?>
                                </div>
                            </p>
                                    <?php if($orderList): ?>
                                            <?php foreach($orderList as $key=>$val1): ?>
                                            <p>支付类型：<strong><?php echo $val1['channelname'] ?></strong></p>
                                            <p>支付状态：<strong><?php echo $val1['is_state']==1 ? '<span class="green">成功</span>' : '<span class="red">失败</span>' ?></strong></p>
                                            <?php endforeach; ?>
                                    <?php endif; ?>

                                            <?php if($goodremark): ?>
                                            <?php if($is_display_remark==1 && $order_status==1): ?>
                                            <p style="border: 1px solid #eff3dc; background: #f5fde6; color: #800000; font-size: 14px; padding: 5px 20px; margin-top: 15px">
                                                <?php echo html_entity_decode($goodremark) ?>
                                            </p>
                                            <?php elseif($is_display_remark==0): ?>
                                            <p style="border: 1px solid #eff3dc; background: #f5fde6; color: #800000; font-size: 14px; padding: 5px 20px; margin-top: 15px">
                                                <?php echo html_entity_decode($goodremark) ?>
                                            </p>
                                            <?php endif; ?>
                                            <?php endif; ?>

                                            <?php if($val['is_state']==0): ?>
                                            <?php if($val['is_status']==0): ?>
                                            <!--<a href="lin/go.php?orderid=<?php echo $val['orderid'] ?>" target="_blank">未付款,马上付款</a></a>-->
                                            未付款
						                    <?php elseif($val['is_status']==2): ?>
                                            <!--<a href="lin/go.php?orderid=<?php echo $val['orderid'] ?>" target="_blank">部分付款,继续支付</a></a>-->
                                            未付款
						                    <?php elseif($val['is_status']==1): ?>
                                            <span class="green">完成付款,订单完成</span>
                                            <?php elseif($val['is_status']==4): ?>
                                            <span class="red">完成付款,订单已退款</span>
                                            <?php endif; ?>
                                            <?php else: ?>
                                            订单已关闭
					                        <?php endif; ?>
                                        
                            <?php endif; ?>
                        </div>
                        <div class="panel-footer text-center">
                            <span class="red">
                                免责声明：商品售后问题请自行与商家协商。
                                                                <br/>
                如遇卖家不予解决或涉及诈骗、假冒、钓鱼、色情等商品请及时与平台联系。
                            </span>
                        </div>
                    </div>
                         <?php endforeach; ?>
                    <?php else: ?>
                    <span>暂无记录</span>
                    <?php endif; ?>
                      <?php endif; ?>
                </div>
                <script>
                    $(function () {

                        $('.nyroModal').click(function () {
                            layer.open({
                                type: 2,
                                area: ['100%', '430px'],
                                fix: false, //不固定
                                offset: '20',
                                maxmin: false,
                                content: $(this).attr("href")
                            });
                            return false;
                        });

                        //$.extend($.fn.nyroModal.settings, { modal: true, minHeight: 280, minWidth: 300 });
                        //$('#report').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 320, height: 280 });
                    })
                </script>
            </div>
        </div>
</div>
