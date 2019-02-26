
		<div class="content">
			<div class="box gonggao">
				<h1>
					网站公告
				</h1>
				<div class="gonggao_dl">
					<?php
					global $wddb;
					$news=$wddb->getall("select * from ".DB_PREFIX."news where classid=9 and is_display_home=1");
					foreach($news as $k=>$v){	
					?>
					<dl <?php if($k==2){echo 'class="last"';}?>>
						<dt>
							<span><?php echo $v['title'];?></span>
							<br />
							<?php echo strip_tags($v['content']);?>
						</dt>
						<dd>
							<?php echo $v['addtime'];?>
						</dd>
					</dl>
					<?php }?>
				</div>
			</div>
			<div class="box youshi">
				<h1>
					核心优势
				</h1>
				<div class="youshi_dl">
					<dl>
						<dt>
							<img src="/tpl/new/Skin/Home/Red/images/917_img1.jpg" />
						</dt>
						<dd>
							<span>极速发卡</span>
							<br />
							（SPEED CARD）
							<br />
							<br />
						</dd>
						<dd>
							自动发卡1秒急速响应
							<br />
							省时省心省力，
							<br />
							结算费率低，利润高
						</dd>
					</dl>
					<dl>
						<dt>
							<img src="/tpl/new/Skin/Home/Red/images/917_img2.jpg" />
						</dt>
						<dd>
							<span>自动结算</span>
							<br />
							（Automatic settlement）
							<br />
							<br />
						</dd>
						<dd>
							卡密销售过程中，
							<br />
							对每笔订单都认真对待，
							<br />
							不丢单不黑单，隔天自动结算
						</dd>
					</dl>
					<dl>
						<dt>
							<img src="/tpl/new/Skin/Home/Red/images/917_img3.jpg" />
						</dt>
						<dd>
							<span>安全保障</span>
							<br />
							（security）
							<br />
							<br />
						</dd>
						<dd>
							24小时监视订单
							<br />
							和资金安全，确保发卡效率
							<br />
							集群DDos防御部署，网站安全无忧
						</dd>
					</dl>
					<dl class="last">
						<dt>
							<img src="/tpl/new/Skin/Home/Red/images/917_img4.jpg" />
						</dt>
						<dd>
							<span>踏实放心</span>
							<br />
							（Rest assured）
							<br />
							<br />
						</dd>
						<dd>
							同声相应 同气相应
							<br />
							这就是917发卡的服务宗旨
							<br />
							选择我们让你放心 、省心 、安心
						</dd>
					</dl>
				</div>
			</div>
			<div class="box bushu">
				<h1>
					防御部署
				</h1>
				<div class="bushu_dl">
					<a href="/detail.htm">
						<img src="/tpl/new/Skin/Home/Red/images/917_bgImg.jpg" border="0" />					</a>				</div>
			</div>
			<div class="box liucheng">
				<h1>
					合作流程
				</h1>
				<div class="liucheng_dl">
					<div class="liucheng_img">
						<img src="/tpl/new/Skin/Home/Red/images/917_bgSImg.jpg" />
					</div>
					<ul>
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
			<div class="box huoban">
				<h1>
					合作伙伴
				</h1>
				<div class="huoban_dl">
					<ul>
						<li>
							<img src="/tpl/new/Skin/Home/Red/images/917_ad1.jpg" />
						</li>
						<li>
							<img src="/tpl/new/Skin/Home/Red/images/917_ad2.jpg" />
						</li>
						<li>
							<img src="/tpl/new/Skin/Home/Red/images/917_ad3.jpg" />
						</li>
						<li>
							<img src="/tpl/new/Skin/Home/Red/images/917_ad4.jpg" />
						</li>
						<li>
							<img src="/tpl/new/Skin/Home/Red/images/917_ad5.jpg" />
						</li>
					</ul>
				</div>
			</div>
			<div class="safely">
			</div>
		</div>
		