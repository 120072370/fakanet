<?php
if (!defined('WY_ROOT'))
	exit ;
?>
<style>
    /*上下滚动*/
    #scrollDiv {
        height: 30px;
        line-height: 30px;
        overflow: hidden;
        z-index: 99;
    }

        #scrollDiv li {
            height: 30px;
            list-style: none;
        }

    .tile-title .title h3 {
        font-size: 14px;
    }

    .col-xs-4 {
        padding-left: 2px;
        padding-right: 2px;
    }
</style>
<div class="row">
    <div class="row">
        <div id="scrollDiv" class="col-xs-12">
            <label class="col-xs-3">最新公告</label>
            <ul style="margin-top: 0px;" class="col-xs-9">
                <?php foreach($lists as $key=>$val): ?>
                <li>
                    <a  href="javascript:void(0)" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','')" 
                            style="overflow: hidden;color:#<?php echo $val['is_color'] =='000000' ? '000':  $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>" title="<?php echo $val['title'] ?>">
                        <?php echo $val['title'];?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-xs-12">
            <div class="alert alert-minimal">
                <p class="btn btn-white btn-block"> 商家级别：<?php echo GetUserLevel($info_user['level']) ?></p>
                <p></p>
                <?php if(empty($info_user['openid_wx'])):?>
                <a href="userWEIXIN.php" class="btn btn-danger btn-sm">未绑定微信 </a>
                <?php else:?>
                <a href="#" class="btn btn-success btn-sm">已绑定微信</a>
                <?php endif?>

                <?php if(empty($info_userinfo['realname'])):?>
                <a href="userinfo.php" class="btn btn-danger btn-sm">未填写收款信息</a>
                <?php else:?>

                <?php if($info_userinfo['ptype']==2):?>
                <a href="#" class="btn btn-info btn-sm">收款方式：支付宝收款</a>
                <?php elseif($info_userinfo['ptype']==1):?>
                <a href="#" class="btn btn-info btn-sm">收款方式：银行收款</a>
                <?php elseif($info_userinfo['ptype']==3):?>
                <a href="#" class="btn btn-info btn-sm">收款方式：财付通收款</a>
                <?php elseif($info_userinfo['ptype']==4):?>
                <a href="#" class="btn btn-info btn-sm">收款方式：微信收款</a>
                <?php endif?>
                <?php endif?>

                <h5>店铺信息完善度:<?php echo $safe_num ?>%</h5>
                <div class="progress progress-striped active">
                    <div class="progress-bar <?php echo $safe_num >= 80? "progress-bar-success" : "progress-bar-danger"?> "" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $safe_num ?>%">
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-xs-12">
        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num">
                <?php echo $total_money ?>
            </div>
            <h3>账户余额（元）</h3>
            <p>今日成交金额：<b><?php echo $today_money ?>元</b> | 今日成交：<?php echo $today_success_orders ?>笔</p>
            <p>今日卖出卡量：<b><?php echo $today_sell_cards ?></b>张</p>
        </div>

    </div>
    <div class="col-xs-12">
        <div class="tile-stats tile-cyan">
            <div class="icon"><i class="entypo-paper-plane"></i></div>
            <div class="num"><?php echo $total_payfee ?></div>
            <h3>累计提现（元）</h3>
            <p>上次结算金额：<?php echo $last_paymoney ?>元</p>
            <p>待结算金额：<?php echo $last_whpaymoney?> 元</p>
        </div>

    </div>
</div>
<h2>交易管理</h2>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            <a href="orders.php?fdate=&tdate=&t=t3&channelid=&is_api=&st=st1&kw=&do=search" class="tile-title tile-green">
                <div class="icon" style="padding: 10px;">
                    <i class="entypo-bell"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">最近卖出</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="applyForSettlement.php" class="tile-title tile-blue">
                <div class="icon" style="padding: 10px;">
                    <i class="entypo-credit-card"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">申请结算</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="orders.php" class="tile-title tile-orange">
                <div class="icon" style="padding: 10px;">
                    <i class="entypo-doc-text-inv"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">订单记录</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            <a href="passageway.php" class="tile-title tile-cyan">
                <div class="icon" style="padding: 10px;">
                    <i class="entypo-list"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">通道管理</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="message.php" class="tile-title tile-red">
                <div class="icon" style="padding: 10px;">
                    <i class="entypo-chat"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">站内信息</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="analyforuser.php" class="tile-title tile-aqua">
                <div class="icon" style="padding: 10px;">
                    <i class="glyphicon glyphicon-usd"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">收益统计</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>
    </div>
