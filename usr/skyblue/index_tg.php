<?php
if (!defined('WY_ROOT'))
	exit ;
?>
<div class="row">
    <div class="col-sm-3">

        <div class="tile-progress tile-blue">
            <div class="tile-header">
                <h3>账户信息</h3>
            </div>

            <!--  <div class="tile-progressbar">
                <span data-fill="<?php echo $safe_num;?>%" style="width: <?php echo $safe_num;?>%;"></span>
            </div>-->
            <div class="tile-footer">
                <p>最近登录：<?php echo $_SESSION['login_logtime'] ?></p>
                <p>登陆IP:<?php echo $_SESSION['login_logip'] ?></p>
                <p>
                    结算模式：<?php switch($_SESSION['login_user_ctype']){
                                   case '2': echo '<span class="blue">'.$userCtype[$_SESSION['login_user_ctype']].'(次日)</span>'; break;
                                   case '3': echo '<span class="red">'.$userCtype[$_SESSION['login_user_ctype']].'(3日)</span>'; break;
                                   case '4': echo '<span style="color:#ee1289">'.$userCtype[$_SESSION['login_user_ctype']].'(终止)</span>'; break;
                                   case '5': echo '<span style="color:#ee00ee">'.$userCtype[$_SESSION['login_user_ctype']].'(Vip)</span>'; break;
                                   case '6': echo '<span style="color:#000000">'.$userCtype[$_SESSION['login_user_ctype']].'(Vip)</span>'; break;
                                   default: echo $userCtype[$_SESSION['login_user_ctype']].'(次日)';
                               } ?>
                </p>
                <span>

                    <?php if(empty($info_user['openid_wx'])):?>
                    <a href="userWEIXIN.php" class="label label-danger">您还未绑定微信,请及时绑定微信 </a>
                    <?php else:?>
                    <a href="#" class="label label-success">已绑定微信 </a>
                    <?php endif?>
                </span>
            </div>
        </div>

    </div>

    <div class="col-sm-3">
        <div class="tile-block tile-blue" id="todo_tasks">
            <div class="tile-header">
                <i class="glyphicon glyphicon-bullhorn"></i>
                <a href="#">平台公告
                </a>
            </div>

            <div class="tile-content">

                <ul class="todo-list">
                    <?php foreach($lists as $key=>$val): ?>
                    <?php
                              $addtime = strtotime($val['addtime2']);
                              $now = strtotime(date('Y-m-d'));
                              $days = ceil(($now - $addtime) / 86400);
                    ?>
                    <li style="overflow: hidden;">
                        <!--<a  href="javascript:void(0)" onclick="Boxy.load('?action=view&id=<?php echo $val['id'] ?>',{title:'<?php echo $val['title'] ?>'})" style="overflow: hidden;color:#<?php echo $val['is_color'] =='000000' ? 'fff':  $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>" title="<?php echo $val['title'] ?>">-->
                        <a  href="javascript:void(0)" onclick="showview('?action=view&id=<?php echo $val['id'] ?>','')" style="overflow: hidden;color:#<?php echo $val['is_color'] =='000000' ? 'fff':  $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>" title="<?php echo $val['title'] ?>">
                            <?php echo $val['title'];?>
                        </a>
                        <span class="right"><?php echo $val['addtime2'];?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>
    </div>


    <div class="col-sm-6">
        <div class="tile-block tile-cyan" id="Div1">
            <div class="tile-header">
                <i class="entypo-list"></i>
                <a href="#">快捷导航
                </a>
            </div>

            <div class="tile-content">

                <p class="bs-example">
                    <a href="userinfo.php" class="btn btn-red btn-icon btn-lg">信息修改
						<i class="entypo-user"></i>
                    </a>

                    <a href="userWEIXIN.php" class="btn btn-green btn-icon btn-lg">微信绑定
						<i class="entypo-link"></i>
                    </a>

                    <a href="applyForSettlement.php" class="btn btn-blue btn-icon btn-lg">申请结算
						<i class="entypo-credit-card"></i>
                    </a>

                    <a href="message.php" class="btn btn-default btn-icon btn-lg">站内信
						<i class="entypo-chat"></i>
                    </a>

                    <a href="goodcate.php" class="btn btn-orange btn-icon btn-lg">商品分类
						<i class="entypo-doc-text-inv"></i>
                    </a>

                    <a href="goodlist.php" class="btn btn-gold btn-icon btn-lg">商品列表
						<i class="entypo-list"></i>
                    </a>

                    <a href="goodlist.php?action=add" class="btn btn-info btn-icon btn-lg">添加商品
						<i class="entypo-list-add"></i>
                    </a>

                    <a href="goods.php" class="btn btn-warning btn-icon btn-lg">添加卡密
						<i class="entypo-list-add"></i>
                    </a>
                    <a href="paylinks.php" class="btn btn-red btn-icon btn-lg">店铺链接
						<i class="entypo-home"></i>
                    </a>

                    <a href="orders.php?fdate=&tdate=&t=t3&channelid=&is_api=&st=st1&kw=&do=search" class="btn btn-white btn-icon btn-lg">最近卖出
						<i class="entypo-bell"></i>
                    </a>
                </p>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-sm-3">

        <div class="tile-stats tile-red">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" >
                <?php echo $total_money ?>
            </div>
            <h3>账户余额（元）</h3>
            <p>申请提现：<b>满 <?php echo $Config['takecash'] ?>元</b></p>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-stats tile-green">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" ><?php echo $today_money ?></div>

            <h3>今日收入</h3>
            <p>（元）</p>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-stats tile-aqua">
            <div class="icon"><i class="entypo-paper-plane"></i></div>
            <div class="num"><?php echo $today_success_orders ?></div>

            <h3>今日成交</h3>
            <p>(笔)</p>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-stats tile-blue">
            <div class="icon"><i class="entypo-paper-plane"></i></div>
            <div class="num" ><?php echo $today_sell_cards ?></div>

            <h3>今日卖出卡量</h3>
            <p>（张）</p>
        </div>

    </div>
