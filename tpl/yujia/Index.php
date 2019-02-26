<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
<!--
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
a {
	font-family: 新宋体;
}
-->
</style>

<div id="banner" class="pr">
		<div class="w100 oz">
			<div class="slider pr oz">
				<div class="bd">
					<ul>
						<li><a href=""><img src="tpl/yujia/images/tu.png" alt="" /></a></li>
						<li><a href=""><img src="tpl/yujia/images/tu1.png" alt="" /></a></li>
						<li><a href=""><img src="tpl/yujia/images/tu2.png" alt="" /></a></li>
					</ul>
				</div>
				<div class="hd pa">
					<ul>
						<li class="on"></li>
						<li></li>
						<li></li>
					</ul>
				</div>
			</div>	
		</div>
		<div class="login pa">
			<div class="login_cont f14">
				<form id="Default" runat="server" action="userlogin.htm" method="post">
					<div class="oz k">
						<span class="fl">账户名：</span>
						<input class="input_login wbcd" type="text" name="username" onkeydown="enterSearch(event);" value="请输入用户名" tabindex="1" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}" />
					</div>
					<div class="oz k">
						<span class="fl">登录密码：</span>
						<input class="input_login wbcd" type="password" id="password" name="password" onkeydown="enterSearch(event);" value="请输入登陆密码" tabindex="2" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}" />
					</div>
					
				  <div class="oz">
				    <div class="oz k fl">
							<span class="fl">验证码：</span>
							<input id="code"  name="chkcode" value="" maxLength="5"  type="text" class="fl" onblur="if(!value){value=defaultValue;}"  />
				    </div>
					    <p><img src="includes/libs/chkcode.htm" width="80" height="39" align="absmiddle" title="点击刷新验证码" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" /></p>
					    <p class="tc"><a href="/register.htm" class="cf">还没有商户账户？免费注册</a></p>

					    <div style="float: left; margin-left: 10px; display: inline;">
					</div>
            
		    
           <?php if(isset($_SESSION['login_username'])): ?>&nbsp;
            <a class="user_reg" href="usr/" style="color:red">&nbsp;商户中心</a><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span> <a class="user_logout" href="usr/login.php?action=logout">安全退出</a><span></span>
            <?php else: ?>
			
           <button type="submit" class="cf yh">登    录</button>
            <p>
              <?php endif; ?>
            </p>
            </div>

					<script type="text/javascript">
               if (top!=self)top.location=self.location;
                            function reloadcode() {
                                document.getElementById("randomming").src = "/code.aspx?" + Math.random();
                            }
                     
       </script>
				</form>
			</div>	
		</div>
		
	</div>
	
	<div id="tx">
		<div class="w">
			<ul class="oz f14">
				<li>
					<div>
						<img src="tpl/yujia/images/tx-1.jpg"/>
						<h1>贴心客服</h1>
					    <p>标准化的运营维护服务流程，不断细分市场，根据不同客户需求提供<span>差别化解决方案.</span></p>
				    </div>
				</li>
				<li>
					<div>
						<img src="tpl/yujia/images/tx-2.jpg"/>
						<h1>安全稳定</h1>
					    <p>即充即结，资金零风险<br/><span>7-24小时</span>随时随地提现<br/><span>360度安全</span>保护您的财产</p>
				    </div>
				</li>
				<li>
					<div>
						<img src="tpl/yujia/images/tx-3.jpg"/>
						<h1>快捷迅速</h1>
					    <p><span>互联网一线品牌的点卡渠道商</span><br/>拥有稳定销售渠道<br/>随时随地收付款</p>
				    </div>
				</li>
			</ul>
		</div>
	</div>