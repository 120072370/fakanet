<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
<!--
.STYLE1 {color: #FFFFFF}
-->
</style>

 
    <div class="footer">
        <div class="foot-content">
            <div class="footer_nav">
                <dl>
                    <dt>
                        <img src="tpl/yc88net/picture/phone_icon.gif">
                    </dt>
                    <dd title="客服电话">客服电话：<?php echo $this->config['tel'] ?></dd>
                    <dd>
                        电子邮箱：
                        <a title="电子邮箱" href="Mailto:<?php echo $this->config['servicemail'] ?>"><?php echo $this->config['servicemail'] ?></a>
                    </dd>
                    <dd>
                        在线交谈：
                        <a title="在线交谈" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $this->config['qq'] ?>&amp;site=qq&amp;menu=yes" target="_blank" class="more">
                            <i class="talkqq"></i><?php echo $this->config['qq'] ?>
                        </a>
                    </dd>
                    <dd>
                        <a title="更多联系方式" href="/contact.htm">更多联系方式</a>
                    </dd>
                </dl>
                <dl>
                    <dt>关于我们</dt>
                    <dd>
                        <a title="公司介绍" href="/about.htm">公司介绍</a>
                    </dd>
                    <dd>
                        <a title="公司资质" href="/qiye.htm">公司资质</a>
                    </dd>
                    <dd>
                        <a title="联系我们" href="/contact.htm">联系我们</a>
                    </dd>
                    <dd>
                        <a title="合作伙伴" href="#">合作伙伴</a>
                    </dd>
                </dl>
                <dl>
                    <dt>商务合作</dt>
                    <dd>
                        <a title="账号注册" href="/sendcode.htm">账号注册</a>
                    </dd>
                    <dd>
                        <a title="投诉建议" href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo $this->config['qq'] ?>&amp;site=qq&amp;menu=yes" target="_blank">投诉建议</a>
                    </dd>
                    <dd>
                        <a title="服务条款" href="/statement.htm">免责声明</a>
                    </dd>
                    <dd>
                        <a title="使用条款" href="/useful.htm">使用条款</a>
                    </dd>
                </dl>
                <dl>
                    <dt>手机后台</dt>
                    <dd>
                        <img src="tpl/yc88net/picture/wapimg.png">
                    </dd>
                </dl>
            </div>
        </div>
        <div class="footer_bot">
            <div class="footer_copy">
                <p class="STYLE1"><?php echo $this->config['copyright'] ?> 版权所有 <?php echo date('Y') ?>-2025年</p>
				 <span class="STYLE1 STYLE1">
				 <?php if($this->config['icp']): ?>
                 <a href="http://www.miibeian.gov.cn" target="_blank"> <?php echo $this->config['icp'] ?> </a>
                 <?php endif; ?>
                 <?php echo $this->config['tongji'] ?></span><span class="STYLE1"></span></span><br>
				<p><a key ="5813023aefbfb014cd568586"  logo_size="83x30"  logo_type="realname"  href="http://www.anquan.org" ><script src="js/aq_auth.js"></script></a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(".header_nav").mouseenter(function () {
            $(this).css("background-color", "#000000");
        }).mouseleave(function () {
            $(this).css("background", "none");
        });</script>