</div>
<div class="row">
    <div class="col-sm-3">

        <div class="tile-stats tile-orange">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" >
                <?php echo $yestoday_sell_profit ?>
            </div>

            <h3>昨日利润</h3>
            <p>（元）</p>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-stats tile-purple">
            <div class="icon"><i class="entypo-chart-bar"></i></div>
            <div class="num" >
                <?php echo $yestoday_success_orders ?>
            </div>
            <h3>昨日成交</h3>
            <p>（笔）</p>
        </div>

    </div>

    <div class="col-sm-3">

        <div class="tile-stats tile-cyan">
            <div class="icon"><i class="entypo-paper-plane"></i></div>
            <div class="num" ><?php echo $total_payfee ?></div>

            <h3>累计提现（元）</h3>
            <p>待结算金额：<?php echo $last_whpaymoney?> 元</p>
        </div>

    </div>

    <div class="col-sm-3">
        <div class="tile-stats tile-brown">
            <div class="icon"><i class="entypo-paper-plane"></i></div>
            <div class="num" ><?php echo $last_paymoney ?></div>

            <h3>上次结算金额</h3>
            <p>上次结算时间：<b><?php echo $last_paytime ?></b></p>
        </div>

    </div>
</div>
<hr />
<div class="row">
    <div class="col-sm-12">


        <div class="panel panel-success" data-collapsed="0">

            <!-- panel head -->
            <div class="panel-heading">
                <div class="panel-title">收益统计</div>

            </div>

            <!-- panel body -->
            <div class="panel-body">

                <div id="lineChart" style="height: 400px;"></div>
                <script src="/usr/modern/js/echarts-all.js"></script>
                <script>
                    var getOption = function (chartType) {
                        var chartOption = {
                            grid: {
                                x: 50,
                                x2: 10,
                                y: 30,
                                y2: 50
                            },
                            toolbox: {
                                show: false,
                                feature: {
                                    mark: {
                                        show: true
                                    },
                                    dataView: {
                                        show: true,
                                        readOnly: false
                                    },
                                    magicType: {
                                        show: true,
                                        type: ['line', 'bar']
                                    },
                                    restore: {
                                        show: true
                                    },
                                    saveAsImage: {
                                        show: true
                                    }
                                }
                            },
                            calculable: false,
                            xAxis: [{
                                type: 'category',
                                data: [<?php echo $shouyi_days;?>]
                            }],
                            yAxis: [{
                                type: 'value',
                                splitArea: {
                                    show: true
                                }
                            }],
                            series: [{
                                name: '蒸发量',
                                type: chartType,
                                data: [<?php echo $shouyi_moneys;?>]
                    }]
                        };
                        return chartOption;
                    };
            var lineChart = echarts.init(document.getElementById('lineChart'));
            lineChart.setOption(getOption('line'));
                </script>
            </div>

        </div>
    </div>
</div>


<script src="../includes/libs/plugin-cookie.js" type="text/javascript"></script>
<script>var notice = new Array(<?php echo $is_popup ?>);

    function ShowAajax() {

        showview("?action=view&t=1&id=" + notice[0],"平台公告")
        //$('#modal-7').modal('show', { backdrop: 'static' });
        //$.ajax({
        //    url: "?action=view&t=1&id=" + notice[0],
        //    success: function (response) {
        //        var itop = 0;
        //        if ($(document).scrollTop() > $(window).height()) {
        //            itop = $(document).scrollTop() - $(window).height();
        //        } else {
        //            itop = $(document).scrollTop();
        //        }
        //        jQuery('#modal-7 .modal-dialog').css("top", itop);
        //        jQuery('#modal-7 .modal-body').html(response);
        //    }
        //});
    }


    var user_set_popup = $.cookie('user_set_popup_<?php echo $_SESSION['login_userid'] ?>');
    if (notice.length > 0 && user_set_popup != '1') {
        //Boxy.load('?action=view&t=1&id=' + notice[0], {
        //    title: '公告提示'
        //});
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
</script>
