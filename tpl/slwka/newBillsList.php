<?php //if(!defined('WY_ROOT')) exit; ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>最新动态</title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link href="../global.css" rel="stylesheet" type="text/css" />
    <link href="../Public.css" rel="stylesheet" type="text/css" />
    <link href="../index.css" rel="stylesheet" type="text/css" />
    <script src="main/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function b() {
            t = parseInt(x.css('top'));
            y.css('top', '40px');
            x.animate({ top: t - 40 + 'px' }, 'slow'); //40为每个li的高度
            if (Math.abs(t) == h - 40) { //40为每个li的高度
                y.animate({ top: '0px' }, 'slow');
                z = x;
                x = y;
                y = z;
            }
            setTimeout(b, 3000); //滚动间隔时间 现在是3秒
        }
        $(document).ready(function () {
            $('.swap').html($('.news_li').html());
            x = $('.news_li');
            y = $('.swap');
            h = $('.news_li li').length * 20; //40为每个li的高度
            setTimeout(b, 3000); //滚动间隔时间 现在是3秒

        })
    </script>
    <meta name="GENERATOR" content="MSHTML 8.00.6001.23520">
</head>
<body>
    <div class="t_news" align="left">
        <ul class="news_li">
        	<?php

        	?>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="新注册用户发布商品须知" href="http://www.yc88.net"
                    target="_blank">新注册用户发布商品须知:</a> <span style="color: #f60">为了使您更加顺利地出售商品，将于即日起调整寄售商品...
                    </span><span style="color: #f00"></span></li>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="盛大卡充值恢复通知" href="http://www.yc88.net"
                    target="_blank">盛大卡充值恢复通知:</a> <span style="color: #f60">尊敬的用户您好！盛大一卡通充值已经恢复正常...</span><span
                        style="color: #f00"></span></li>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="点卡卖家销售管理条例调整公告" href="http://www.yc88.net"
                    target="_blank">点卡卖家销售管理条例调整公告:</a> <span style="color: #f60">为方便卖家发布商品，提高点卡发布商品质量，即日起...</span><span
                        style="color: #f00"></span></li>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="系统维护公告" href="http://www.yc88.net"
                    target="_blank">系统维护公告:</a> <span style="color: #f60">为了向您提供更优质的服务，永纯自动发卡平台将于2013年10月11日...</span><span
                        style="color: #f00"></span></li>


                                    <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="新注册用户发布商品须知" href="http://yczji.com"
                    target="_blank">新注册用户发布商品须知:</a> <span style="color: #f60">为了使您更加顺利地出售商品，将于即日起调整寄售商品...
                    </span><span style="color: #f00"></span></li>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="盛大卡充值恢复通知" href="http://bbs.yc88.net"
                    target="_blank">盛大卡充值恢复通知:</a> <span style="color: #f60">尊敬的用户您好！盛大一卡通充值已经恢复正常...</span><span
                        style="color: #f00"></span></li>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="点卡卖家销售管理条例调整公告" href="http://www.yc88.net"
                    target="_blank">点卡卖家销售管理条例调整公告:</a> <span style="color: #f60">为方便卖家发布商品，提高点卡发布商品质量，即日起...</span><span
                        style="color: #f00"></span></li>
            <li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden"><a class="ls" title="系统维护公告" href="http://www.ycfaka.com"
                    target="_blank">系统维护公告:</a> <span style="color: #f60">为了向您提供更优质的服务，365卡将于2013年10月11日...</span><span
                        style="color: #f00"></span></li>


        </ul>
        <ul class="swap">
        </ul>
    </div>
</body>
</html>