</div>


<h2>商品管理</h2>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            <a href="goodcate.php" class="tile-title tile-green">
                <div class="icon" style="padding: 10px;">
                    <i class="glyphicon glyphicon-list"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">商品分类</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="goodlist.php" class="tile-title tile-blue">
                <div class="icon" style="padding: 10px;">
                    <i class="glyphicon glyphicon-tasks"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">商品管理</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="goodlist.php?action=add" class="tile-title tile-orange">
                <div class="icon" style="padding: 10px;">
                    <i class="glyphicon glyphicon-plus"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">添加商品</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="col-xs-4">
            <a href="goodInvent.php" class="tile-title tile-cyan">
                <div class="icon" style="padding: 10px;">
                    <i class="glyphicon glyphicon-folder-open"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">库存卡密</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="goods.php" class="tile-title tile-red">
                <div class="icon" style="padding: 10px;">
                    <i class="entypo-list-add"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">添加卡密</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>

        <div class="col-xs-4">
            <a href="paylinks.php" class="tile-title tile-aqua">
                <div class="icon" style="padding: 10px;">
                    <i class="glyphicon glyphicon-paperclip"></i>
                </div>
                <div class="title">
                    <h3 style="padding-top: 10px;">店铺链接</h3>
                    <p style="padding-bottom: 10px;"></p>
                </div>
            </a>
        </div>
    </div>
</div>

</div>

<script src="../includes/libs/plugin-cookie.js" type="text/javascript"></script>
<script src="<?php echo USER_THEME ?>/assets/js/toastr.js"></script>
<script>

    <?php if(empty($info_userinfo['realname'])):?>
    toastr.error('您还未填写收款信息，请到“商户信息修改”中完善收款信息！');
    <?php endif;?>

    <?php if(empty($info_user['openid_wx'])):?>
    toastr.warning('您还未绑定微信，请及时绑定微信，可接收系统通知,微信提现！');
    <?php endif;?>

    var notice = new Array(<?php echo $is_popup ?>);

    function ShowAajax() {
        $('#modal-7').modal('show', { backdrop: 'static' });
        $.ajax({
            url: "?action=view&t=1&id=" + notice[0],
            success: function (response) {
                jQuery('#modal-7 .modal-dialog').css("top", $(document).scrollTop());
                jQuery('#modal-7 .modal-body').html(response);
            }
        });
    }


    var user_set_popup = $.cookie('user_set_popup_<?php echo $_SESSION['login_userid'] ?>');
    if (notice.length > 0 && user_set_popup != '1') {
        window.onload = function () {
            ShowAajax();
        }
    }

    var cnt = 0;

    function nt(t) {
        if (t == 'next') {
            if (cnt == notice.length - 1) {
                alert('已经是最后一条了');
            } else {
                cnt += 1;
                getNotice(notice[cnt]);
            }
        } else {
            if (cnt == 0) {
                alert('没有上一条了');
            } else {
                cnt -= 1;
                getNotice(notice[cnt]);
            }
        }
    }

    function getNotice(id) {
        var nowtitle = '';
        $.getJSON("index.php", {
            action: 'view',
            t: 2,
            id: id
        },
            function (data) {
                nowtitle = $("body").find("#newstitle");
                if (data.titlecolor == '') {
                    nowtitle.css("color", "#000");
                } else {
                    nowtitle.css("color", data.titlecolor);
                }
                nowtitle.html(data.title);
                $("body").find("#newscontent").html(data.content);
                $("body").find("#newsdate").html(data.addtime);
            });
    }

    function userSetPopup() {
        $.cookie('user_set_popup_<?php echo $_SESSION['login_userid'] ?>', '1', { expires: 1 });
        $('.close').click();
    }

    $(document).ready(function () {
        var myar = setInterval('AutoScroll("#scrollDiv")', 5000);
        $("#scrollDiv").hover(function () {
            clearInterval(myar);
        },
        function () {
            AutoScroll("#scrollDiv");
            myar = setInterval('AutoScroll("#scrollDiv")', 5000)
        }); //当鼠标放上去的时候，滚动停止，鼠标离开的时候滚动开始
    });
    function AutoScroll(obj) {
        $(obj).find("ul:first").animate({
            marginTop: "-25px"
        },
        500,
        function () {
            $(this).css({
                marginTop: "0px"
            }).find("li:first").appendTo(this);
        });
    }
</script>
