<?php if(!defined('WY_ROOT')) exit; ?>
   <!--{content-->
        <!--banner-->
        <div class="banner">
            <ul>
               
                <li>
                    <img src="tpl/weiqi/content/webimages/lpic28.jpg" alt="1">
                    <div class="bannerconbox">
                        <div class="bannercon">
                            <h3>最值得信赖的发卡平台</h3>
                            <h4>全方位的虚拟物品交易平台</h4>
                            <dl class="left1">
                                <dt>9320<em>+</em></dt>
                                <dd>注册商家数</dd>
                            </dl>
                          
                            <dl class="middle1">
                                <dt>3500<i>万</i><em>+</em></dt>
                                <dd>2017年交易次数</dd>
                            </dl>
                        </div>
                    </div>
                </li>

            </ul>
            <a href="javascript:;" class="bannerPrev bannerbtn"></a>
            <a href="javascript:;" class="bannerNext bannerbtn"></a>
        </div>
        <div class="Online">
            <h3>用户登陆/USERLOGIN</h3>
            <form method="post" action="userlogin.htm" id="loginForm">
                <ul>
                    <li><span>用户名：</span><i><input id="username" name="username" placeholder="手机号/用户名" class="m-btn" type="text"></i></li>
                    <li><span>密码：</span><i><input class="m-btn" id="password" name="password" type="password"></i></li>
                    <li><span>验证码</span><i><input class="m-btn code"  name="chkcode" id="chkcode" type="text"  maxlength="4" tabindex="3">
                     &nbsp;<img align="bottom"  onclick="javascript:this.src = this.src + '?t=new Date().getTime()';return false;" 
                     src="/includes/libs/chkcode.htm" title="看不清，换一个"  style="width:100px;height:35px; vertical-align: middle;"/>
                                                                    </i></li>
                                                                    <li><span>&nbsp;</span><a hidefocus="true" class="a_1" title="忘记密码？" href="/retpwd.htm">忘记密码？</a></li>
                    <li><span>&nbsp;</span><i><input class="m-submit" type="button" onClick="return checkForm();"  value="立即登陆">
                    <a class="m-reg" href="register.htm">立即注册</a></i>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    <!--业务领域-->
    <div class="page_init">
        <div class="InBusinessbox">
            <div class="InBusinesscon Indexcommon web">
                <h3>Core Advantages</h3>
                <h4>核心优势</h4>
                <p class="InBusinessconBtn">

                    <a href="javascript:;">多平台支付</a>

                    <a href="javascript:;">多维度服务</a>

                    <a href="javascript:;">多系统集成</a>

                </p>
                <script>$(".InBusinessconBtn a:first").addClass("cur");</script>
                <div class="InBusinessList01 InBusinessconSwitch">
                    <ul class="clearfix">
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/wxpay.png" alt="微信支付">
                            </p>
                            <span class="title">微信支付</span>
                        </li>

                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/zfbpay.png" alt="支付宝支付">
                            </p>
                            <span class="title">支付宝支付</span>
                        </li>
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/morepay.png" alt="QQ支付">
                            </p>
                            <span class="title">QQ钱包支付</span>
                        </li>
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/wypay.png" alt="网银支付">
                            </p>
                            <span class="title">网银支付</span>
                        </li>
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/cardpay.png" alt="卡支付">
                            </p>
                            <span class="title">卡支付</span>
                        </li>
                    </ul>
                </div>
                <div class="InBusinessList02 InBusinessconSwitch">
                    <p>
                        <a href="javascript:;" class="InBusinessPrev"></a>
                        <a href="javascript:;" class="InBusinessNext"></a>
                    </p>
                    <ul class="clearfix" style="width: 1080px; left: 0px;">

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/tj.png" alt="急速发货"></span><span class="title">极速发货</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/cch.png" alt="自动结算"></span><span class="title">自动结算</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/2016101810214404.jpg" alt="信息安全"></span><span class="title">信息安全</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/js.png" alt="信息推送"></span><span class="title">信息推送</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/ud.png" alt="安全保障"></span><span class="title">安全保障</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/vid.png" alt="弹性负载"></span><span class="title">弹性负载</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/2016101810225157.png" alt="基础网络"></span><span class="title">基础网络</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/wx.png" alt="微信推送"></span><span class="title">微信推送</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/mail.png" alt="邮箱通知"></span><span class="title">邮箱通知</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href="#"><span class="img">
                                    <img src="tpl/weiqi/img/kf.png" alt="客服24小时在线"></span><span class="title">客服24小时在线</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href=""><span class="img">
                                    <img src="tpl/weiqi/img/2016101810211262.jpg" alt="服务器安全防护"></span><span class="title">服务器安全防护</span></a>
                            </p>
                            <i></i>
                        </li>

                        <li>
                            <p>
                                <a href=""><span class="img">
                                    <img src="tpl/weiqi/content/webimages/lpic38.jpg" alt="移动互联"></span><span class="title">移动访问</span></a>
                            </p>
                            <i></i>
                        </li>

                    </ul>
                </div>
                <div class="InBusinessList03 InBusinessconSwitch">
                    <ul class="clearfix">

                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/2.jpg" alt="微奇互动云数据平台">
                            </p>
                            <h5>微奇互动云数据平台</h5>
                            <p class="hsh-p">
                                面向政府和企业，提供一站式云数据管理整合解决方案平台<br />
                            </p>
                            <i></i>
                        </li>
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/1410693.jpg" alt="微奇发卡平台">
                            </p>
                            <h5>微奇发卡平台</h5>
                            <p class="hsh-p">
                                资源整合平台，提供一站式虚拟交易平台
                                <br />
                            </p>
                            <i></i>
                        </li>
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/3.jpg" alt="互动营销">
                            </p>
                            <h5>微奇互动营销站</h5>
                            <p class="hsh-p">
                                提供一站式营销解决方案<br />
                            </p>
                            <i></i>
                        </li>
                        <li>
                            <p class="img">
                                <img src="tpl/weiqi/img/dzkf.jpg" alt="定制开发">
                            </p>
                            <h5>定制开发</h5>
                            <p class="hsh-p">
                                移动APP、网站、H5、系统集成、微信小程序定制开发，专业开发团队。<br />
                            </p>
                            <i></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     <div class="page_init">
        <div class="InNews">
            <div class="web">
                <h3>Latest News</h3>
                <h4>最新动态</h4>
                <ul class="clearfix">

                	<?php
            		global $wddb;
            		$list=$wddb->getall("select * from ".DB_PREFIX."news where classid=1 and is_display_home = 1 order by id desc limit 0,6");
					foreach ($list as $k => $v) {
						echo '<li><span class="title">'.$v['title'].'</span><span class="title1">'.$v['addtime'].'</span><a href="view.htm?id='.$v['id'].'" class="morenews">更多详情>></a></li>';			
					}
            		?>
                 
                </ul>

                <a href="news.htm" class="morenewsbtn">更多动态</a>

            </div>
        </div>
    </div>

    <!--历年业绩-->
    <div class="page_init">
        <div class="InPerformance">
            <div class="Indexcommon web">
                <h3>Performance</h3>
                <h4>往年业绩</h4>

                <ul class="clearfix">
                    <li class="clearfix">
                        <p class="p1"><em>订单数</em></p>
                        <p class="p2"><span class="Line" time="10" rel="4750"></span>万</p>
                    </li>
                    <li class="clearfix">
                        <p class="p1"><em>平台访问量</em></p>
                        <p class="p2"><span class="Line" time="10" rel="12"></span>亿次</p>
                    </li>
                    <li class="clearfix">
                        <p class="p1"><em>交易金额</em></p>
                        <p class="p2"><span class="Line" time="10" rel="6230"></span><em class="e1">万</em></p>
                    </li>
                </ul>

            </div>
        </div>
    </div>
    <!--最新动态-->
   

    <!--地图-->
    <div class="page_init">
        <div class="InMap">
            <div class="Indexcommon web clearfix">
                <h3>Service Customer Coverage</h3>
                <h4>服务顾客覆盖</h4>
                <p class="InMapConTitle">平台服务全球客户上千万，平台日访问量破百万级别</p>
                <div class="InMapConLeft">
                    <dl>
                        <dt>9<em>个</em></dt>
                        <dd>分布国家</dd>
                    </dl>
                    <dl>
                        <dt>4200<em>万</em></dt>
                        <dd>覆盖人群</dd>
                    </dl>
                </div>

                <div class="InMapCon">

                    <p class="citybtn" style="left: 215px; top: 182px;" position="0">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="中国">中国</a>
                    </p>

                    <p class="citybtn" style="left: 227px; top: 268px;" position="0">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="老挝">老挝</a>
                    </p>

                    <p class="citybtn" style="left: 195px; top: 305px;" position="1">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="缅甸">缅甸</a>
                    </p>

                    <p class="citybtn" style="left: 266px; top: 329px;" position="0">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="柬埔寨">柬埔寨</a>
                    </p>

                    <p class="citybtn" style="left: 235px; top: 336px;" position="1">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="泰国">泰国</a>
                    </p>

                    <p class="citybtn" style="left: 212px; top: 402px;" position="1">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="马来西亚">马来西亚</a>
                    </p>

                    <p class="citybtn" style="left: 317px; top: 387px;" position="0">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="新加坡">新加坡</a>
                    </p>

                    <p class="citybtn" style="left: 385px; top: 314px;" position="0">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="菲律宾">菲律宾</a>
                    </p>

                    <p class="citybtn" style="left: 321px; top: 430px;" position="0">
                        <img src="tpl/weiqi/content/webimages/lpic68.png"><a href="javascript:;" rel="印尼">印尼</a>
                    </p>

                </div>
                <script>
                    $.each($(".citybtn[position=1]"), function () {
                        $(this).find("img").addClass("indexMap");
                    })
                </script>
            </div>
        </div>
    </div>
    <!--content}-->