<?php if(!defined('WY_ROOT')) exit; ?>
	<div id="footer">
	    <div id="footer_nav">
        <a href="statement.htm">免责声明</a><span>|</span>
        <a href="about.htm">关于我们</a><span>|</span>
        <a href="settlement.htm">结算模式</a><span>|</span>
        <a href="faq.htm">常见问题</a><span>|</span>
        <a href="contact.htm">联系我们</a>
        </div>
		<div id="copyright">
			<p>版权所有 &copy <?php echo date('Y') ?> <?php echo $this->config['copyright'] ?> <?php if($this->config['icp']): ?> <a href="http://www.miibeian.gov.cn" target="_blank"> <?php echo $this->config['icp'] ?> </a> <?php endif; ?> <?php echo $this->config['tongji'] ?></p>
            <p>Powered by <a href="http://www.www.a8tg.com/" target="_blank">扎兰屯市爱发网络科技有限公司</a></p><script src="https://s11.cnzz.com/z_stat.php?id=1261494537&web_id=1261494537" language="JavaScript"></script>
		</div>
	</div>
</div>
</body>
</html>
