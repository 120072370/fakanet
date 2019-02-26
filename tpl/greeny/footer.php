<?php if(!defined('WY_ROOT')) exit; ?>
	<script type="text/javascript">
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'tpl/greeny/common/images/onLoad.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
			});
		});
	</script>

<script type="text/javascript">
$(function(){
	 $(".imoblie").powerFloat({
	  target: "moblie.html",
	  targetMode: "ajax"
});
});

$(function(){
   $('.boxy').boxy();
})
</script>

<div id="footer" class="b_clear">
    <div class="hezuo">
	  <div class="main">
	  <div class="hezuo-t">合作伙伴</div>
	  <ul class="b_clear">
	    <li><a href="http://xy2.163.com/" target=_blank><img src="tpl/greeny/common/images/footer/dhxy.gif" /></a></li>
        <li><a href="http://www.ga-me.com/cn/" target=_blank><img src="tpl/greeny/common/images/footer/jrwl.gif" /></a></li>
        <li><a href="http://mg.9you.com/web_v1/" target=_blank><img src="tpl/greeny/common/images/footer/jwt.gif" /></a></li>
        <li><a href="http://xyq.163.com/" target=_blank><img src="tpl/greeny/common/images/footer/mhxy.gif" /></a></li>
        <li><a href="http://www.qq.com/" target=_blank><img src="tpl/greeny/common/images/footer/qqgame.gif" /></a></li>
        <li><a href="http://www.snda.com/" target=_blank><img src="tpl/greeny/common/images/footer/sdwl.gif" /></a></li>
        <li><a href="http://www.the9.com/" target=_blank><img src="tpl/greeny/common/images/footer/the9.gif" /></a></li>
        <li><a href="http://www.10010.com/" target=_blank><img src="tpl/greeny/common/images/footer/zglt.gif" /></a></li>
        <li><a href="http://www.189.cn/" target=_blank><img src="tpl/greeny/common/images/footer/zgdx.jpg" /></a></li>
	  </ul>
	  </div>
	</div>
	<div class="footbg">
    <div class="main foot-info">
	<div id="footer_nav">
		<a href="statement.htm">免责声明</a><span>&nbsp;|&nbsp;</span>
		<a href="about.htm">关于我们</a><span>&nbsp;|&nbsp;</span>
		<a href="settlement.htm">结算模式</a><span>&nbsp;|&nbsp;</span>
		<a href="faq.htm">常见问题</a><span>&nbsp;|&nbsp;</span>
		<a href="contact.htm">联系我们</a>
	</div>
	<div id="copyright">
	    <p>商家客服专线：<?php echo $this->config['tel'] ?> 客服QQ：<?php echo $this->config['qq'] ?></p>
	    <p>版权所有 &copy <?php echo date('Y') ?> <?php echo $this->config['copyright'] ?> <?php if($this->config['icp']): ?> <a href="http://www.miibeian.gov.cn" target="_blank"> <?php echo $this->config['icp'] ?> </a> <?php endif; ?> <?php echo $this->config['tongji'] ?></p>
		<p>Powered by <a href="http://www.www.a8tg.com/" target="_blank">永纯电子科技有限公司</a></p>
	</div>
        <p>
		<a href="http://union.rising.com.cn/index/index.aspx" target="_blank"><img border="0" src="tpl/greeny/common/images/t1.gif" title="瑞星网站在线安全验证" /></a>
		<a href="https://sealserver.trustwave.com/compliance/cert.php?code=x4irdzWieVRIVGcyxZFEu3XmZidWgo&style=normal&size=105x54&language=en" target="_blank"><img border="0" src="tpl/greeny/common/images/t2.jpg" title="TrustWave在线支付安全认证"/></a>
		<a href="https://sealserver.trustwave.com/compliance/cert.php?code=x4irdzWieVRIVGcyxZFEu3XmZidWgo&style=normal&size=105x54&language=en" target="_blank"><img border="0" src="tpl/greeny/common/images/t3.jpg" title="TrustWave在线支付安全认证"/></a>
		<a href="http://www.315online.com.cn/" target="_blank"><img border="0" src="tpl/greeny/common/images/t4.gif" title="网上交易保障中心"/></a>
        <a href="http://www.miibeian.gov.cn" target="_blank"><img border="0" src="tpl/greeny/common/images/t5.gif" title="工信部备案"/></a>
        <a href="http://www.pingpinganan.gov.cn/web/index.aspx?spm=1.1000386.245549.27.krRh8D&file=index.aspx" target="_blank"><img border="0" src="tpl/greeny/common/images/t6.gif" title="杭州网警监督" /></a>
        </p>
		<script src="https://s11.cnzz.com/z_stat.php?id=1261494537&web_id=1261494537" language="JavaScript"></script>
	</div>
	</div>
</div><!--/footer end-->
</div><!--/全局结束-->
</body>
</html>
