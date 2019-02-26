<?php if(!defined('WY_ROOT')) exit; ?>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta content="telephone=no" name="format-detection">
    <meta content="email=no" name="format-detection">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="Cache" content="no-cache">

    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="/atest/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/atest/assets/css/font-icons/entypo/css/entypo.css">

    <script src="/atest/assets/js/jquery-1.11.0.min.js"></script>
    <link href="orange/static/css/style.css?22" rel="stylesheet">

    <!--[if lte IE 9]><script src="baibian/static/js/html5.min.js"></script><script src="baibian/static/js/respond.min.js"></script><![endif]-->
</head>
<body>
    <noscript>
        <h1 style="color: red">您的浏览器不支持JavaScript，请更换浏览器或开启JavaScript设置!</h1>
    </noscript>
    <div class="logonav">
        <div class="container">
            <div class="pull-left">
                <a href="/index.htm">
                    <img src="/images/logo.png" alt="logo" style="width: 200px; height: 50px;"></a>
            </div>
            <div class="pull-right"><a href="/faq.htm">联系我们</a><a href="/orderquery.htm">订单查询</a><a href="#" onclick="showAjaxModal('report.php?action=mobile&uid=<?php echo $userid ?>&t=1','举报投诉')" id="report">举报投诉</a></div>
        </div>
    </div>

    <div class="container m-t-lg">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #2D89EF; color: #fff;">
                        <div class="panel-title"><em class="fa fa-list"></em>商家信息</div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td width="100">店铺名称：</td>
                                    <td><?php echo $sitename ?></td>
                                </tr>
                                <tr>
                                    <td>在线客服：</td>
                                    <td style="vertical-align: middle;"><a target="blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $qq ?>&Site=&Menu=yes"><?php echo $qq ?></a>
                                        <a target="blank" href="tencent://message/?uin=<?php echo $qq ?>&Site=&Menu=yes">
                                            <img border="0" src="baibian/static/picture/2a0cd510f02c474487b2232fd029a25a.gif" alt="点击这里给我发消息" align="absmiddle"></a></td>
                                </tr>
                                <tr>
                                    <td>商户网站：</td>
                                    <td><a rel="nofollow" target="blank" href="<?php echo $siteurl ?>"><?php echo $siteurl ?></a></td>
                                </tr>
                                <tr>
                                    <td>发货类型：</td>
                                    <td>
                                        <img src="baibian/static/picture/ico_1.gif" align="absmiddle" title="自动发货">&nbsp;<strong class="text-red">自动发货</strong></td>
                                </tr>
                                <tr>
                                    <td>店铺公告：</td>
                                    <td>
                                        <p><?php echo $siteintr == ""?"商家很懒，没留下任何信息":$siteintr ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div class="col-md-12 form-inline">
                <form name="p" method="post" action="/lin/wap.php" id="buyform" target="_blank">
                    <input type="hidden" name="userid" value="<?php echo $userid ?>" />
                    <input type="hidden" name="goodid" value="" />
                    <input type="hidden" name="quantity" value="" />
                    <input type="hidden" name="contact" value="系统默认" />
                    <input type="hidden" name="api_username" value="" />
                    <!--    <input type="hidden" name="isemail" value="0" />-->
                    <!-- <input type="hidden" name="is_coupon" value="" />-->
                    <input type="hidden" name="couponcode" value="" />
                    <input type="hidden" name="email" value="" />
                    <input type="hidden" name="paytype" value="bank" id="bank" />
                    <input type="hidden" name="pid" value="" id="pid" />


                </form>
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #F05033; color: #fff;">
                        <div class="panel-title"><em class="fa fa-list"></em>商品列表</div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <script>
                                    function selectcateid(cateid) {
                                        $('#loading').show();
                                        if (cateid > 0) {
                                            $.post('ajaxlist.php', { action: 'getgoodList', cateid: cateid }, function (res) {
                                                if (data == 'ok') {
                                                } else {
                                                    $('#loading').hide();
                                                    var html = "";
                                                    var data = eval(res);
                                                    //console.log(data.length);
                                                    for (var i = 0; i < data.length; i++) {
                                                        html += "<tr>";
                                                        html += "<td style='display:none;'>" + data[i].id + "</td>";
                                                        html += "<td><a style='color:red;'><i class='glyphicon glyphicon-fire'></i></a><span>" + data[i].goodname + "</span></td>";
                                                        html += "<td><span style='color:red;'>" + data[i].price + "元</span></td>";
                                                        html += "<td><span style='color:#0000FF;'>" + data[i].kucun + "张</span></td>";
                                                        if (data[i].kucun <= 0) {
                                                            html += "<td>" + '<div class="input-spinner"><button type="button" disabled  class="btn btn-default">-</button><input type="text" class="form-control size-1" style="width: 50px;" value="0" readonly><button disabled type="button" class="btn btn-default">+</button></div>' + "</td>";
                                                        } else {
                                                            html += "<td>" + '<div class="input-spinner"><button type="button" onclick="js(this,' + data[i].kucun + ')" class="btn btn-default">-</button><input type="text" class="form-control size-1" style="width: 50px;" value="1"><button onclick="zj(this,' + data[i].kucun + ')" type="button" class="btn btn-default">+</button></div>' + "</td>";
                                                        }
                                                        html += "<td>" + zfpay() + "</td>";
                                                        if (data[i].kucun <= 0) {
                                                            html += "<td><a class='btn btn-info' disabled>购买</a></td>";
                                                        } else {
                                                            html += "<td><a onclick='sub(this)' class='btn btn-info'>购买</a></td>";
                                                        }
                                                        html += "</tr>";
                                                    }
                                                    $("#row_" + cateid).after(html);
                                                }
                                            })
                                        } else {
                                            $('#loading').hide();
                                        }
                                    }

                                    function sub(obj) {
                                        var rows = obj.parentNode.parentNode.rowIndex;
                                        var goodid = $("#tableform tr:eq(" + rows + ") td:eq(0)").html();
                                        $("[name=goodid]").val(goodid);
                                        var quantity = $("#tableform tr:eq(" + rows + ") td:eq(4)").find("input").val();
                                        $("[name=quantity]").val(quantity);
                                        var pid = $("#tableform tr:eq(" + rows + ") td:eq(5)").find("option:selected").val();
                                        $("[name=pid]").val(pid);
                                        var form = $("[name=p]");
                                        //console.log(form.serialize());
                                        showAjaxPostModal(form.attr("action"), form.serialize(), "确认订单-请勿重复刷新");
                                        return false;
                                    }
                                    function showAjaxPostModal(url, data, title) {
                                        jQuery('#modal-7').modal('show', { backdrop: 'static' });
                                        $.ajax({
                                            url: url,
                                            type: 'post',
                                            data: data,
                                            success: function (response) {
                                                $("html,body").animate({ scrollTop: 0 }, 300);
                                                jQuery('#modal-7 .modal-title').html(title);
                                                jQuery('#modal-7 .modal-body').html(response);
                                            }
                                        });
                                    }


                                    function zfpay() {

                                        var html = "<select id='pid' name='pid' class='form-control'>";
                                            <?php if($is_weixin_display): ?>
                                        html += "<option value='WEIXIN'>微信支付</option>"
                                        <?php endif; ?>
                                            <?php if($is_alipay_display): ?>
                                        html += "<option value='ALIPAY'>支付宝</option>"
                                        <?php endif; ?>
                                            <?php if($is_qqcode_display): ?>
                                        html += "<option value='QQCODE'>QQ钱包</option>"
                                        <?php endif; ?>
                                          <?php if($is_alipay_mq_display): ?>
                                        html += "<option value='MQPAY'>支付宝支付</option>"
                                        <?php endif; ?>
                                         <?php if($is_wx_mq_display): ?>
                                        html += "<option value='MQWXPAY'>微信支付</option>"
                                            <?php endif; ?>
                                        html += "</select>"
                                        return html;
                                    }

                                    function selectgoodid(goodid) {
                                        $('#loading').show();
                                        $.post('ajaxlist.php', { action: 'getgoodInfo', goodid: goodid }, function (data) {
                                            if (data) {
                                                var html = "";
                                                var d = data.split(',');
                                                html += "<tr>";
                                                html += "<td style='display:none;'>" + goodid + "</td>";
                                                html += "<td><a style='color:red;'><i class='glyphicon glyphicon-fire'></i></a><span><?php echo $goodname ?></span></td>";
                                                html += "<td><span style='color:red;'>" + d[0] + "元</span></td>";
                                                html += "<td><span style='color:#0000FF;'>" + d[2] + "张</span></td>";
                                                if (d[2] <= 0) {
                                                    html += "<td>" + '<div class="input-spinner"><button type="button" disabled  class="btn btn-default">-</button><input type="text" class="form-control size-1" style="width: 50px;" value="0" readonly><button disabled type="button" class="btn btn-default">+</button></div>' + "</td>";
                                                } else {
                                                    html += "<td>" + '<div class="input-spinner"><button type="button" onclick="js(this,' + d[2] + ')" class="btn btn-default">-</button><input type="text" class="form-control size-1" style="width: 50px;" value="1"><button onclick="zj(this,' + d[2] + ')" type="button" class="btn btn-default">+</button></div>' + "</td>";
                                                }
                                                html += "<td>" + zfpay() + "</td>";
                                                if (d[2] <= 0) {
                                                    html += "<td><a class='btn btn-info' disabled>购买</a></td>";
                                                } else {
                                                    html += "<td><a onclick='sub(this)' class='btn btn-info'>购买</a></td>";
                                                }
                                                html += "</tr>";
                                                $("#tableform").append(html);
                                            }
                                        })
                                    }
                                </script>

                                <table class="table table-condensed table-hover" id="tableform">
                                    <thead>
                                        <tr>
                                            <th class="col-sm-6">商品标题</th>
                                            <th class="col-sm-1">单价</th>
                                            <th class="col-sm-1">库存</th>
                                            <th class="col-sm-2">购买数量</th>
                                            <th class="col-sm-1">支付方式</th>
                                            <th class="col-sm-1">操作</th>
                                        </tr>

                                    </thead>

                                    <tbody>
                                        <?php if(!$goodid): ?>
                                        <?php if($cateid):?>
                                        <tr id="row_<?php echo $cateid ?>">
                                            <td>
                                                <span class="text-danger"><?php echo $catename ?></span>
                                                <input type="hidden" name="cateid" id="cateid" value="<?php echo $cateid ?>" />
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <script>
                                            selectcateid(<?php echo $cateid ?>);
                                        </script>
                                        <?php else: ?>

                                        <?php
                                                  if($goodCate):
                                                      foreach($goodCate as $key=>$val):
                                                          if($val['userid']==$userid):
                                        ?>
                                        <tr id="row_<?php echo $val['id'] ?>">
                                            <td>
                                                <a style="color: red;"><i class="entypo-thumbs-up"></i></a>

                                                <span style="color: red; font-weight: bold;">
                                                    <?php echo $val['catename'] ?></span>
                                                <input type="hidden" name="cateid" value="<?php echo $val['id'] ?>" />
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr id="loading" style="display: none">
                                            <td>
                                                <img src="orange/images/load.gif" />加载中...</td>
                                        </tr>
                                        <script>
                                            selectcateid(<?php echo $val['id'] ?>);
                                        </script>
                                        <?php
                                                          endif;
                                                      endforeach;
                                                  endif;
                                        ?>

                                        <?php endif;?>
                                        <?php endif; ?>

                                        <?php if($goodid):?>

                                        <script>
                                            selectgoodid(<?php echo $goodid ?>);
                                        </script>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-md-12">
                <div class="panel panel-default hidden-sm hidden-xs">
                    <div class="panel-heading" style="background: #2D89EF; color: #fff;">
                        <div class="panel-title"><em class="fa fa-list"></em>免责声明</div>
                    </div>
                    <div class="panel-body">
                        <p class="text-red">向陌生人付款，请注意交易风险，否则造成的经济损失自负！</p>
                        <p>本站仅是提供自动发卡服务，并非销售商，相关售后问题并不负责，由此产生的交易纠纷由双方自行处理，与本平台无关！</p>
                        <p>如果您在支付过程中遇到虚假商品或取卡问题，请与我们联系。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->


    <div id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="H1" class="modal-title">购买提示</h4>
                </div>
                <div class="modal-body">
                    <?php echo str_replace(PHP_EOL,'<br>',$siteintr) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="H2" class="modal-title">网站提示</h4>
                </div>
                <div class="modal-body">
                    <?php echo str_replace(PHP_EOL,'<br>',$user_popup_message) ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        Content is loading...
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">关闭</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/atest/assets/js/bootstrap.js"></script>


    <!-- <script src="/lin/default/js/nyro.js" type="text/javascript"></script>-->

    <!--[if IE 6]><script type="text/javascript" src="baibian/static/js/nyromodal-ie6.min.js"></script><![endif]-->

    <div style="display: none">
        <?php if($statistics) echo $statistics ?>
        <?php if($config['tongji']) echo $config['tongji'] ?>
    </div>

    <script>
       
          <?php if($is_user_popup): ?>
        $('#myModal3').modal('show');
        <?php endif; ?>

        function showAjaxModal(url, title) {
            jQuery('#modal-7').modal('show', { backdrop: 'static' });
            $.ajax({
                url: url,
                success: function (response) {
                    $("html,body").animate({ scrollTop: 0 }, 300);
                    jQuery('#modal-7 .modal-title').html(title);
                    jQuery('#modal-7 .modal-body').html(response);
                }
            });
        }
        function js(obj, kc) {
            if (kc == 0) {
                $(obj).next("input").val(0)
            } else {
                var val = $(obj).next("input").val();
                if (val == 1) {
                    return;
                } else {
                    $(obj).next("input").val(val - 1);
                }
            }
        }
        function zj(obj, kc) {

            var val = $(obj).prev("input").val();
            if (parseInt(val) >= kc) {
                $(obj).prev("input").val(kc);
                alert("已达到库存最大数量");
            } else {
                $(obj).prev("input").val(parseInt(val) + 1);
            }
        }
    </script>
</body>
</html>
