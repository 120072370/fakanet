<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
<!--
.STYLE1 {color: #FFFFFF}
-->
</style>

<div class="footer">
			<div class="newFooter">
				<div class="newFooterList_2">
					<dl>
						<dt>
							常见问题
						</dt>
						<dd>
							<ul>
								<li>
									<a href="/faq.htm">
										帮助中心									</a>								</li>
								<li>
									<a href="/faq.htm">
										结算周期									</a>								</li>
								<li>
									<a href="/detail.htm">
										防御部署									</a>								</li>
								<li>
									<a href="/goumai.htm">
										购买流程									</a>								</li>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="newFooterList_2">
					<dl>
						<dt>
							企业文化
						</dt>
						<dd>
							<ul>
								<li>
									<a href="/about.htm">
										关于我们									</a>								</li>
								<li>
									<a href="/course.htm">
										发展历程									</a>								</li>
								<li>
									<a href="/qiye.htm">
										企业资质									</a>								</li>
								<li>
									<a href="/recruitment.htm">
										人才招聘									</a>								</li>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="newFooterList_2">
					<dl>
						<dt>
							商务合作
						</dt>
						<dd>
							<ul>
								<li>
									<a href="/sendcode.htm">
										账号注册									</a>								</li>
								<li>
									<a href="/contact.htm">
										投诉建议									</a>								</li>
								<li>
									<a href="/useful.htm" target="_blank">
										服务协议									</a>								</li>
								<li>
									<a href="/useful.htm">
										使用条款									</a>								</li>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="newFooterList_2">
					<dl>
						<dt>
							联系我们						</dt>
						<dd>
							<ul>
								<li class="STYLE1"><span style="font-size: small;"><a href="/"><?php echo $this->config['tel'] ?></a></span></li>
								<li class="STYLE1">
									企业QQ<a href="tencent://message/?uin=<?php echo $this->config['qq'] ?>">：<?php echo $this->config['qq'] ?></a></li>
								<li>
									<a href="/contact.htm">
										联系我们									</a>								</li>
							</ul>
						</dd>
					</dl>
			  </div>
				<div class="newFooterList_2">
					<dl>
						<dt>关注我们</dt>
						<dd>
							<ul>
								<li class="list_none">
									<img src="/tpl/new/Skin/Home/Red/images/917_code.jpg">
								</li>
							</ul>
						</dd>
					</dl>
				</div>
			</div>
			<div class="copyright">
				<a href="/statement.htm" target="_blank">
					免责声明				</a>|
				<a href="/useful.htm" target="_blank">
					使用条款				</a>|
				<a href="xieyi.doc" target="_blank">
					服务协议				</a>
				<p><span class="center foot_wenzi STYLE1"><?php echo date('Y') ?> <?php echo $this->config['copyright'] ?>
                <?php if($this->config['icp']): ?>
                <a href="http://www.miibeian.gov.cn" target="_blank"> <?php echo $this->config['icp'] ?> </a>
                <?php endif; ?>
                <?php echo $this->config['tongji'] ?></span><br>
			  
  </div>
</div>
		<div style="display: none">
			<script src="https://s11.cnzz.com/z_stat.php?id=1261494537&web_id=1261494537" language="JavaScript"></script>
			</script>
		</div>
	</body>
</html>
