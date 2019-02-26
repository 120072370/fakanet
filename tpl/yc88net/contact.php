<?php
if (!defined('WY_ROOT'))
	exit ;
 ?>
<div class="banner">
    <div class="slide">
        <img src="tpl/yc88net/picture/banner3.jpg" />
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

    .contact-wrapper {
        width: 100%;
        max-width: 100%;
    }

    .contact_us dl {
        line-height: 40px;
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
<div class="main">
    <div class="main-content" style="margin: 30px auto;">
        <div class="page_header">
            <h1>联系方式</h1>
            <div class="recent">
                <span>
                    当前位置：
                    <a href="/">首页</a>&gt; 联系方式
                </span>
            </div>
        </div>
       <div class="page_content">
            <div class="left_nav">
                   <ul>
                    <li>

                        <a href="/about.htm">关于我们</a>
                     </li>
                    <li class="active">

                        <a href="/contact.htm">联系我们</a>
                    </li>
                    <li>
                        <a href="/faq.htm">帮助中心</a>
                    </li>
                    <li>
                        <a href="/qiye.htm">企业资质</a>
                    </li>
                    <li>
                        <a href="/goumai.htm">购买流程</a>
                    </li>
					<li>
                        <a href="/statement.htm">免责声明</a>
                    </li>
                    <li>
                        <a href="/useful.htm">使用条款</a>
                    </li>
                    <li>
                        <a href="/course.htm">发展历程</a>
                    </li>
                </ul>
            </div>
            <div class="center_text">
                <h2>联系我们</h2>
                <div class="contact_us">
                    <dl class="dl-horizontal">
                        <dt>电话：<?php echo $this->config['tel'] ?></dt>
                        <dt>Q&nbsp;&nbsp;Q：<?php echo $this->config['qq'] ?></dt>
                        <dt>
                            邮箱：
                            <a href="mailto:<?php echo $this->config['servicemail'] ?>"><?php echo $this->config['servicemail'] ?>
</dt>
                        <dt>公司地址：<?php echo $this->config['address'] ?></dt>
                        <dt>&nbsp;</dt>
                    </dl>
                </div>
                <div class="contact-wrapper" style="">
                    <a href="">
                        
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>