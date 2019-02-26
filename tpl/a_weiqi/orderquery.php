<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/weiqi/content/webcss/query.css" rel="stylesheet" type="text/css" />
<script src="/css/layer/layer.js" type="text/javascript"></script>
<link href="/css/layer/theme/default/layer.css" rel="stylesheet" type="text/css" />
<div class="page_init">
    <div class="InNews1">
        <div class="web" style="min-height:550px;">
            <h3>Transaction Inquiry</h3>
            <h4>交易查询</h4>
            <div class="clearfix"></div>
            <ul>
                <li>
                    <form action="orderquery.htm" method="get" name="s">
                        <p class="searchp">
                            <input type="hidden" value="orderid" name="st" />
                            <input id="queryvalue" name="kw" type="text" value="<?php echo $kw ?>" placeholder="请输入订单号或联系方式查询" class="searchinput" maxlength="28">
                            <button class="searchinput_button" onclick="if ($('[name=s]').find($('[name=kw]')).val()) {
                                        s.submit();
                                    } else {
                                        $('[name=s]').find($('[name=kw]')).focus();
                                        alert('请填写查询内容！');
                                    }">
                                查询</button>
                        </p>
                    </form>
                </li>
            </ul>
            <ul class="search_tip">
                <li style="margin-top: 80px; margin-bottom: 30px;">
                    <h2>友情提示：</h2>
                    <p>
                        如遇商品问题，请自行与商家取得联系，解决问题。若商家12小时内不提供相关帮助，请到“购买页面左上角点击举报投诉”。
                    </p>
                     <p>
                         平台仅限查询近一周内的订单记录，请各自留存订单信息。
                     </p>
                </li>
            </ul>

            <?php if($st && $kw): ?>

            <?php if($lists): ?>

            <ul class="search_tip">
                <?php
                      foreach($lists as $key=>$val):
                          $userid=$val['userid'];
                          $goodremark=$val['goodremark'];
                          $is_display_remark=$val['is_display_remark'];
                          $order_status=$val['is_status'];
                          $qq = $val["qq"];
                ?>
                <li>
                <input type="hidden" value="<?php echo $row['$pwdforsearch']?>"/>
                    <h2>订单日期：   <?php echo date("Y-m-d", strtotime($val['addtime'])) ?></h2>
                    <p>
                        <span>订单号：</span>
                        <strong>
                            <?php echo $val['orderid'] ?>
                        </strong>
                    </p>
                    <p>
                     
                        <span>付款方式：</span><strong><?php echo $val['channelname'] ?></strong>
                        <span>付款信息：</span><strong>
                            <?php if($val['is_state']==0): ?>
                            <?php if($val['is_status']==0): ?>
                            <!-- <a href="lin/go.php?orderid=<?php echo $val['orderid'] ?>" target="_blank">未付款<br />马上付款-->
                            未付款
              <?php elseif($val['is_status']==2): ?>
                            <!--  <a href="lin/go.php?orderid=<?php echo $val['orderid'] ?>" target="_blank">部分付款<br />继续支付-->
                            未付款
              <?php elseif($val['is_status']==1): ?>
                            <span class="green">完成付款-订单完成
                            </span>
                            <?php elseif($val['is_status']==4): ?>
                            <span class="red">完成付款-订单已退款
                            </span>
                            <?php endif; ?>
                            <?php else: ?>
                            订单已关闭
              <?php endif; ?>
                        </strong>
                    </p>
                    <p>
                        <span>订单金额：</span><strong><?php echo $val['price']*$val['quantity'] ?></strong>
                        <span>实付金额：</span><strong><?php echo $val['realmoney'] ?></strong>
                    </p>
                   
                    <?php if(count($lists) >1): ?>
                        <p>
                            <span><a href="orderquery.htm?st=orderid&kw=<?php echo $val['orderid'] ?>" target="_blank">查看卡密信息</a></span>
                        </p>
                    <?php else: ?>
                    <p>
                        <span style="coloe:red;">
                            商家客服：
                            <a target="blank" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $qq ?>&amp;Site=&amp;Menu=yes">
                                <?php echo $qq ?>
                                <img border="0" src="/lin/default/images/button_11.gif" alt="点击这里给我发消息" align="absmiddle" />
                            </a>
                        </span>
                    </p>
                    <p>
                        卡密信息：
                        <span id="tips"></span>
                    </p>
                    <p>
                        <?php if($val['is_state']==0): ?>
                        <span id="cardinfo">
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
                              //  console.log(data.msg);
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
                        </span>
                    </p>
                    <p>
                        <?php if($goodremark): ?>

                        <?php if($is_display_remark==1 && $order_status==1): ?>
                        <span>卖家信息：</span>
                        <?php 
                                  echo html_entity_decode($goodremark)
                        ?>
                        <?php elseif($is_display_remark==0): ?>
                        <span>卖家信息：</span>
                        <?php echo html_entity_decode($goodremark) ?>
                        <?php endif; ?>
                        <?php endif; ?>
                    </p>
                    <?php endif; ?>
                </li>
                <li class="note">免责声明：商品售后问题请自行与商家协商。
                                                                <br/>
                如遇卖家不予解决或涉及诈骗、假冒、钓鱼、色情等商品请及时与平台联系。
                </li>
                <?php endforeach; ?>
            </ul>
            <?php else: ?>
            <ul class="search_tip">
                <li>
                    <h2>暂无记录</h2>
                </li>
            </ul>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
