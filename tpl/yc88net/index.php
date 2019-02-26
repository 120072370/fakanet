<?php if(!defined('WY_ROOT')) exit; ?>
         <link href="tpl/yc88net/css/web.css" rel="stylesheet" />
        <div class="banner">
            <div class="bannertxt">
                <h1 class="slogan" ><?php echo $this->config['sitename'] ?></h1>
                <h2 class="free" >做行业最专业的自动发卡平台</h2>
                
                <div class="regwrap clearfix">
                    <a class="index_head_info_downloadBtn" href="/sendcode.htm" role="button" ontouchstart="">立即注册</a>
					
                    <img src="tpl/yc88net/picture/wapimg.png" style="border:0px;width:120px;height:120px;display:none"  style="display:none"/>
                </div>
                <div class="regerror"></div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .banner {
            background: url(tpl/yc88net/images/banner1.jpg) center bottom no-repeat;
        }
        .bannertxt {
            width: 1000px;
            text-align: center;
            height: 420px;
            margin: 0px auto;
            padding-top: 150px;
            position: relative;
            color: #fff;
            line-height: 1.4;
        }
            .bannertxt h1.slogan {
                margin: 0;
                font-weight: 100;
                font-size: 50px;
                font-family: "Microsoft Yahei";
            }
            .bannertxt h2.free {
                margin: 0;
                font-size: 70px;
                font-weight: 100;
            }
        .regwrap {
            margin: 50px auto 0;
            width: 437px;
            height: 46px;
        }
        .index_head_info_downloadBtn {
            min-width: 164px;
            height: 46px;
            line-height: 45px;
            border-radius: 4px;
            font-size: 22px;
            -webkit-transition: all .2s;
            -moz-transition: all .2s;
            -o-transition: all .2s;
            transition: all .2s;
            display: inline-block;
            -webkit-font-smoothing: antialiased;
            text-align: center;
            padding: 0 14px;
            background: #ff9000;
            color: #fff;
            text-decoration: none;
        }
            .index_head_info_downloadBtn:hover {
                text-decoration: none;
                background-color: #ffa735;
                color: #fff;
            }
    </style>
    
<div class="main">
    <div class="main-content" style="padding: 100px 0 78px 0;">
        <div class="dabiaoti">
            <span>网站 & 公告</span>
        </div>
        <div class="new-moving">
            <div class="act-img">
                <div class="title">
                    资讯
                    <br>动态
                </div>
                <img src="tpl/yc88net/picture/news.jpg">
            </div>
            <ul class="word">
            		<?php
            		global $wddb;
            		$list=$wddb->getall("select * from ".DB_PREFIX."news where classid=1 order by id desc limit 0,5");
					foreach ($list as $k => $v) {
						echo '<li class=""><a href="view.htm?id='.$v['id'].'"><span class="time">['.$v['addtime'].']</span>'.$v['title'].'</a></li>';			
					}
            		?>
            </ul>
        </div>
        <div class="news-link"></div>
        <div class="new-moving">
            <div class="act-img">
                <div class="title">
                    通知
                    <br>公告
                </div>
                <img src="tpl/yc88net/picture/11.jpg">
            </div>
            <ul class="word">
                  <?php
            		global $wddb;
            		$list=$wddb->getall("select * from ".DB_PREFIX."news where classid=4 order by id desc limit 0,5");
					foreach ($list as $k => $v) {
						echo '<li class=""><a href="view.htm?id='.$v['id'].'"><span class="time">['.$v['addtime'].']</span>'.$v['title'].'</a></li>';			
					}
            		?>
            </ul>
        </div>
        <div class="news-link"></div>
        <div class="new-moving">
            <div class="act-img">
                <div class="title">
                    行业
                    <br>资讯
                </div>
                <img src="tpl/yc88net/picture/security.jpg">
            </div>
             <ul class="word">
                    <?php
            		global $wddb;
            		$list=$wddb->getall("select * from ".DB_PREFIX."news where classid=3 order by id desc limit 0,5");
					foreach ($list as $k => $v) {
						echo '<li class=""><a href="view.htm?id='.$v['id'].'"><span class="time">['.$v['addtime'].']</span>'.$v['title'].'</a></li>';			
					}
            		?>
            </ul>
        </div>
    </div>
