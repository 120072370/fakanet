<?php
require_once '../../init.php';
?>
<div class="banner">
    <div class="slide">
        <img src="tpl/yc88net/picture/banner2.jpg" />
    </div>
</div>
<style type="text/css">
    .header {
        height: 330px;
    }

    .center_text h2 {
        margin-top: 25px;
        height: 80px;
        line-height: 80px;
        text-align: center;
        color: #1185e8;
        font-size: 24px;
        margin-bottom: 30px;
    }

    .center_text p {
        line-height: 36px;
    }
</style>
    </div>
<style type="text/css">
    .page_header {
        width: 100%;
        height: 100px;
        overflow: hidden;
        border-bottom: solid 1px #f0f0f0;
    }

        .page_header h1 {
            width: 194px;
            height: 100px;
            line-height: 100px;
            float: left;
            font-size: 40px;
            text-align: center;
        }

        .page_header .recent {
            width: 300px;
            height: 100px;
            line-height: 100px;
            float: right;
        }

    .page_content {
        width: 1198px;
        margin: 0 auto 50px 0;
        border-bottom: solid 1px #f0f0f0;
        border-left: solid 1px #f0f0f0;
        overflow: hidden;
    }

    .left_nav {
        width: 211px;
        float: left;
        margin-top: 25px;
    }

        .left_nav ul li {
            height: 50px;
            line-height: 50px;
            float: none;
            text-align: center;
        }

            .left_nav ul li.active {
                background: #1185e8;
            }

            .left_nav ul li a {
                display: inline-block;
                width: 194px;
                height: 50px;
                line-height: 50px;
            }

            .left_nav ul li.active a {
                color: #ffffff;
            }

    .center_text {
        width: 885px;
        float: right;
        border-left: solid 1px #f0f0f0;
        border-right: solid 1px #f0f0f0;
        padding: 0 50px 80px 50px;
        min-height: 550px;
    }
</style>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>最新动态</title>
    <link href="css/global.css" rel="stylesheet" type="text/css" />
    <link href="css/Public.css" rel="stylesheet" type="text/css" />
    <link href="css/index.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.min.js"></script>
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
    <div class="t_news" align="left" style="TOP:5PX">
        <ul class="news_li">
        	<?php
        	$db=Mysql::getInstance();
			$re=$db->query("SELECT * FROM ".DB_PREFIX."news where classid=3 order by id desc");
			if($db->num_rows($re)>0){
			    while($row=$db->fetch_array($re)){
					echo '<li style="text-align: left; width: 500px; text-overflow: ellipsis; display: block;white-space: nowrap; overflow: hidden"><a class="ls" title="'.$row['title'].'" href="/view.htm?id='.$row['id'].'" target="_blank">'.$row['title'].'</a> <span style="color: #f60">'.''.'
                    </span></li>';
				}
			}	
        	?>
            


        </ul>
        <ul class="swap">
        </ul>
    </div>
</body>
</html>
