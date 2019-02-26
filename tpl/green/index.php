<?php if (!defined('WY_ROOT')) exit; ?>

<div class="pf">
    <a href="#page1"><div class="li0"><i class="fa fa-arrow-up"></i></div></a>
    <div class="li1"><i class="fa fa-phone"></i> <b><?php echo $this->config['tel'] ?></b></div>
    <div class="li1"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes" rel="nofollow"><i class="fa fa-qq"></i> <b><?php echo $this->config['qq'] ?></b></a></div>
    <div class="li2"><i class="fa fa-qrcode"></i></div>
</div>
<div class="pf_ewm"><img src="/new2/qr-img.png" width="173" height="234"></div><!-- 内容页 -->
<div id="dowebok">
    <div class="section section1">
        <div id="container">
            <div class="s1_left">
                <p>全新购卡体验</p>
                <p>致力于解决虚拟商品的快捷寄售服务，为商户及其买家提供，便捷、绿色、安全、快速的销售和购买体验。</p>
                <p align="center"><img src="/new2/jiantou.png" alt="<?php echo $title;?>商户注册" width="30" height="52"></p>
                <p align="center"><a href="/register.htm" class="zc_btn"><i class="fa fa-edit" style="font-size:24px; vertical-align:middle"></i> <b>商户注册</b></a></p>
            </div>
            <div class="s1_right" data-wow-duration="1.6s">
                <form method="post" action="/userlogin.htm">
		    <p><img src="/new2/logo1.png" alt="" width="154" height="33"></p>
		    <p><i class="fa fa-user-o"></i>
			<input name="username" placeholder="用户名" type="text" value="" class="user" required></p>
		    <p><i class="fa fa-key"></i>
			<input name="password" type="password" placeholder="密码" class="user" required></p>


		    <p><i class="fa fa-key"></i>
			<input name="chkcode" type="text" placeholder="验证码" class="user" required><img style="width:70px; height:30px; " onclick="javascript:this.src = this.src + '?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码"  /></p>



		    <p><button class="dl_btn"><i class="fa fa-chevron-circle-right" style="font-size:24px; vertical-align:middle"></i> <b>商户登录</b></button></p>
		    <p><a href="/retpwd.htm" target="_blank" style=" color:#0acffe">忘记密码？</a></p>
                </form>
            </div>
            <div id="clear"></div>
        </div>
    </div>
    <div class="section section2">
        <div id="container">
            <div class="title"><img src="/new2/title1.png" alt="<?php echo $title;?>，不一样的体验" width="401" height="70"></div>
            <ul>
                <li>
                    <p><img src="/new2/pic1.png" alt="服务器安全" width="150" height="100" data-wow-duration="1s" data-wow-delay="0.3s"></p>
                    <p>服务器安全</p>
                    <p><?php echo $title;?>采用群集服务器，防御高，故障率低，无论用户身在何处，均能获得流畅安全可靠的体验。</p>
                </li>
                <li>
                    <p><img src="/new2/pic2.png" alt="界面简约" width="150" height="100" data-wow-duration="1s" data-wow-delay="0.3s"></p>
                    <p>界面简约</p>
                    <p>简约的UI交互体验可以给您一个体验度极高的商户后台，更好的下单体验。</p>
                </li>
                <li>
                    <p><img src="/new2/pic3.png" alt="资金保障" width="150" height="100" data-wow-duration="1s" data-wow-delay="0.3s"></p>
                    <p>资金保障</p>
                    <p><?php echo $title;?>商户的资金，次日即可结算，资金平均停留的时间不超过12小时，您的资金安全将得到充分的保障。</p>
                </li>
                <li>
                    <p><img src="/new2/pic4.png" alt="费率超低" width="150" height="100" data-wow-duration="1s" data-wow-delay="0.3s"></p>
                    <p>费率超低</p>
                    <p><?php echo $title;?>的支付渠道直接对接官方，直接去掉中间商的差价，因此我们可以给商户提供更低廉的费率。</p>
                </li>
                <li>
                    <p><img src="/new2/pic5.png" alt="持续更新" width="150" height="100" data-wow-duration="1s" data-wow-delay="0.3s"></p>
                    <p>持续更新</p>
                    <p><?php echo $title;?>系统持续更新，功能持续完善，让商户以及客户的体验不断接近完美是我们一直不变的追求！</p>
                </li>
            </ul>
            <div id="clear"></div>
            <a class="main_btn" href="/register.htm" target="_blank">注册成为商户</a>
        </div>
    </div>
    <div class="section section3">
        <div class="title"><img src="/new2/title2.png" alt="步骤简单" width="513" height="70"></div>
        <div id="container">
            <img src="/new2/lc.png" alt="注册流程" width="1201" height="397" id="lc_img" data-wow-delay="0.2s">
            <a class="main_btn" href="/register.htm">注册成为商户</a>
        </div>
    </div>
    <div class="section section4">
        <div class="title"><img src="/new2/title3.png" alt="<?php echo $title;?>的伙伴" width="525" height="70"></div>
        <div id="container">
            <ul>
                <li data-wow-delay="0.1s"><img src="/new2/zf1.png" alt="支付宝" width="205" height="60"><span><img src="/new2/zfb_on.png" alt="支付宝" width="205" height="60"></span></li>
                <li data-wow-delay="0.1s"><img src="/new2/zf3.png" alt="微信支付" width="213" height="60"><span><img src="/new2/wxzf_on.png" alt="微信支付" width="213" height="60"></span></li>
                <li data-wow-delay="0.1s"><img src="/new2/zf4.png" alt="QQ钱包支付" width="243" height="60"><span><img src="/new2/qqzf_on.png" alt="QQ钱包支付" width="243" height="60"></span></li>
                <li data-wow-delay="0.1s"><img src="/new2/zf2.png" alt="网银支付" width="233" height="60"><span><img src="/new2/yl_on.png" alt="网银支付" width="233" height="60"></span></li>
                <li data-wow-delay="0.4s"></li>
                <li data-wow-delay="0.4s"><img src="/new2/zf7.png" alt="点卡支付" width="200" height="60"><span><img src="/new2/dkzf_on.png" alt="点卡支付" width="200" height="60"></span></li>
                <li data-wow-delay="0.4s"><img src="/new2/zf6.png" alt="财付通" width="177" height="60"><span><img src="/new2/cft_on.png" alt="财付通" width="177" height="60"></span></li>
                <li data-wow-delay="0.4s"></li>

            </ul>
            <div id="clear"></div>
            <a class="main_btn" href="/register.htm" target="_blank">注册成为商户</a>
        </div>
    </div>
    <div class="section section5">
        <div id="container">
            <div class="about">12自动发卡平台，为<?php echo $title;?>网络有限公司旗下平台之一， 公司注册于2016年6月，注册资本300万，是一家专注互联网领域 ，致力于为用户提供一站式服务的创新型未来互联网企业。</div>
            <div class="fu1" data-wow-duration="1s" data-wow-delay="0.1s"><p>诚信永远是<?php echo $title;?>的经营之本，我们诚信、尊重、
                    爱护平台的每一位商户以及买家。</p></div>
            <div class="fu2" data-wow-duration="1s" data-wow-delay="0.2s"><p><?php echo $title;?>开发团队成员均有长达3年以上的开发经验，
                    匠心精神，铸就高品质体验。</p></div>
            <div class="fu3" data-wow-duration="1s" data-wow-delay="0.3s"><p>平台所有的支付渠道,均有<?php echo $title;?>平台自主申请对接
                    ,杜绝高费率第三方支付。</p></div>
            <div class="fu4" data-wow-duration="1s" data-wow-delay="0.4s"><p>平台每个商户都经过<?php echo $title;?>风控组筛选，商户信誉
                    有保障。</p></div>
        </div>
    </div>
    <div class="section section6">
        <div class="title"><img src="/new2/title4.png" alt="联系我们" width="523" height="70"></div>
        <div class="lx_box" data-wow-duration="1.6s" data-wow-delay="0.2s">
            <img src="/tpl/green/common/images/wxgzh.jpg" alt="二维码" width="250" height="250" style="float:left; margin-right:40px;">
            <p><i class="fa fa-qq"></i><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes" style="display: inline"><b style="font-size:30px; font-weight:bold; color:#0acffe"><?php echo $this->config['qq'] ?></b></a></p>
            <p><i class="fa fa-phone"></i> <b style="font-size:20px;"><?php echo $this->config['tel'] ?></b></p>
	      <p><i class="fa fa-map-marker"></i><?php echo $title;?>科技有限公司 </p>
        </div>
        <div class="foot">
            <div id="container">
                <p>
		    &copy <?php echo date('Y') ?> <?php echo $this->config['copyright'] ?> <?php if ($this->config['icp']): ?> <a href="http://www.miibeian.gov.cn" target="_blank"> <?php echo $this->config['icp'] ?> </a> <?php endif; ?> <?php echo $this->config['tongji'] ?>


		</p>
                <p>

		  <!-- 这里写认证logo代码  -->    

                </p>
            </div>
        </div>
    </div>
</div>
<script src="/new2/main.js"></script>
<script>
                            $(function () {
                                $('#dowebok').fullpage({
                                    scrollingSpeed: 300,
                                    loopBottom: true,
                                    anchors: ['page1', 'page2', 'page3', 'page4', 'page5', 'page6'],
                                    menu: '#menu',
                                    resize: false,
                                    scrollBar: true,
                                    afterRender: function () {
                                        wow = new WOW({
                                            animateClass: 'animated',
                                        });
                                        wow.init();
                                    }
                                });
                            });
</script>