</div>
<div class="main" style="background-image: linear-gradient(to top, #4272ef, #2577fe);">
    <div class="main-content">
        <div class="youshi-box">
            <div class="youshi-title">核心 & 优势</div>
            <div class="field-description">我们以用户的需求主导产品研发，提供丰富、高性能、稳定的产品和服务</div>
            <div class="youshi-main">
                <div class="product-sort data">
                    <div class="sort-name">
                        <div class="icon-bg">
                            <i class="proud-icon data"></i>
                        </div>极速发货
                        <i class="caret-white bottom"></i>
                    </div>
                    <ul class="product-list">
                        <li>
                            <span class="verticalAlign">自动发货,1秒急速响应</span>
                        </li>
                        <li>
                            <span class="verticalAlign">省时省心省力</span>
                        </li>
                        <li>
                            <span class="verticalAlign">结算费率低,利润高</span>
                        </li>
                    </ul>
                </div>
                <div class="product-sort cdn">
                    <div class="sort-name">
                        <div class="icon-bg">
                            <i class="proud-icon cdn"></i>
                        </div>自动结算
                        <i class="caret-white bottom"></i>
                    </div>
                    <ul class="product-list">
                        <li>
                            <span class="verticalAlign">商品销售过程中</span>
                        </li>
                        <li>
                            <span class="verticalAlign">对每笔订单都认真对待</span>
                        </li>
                        <li>
                            <span class="verticalAlign">不丢单不黑单,隔天自动清算</span>
                        </li>
                    </ul>
                </div>
                <div class="product-sort net">
                    <div class="sort-name">
                        <div class="icon-bg">
                            <i class="proud-icon jsuan"></i>
                        </div>信息推送
                        <i class="caret-white bottom"></i>
                    </div>
                    <ul class="product-list">
                        <li>
                            <span class="verticalAlign">多种信息推送方式</span>
                        </li>
                        <li>
                            <span class="verticalAlign">APP、邮件、短信实时发送</span>
                        </li>
                        <li>
                            <span class="verticalAlign">确保第一时间收到发货信息</span>
                        </li>
                    </ul>
                </div>
                <div class="product-sort sec">
                    <div class="sort-name">
                        <div class="icon-bg">
                            <i class="proud-icon sec"></i>
                        </div>安全保障
                        <i class="caret-white bottom"></i>
                    </div>
                    <ul class="product-list">
                        <li>
                            <span class="verticalAlign">24小时监视订单状态</span>
                        </li>
                        <li>
                            <span class="verticalAlign">确保资金安全和发货效率</span>
                        </li>
                        <li>
                            <span class="verticalAlign">不丢单不黑单,隔天自动清算</span>
                        </li>
                    </ul>
                </div>
                <div class="product-sort video">
                    <div class="sort-name">
                        <div class="icon-bg">
                            <i class="proud-icon video"></i>
                        </div>弹性负载
                        <i class="caret-white bottom"></i>
                    </div>
                    <ul class="product-list">
                        <li>
                            <span class="verticalAlign">多服务器负载及时容错</span>
                        </li>
                        <li>
                            <span class="verticalAlign">自如应对常见波动</span>
                        </li>
                        <li>
                            <span class="verticalAlign">全程无需人工干预</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main">
    <div class="main-content" style="padding: 100px 0 78px 0;">
        <div class="dabiaoti">
            <span>防御 & 部署</span>
        </div>
        <div>
            <img src="tpl/yc88net/picture/net.jpg" alt="">
        </div>
    </div>
</div>
<div class="main" style="background: #343434;">
    <div class="main-content" style="padding-top: 100px;">
        <img src="tpl/yc88net/picture/cp-banner.png" alt="">
        <div class="info">
            <h2>和您的品牌融为一体，接入您的平台</h2>
            <p>通过自定义的工具您可以自定义给客户展示的界面、域名来体现企业的品牌，同时也很方便集成您的用户系统 帮助中心、SSO单点登录、反馈 组件、Restful API、移动APP SDK</p>
        </div>
    </div>
</div>
<div class="main">
    <div class="main-content" style="padding: 10px 0 78px 0;text-align: center;">
        <p class="sms_main">
            电脑、手机、PAD多端通用，
            <span>信息同步</span>
        </p>
        <img src="tpl/yc88net/picture/12.jpg" alt="">
    </div>
</div>
<div class="main">
    <div class="main-content" style="padding: 0px 0 78px 0;text-align: center;">
        <div class="dabiaoti">
            <span>合作 & 流程</span>
        </div>
        <div>
            <img src="tpl/yc88net/picture/sbbg.jpg" alt="">
            <ul class="hzlc">
                <li>
                    <span>注册账户</span>
                </li>
                <li>
                    <span>商务审核</span>
                </li>
                <li>
                    <span>签订合同</span>
                </li>
                <li>
                    <span>上架商品</span>
                </li>
                <li>
                    <span>小额测试</span>
                </li>
                <li>
                    <span>上线销售</span>
                </li>
            </ul>
        </div>
    </div>
</div>


