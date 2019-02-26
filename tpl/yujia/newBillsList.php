<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>最新动态</title>
    <link href="/tpl/slwka/Css/global.css" rel="stylesheet" type="text/css" />
    <link href="/tpl/slwka/Css/Public.css" rel="stylesheet" type="text/css" />
    <link href="../css/index.css" rel="stylesheet" type="text/css" />
    <script src="/tpl/slwka/js/jquery.min.js"></script>
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
    <style type="text/css">
<!--
.STYLE3 {color: #FF3300}
.STYLE4 {color: #3366FF}
-->
    </style>
</head>
<body>
    <div class="t_news" align="left">
        <ul class="news_li">
        	<?php



        	?>
                <li class="STYLE3" style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden">羽佳自动发卡2015特别版正式上线！                    </li>
                <li class="STYLE4" style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden">羽佳客服QQ88888888，有任何问题欢迎前来咨询！</li>
                                    <li class="STYLE3" style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden">羽佳自动发卡2015特别版正式上线！ </li>
            <li class="STYLE4" style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;
                white-space: nowrap; overflow: hidden">羽佳客服QQ888888888，有任何问题欢迎前来咨询！</li>
        </ul>
        <ul class="swap">
        </ul>
</div>
</body>
</html>