<?php if(!defined('WY_ROOT')) exit;?>


<div class="slider-menu-bar">
            <div id="slider" class="mui-slider hd-mn-list-show bg-fff box-shadow">
                <div class="mui-slider-group mui-slider-loop">
                    <div class="mui-slider-item mui-active">
                        <ul class="hd-mn-item clearfix">
                            <li class="mn-list-cr"><a href="about.htm">
                                <p><i class="icon-hualv icon-unie929 mn-be"></i></p>
                                关于我们</a></li>
                            <li class="mn-list-cr"><a href="contact.htm">
                                <p><i class="icon-hualv icon-unie927 mn-gn"></i></p>
                                客服中心</a></li>
                            <li class="mn-list-cr"><a href="news.htm">
                                <p><i class="icon-hualv icon-unie928 mn-vt"></i></p>
                                最新动态</a></li>
                            <li class="mn-list-cr"><a href="/login.htm">
                                <p><i class="icon-hualv icon-unie92a mn-red"></i></p>
                                商户登陆</a></li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
<div class="ad288a">
            <p class="f24 s-c333 tc">发卡就上微奇发卡网</p>
            <p class="f12 s-be tc"><span>快速</span><span>稳定</span><span>低费率</span></p>
            <img src="/tpl/mobile_a8tg_com/images/lpic34.jpg">
        </div>
<div class="fuwu-zs bg-fff box-shadow">
            <h2 class="h35-title">历年业绩</h2>
            <ul class="clearfix mt10">
                <li>
                    <p>商家入驻</p>
                    <p><span>1240+</span> 家</p>
                </li>
                <li>
                    <p>往年订单量</p>
                    <p><span>3500</span>万+</p>
                </li>
                <li>
                    <p>平台访问量</p>
                    <p><span>12</span> 亿</p>
                </li>
            </ul>
        </div>

<div class="pt20 bg-fff box-shadow mt10">
            <p class="h35-title">平台动态</p>
            <div class="tab-hot-bar mt15">
                <div class="mui-slider">
                        <div id="item1mobile" class="mui-slider-item mui-control-content mui-active">
                            <ul>
                                	<?php
                                    global $wddb;
                                    $list=$wddb->getall("select * from ".DB_PREFIX."news where classid=1 and is_display_home = 1 order by id desc limit 0,6");
                                    foreach ($list as $k => $v) {
                                        echo '<li><a href="view.htm?id='.$v['id'].'" >'.$v['title'].'</a></li>';			
                                    }
                                    ?>
                            </ul>
                            <a href="news.htm" class="more-btn more-btn-bortop mt10">查看更多</a>
                        </div>
                    </div>
            </div>
        </div>
<div class="pad-tb20-lr15 bg-fff box-shadow mt10">
            <h2 class="h35-title">支付渠道</h2>
            <ul class="hot-spec clearfix mt20">
               <li><a href="#"><div class="lzj"><img src="/images/weiqi/ad1.jpg"  /></div></a></li>
               <li><a href="#"><div class="lzj"><img src="/images/weiqi/ad2.jpg"  /></div></a></li>
               <li><a href="#"><div class="lzj"><img src="/images/weiqi/ad3.jpg"  /></div></a></li>
               <li><a href="#"><div class="lzj"><img src="/images/weiqi/ad4.jpg"  /></div></a></li>
               <li><a href="#"><div class="lzj"><img src="/images/weiqi/ad5.jpg"  /></div></a></li>
               <li><a href="#"><div class="lzj"><img src="/images/weiqi/14605162876760.png"  /></div></a></li>
            </ul>
        </div>