<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
.login-area{height:0;z-index:100;}
.login-box{width:280px;	left:80%;border-radius: 5px;float: right;margin-top: 8%;padding: 0px 0 25px;right:0px;position:absolute;z-index:120;background-color:rgba(51,51,51,0.6);filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr='#66000000',EndColorStr='#66000000') zoom:1;}
.login-box h2{color:#fff;}
.login-box .f-pass{display:inline-block;width:80px;height:22px;text-align:center;padding-top:8px;margin-right:5px;zoom:1;}
.login-tab{clear:both;width:240px;margin-left:16px;}
.login-tab .tab-item{width:80px;height:35px;float:left;display:inline;position:relative;cursor:pointer;list-style:none;}
.login-tab .tab-item a{width:100%;height:35px;line-height:35px;color:#b8b7b7;font-size:14px;text-align:center;display:block;text-decoration:none;outline:none;position:absolute;}
.login-tab .tab-selected a{font-weight:bold;color:#fff;}
.tang-pass-login{width:100%;}
.tang-pass-login form{margin-left:30px;}
.tang-pass-login dl,.tang-pass-login dt,.tang-pass-login dd,.tang-pass-login ul,.tang-pass-login ol,.tang-pass-login li,.tang-pass-login input{margin:0;padding:0;}
.tang-pass-login .clearfix:after,.tang-pass-login .pass-form-item:after{visibility:hidden;display:block;font-size:0;content:" ";clear:both;height:0;}
.tang-pass-login .clearfix,.tang-pass-login .pass-form-item{zoom:1;}
.tang-pass-login{font:12px/1.5 tahoma,arial,Hiragino Sans GB,\5b8b\4f53;position:relative;}
.tang-pass-login .pass-form-item{margin-top:20px;display:block;position:relative;}
.tang-pass-login .pass-text-input{width:207px;height:30px;}
.tang-pass-login .pass-text-input a{font-size:12px;color:#d70000;display:block;text-align:center;line-height:32px;}
.tang-pass-login .pass-text-input-hover{border-left-color:#ababab;border-top-color:#ababab;border-right-color:#ccc;border-bottom-color:#ccc;}
.tang-pass-login .pass-text-input-focus{border-left-color:#377bcb;border-top-color:#377bcb;border-right-color:#377bcb;border-bottom-color:#377bcb;}
.tang-pass-login .pass-text-input-error{border-left-color:#d91111;border-top-color:#db1111;border-right-color:#d91111;border-bottom-color:#d91111;}
.tang-pass-login input:focus{outline:0;}
.tang-pass-login .pass-form-item-userName{margin-top:0;margin-left:0;}
.tang-pass-login .pass-text-input-verifyCode{padding:0 8px;width:42px;height:24px;display:block;float:left;display:inline;}
.tang-pass-login .pass-verifyCode{Height:25px; width: 100px;border:1px solid #DDD;float:left;display:inline;}
.tang-pass-login .pass-change-verifyCode{padding-left:15px;font-size:12px;text-decoration:underline;color:#fff;height:26px;float:left;display:inline;cursor:pointer;}
.tang-pass-login .pass-form-item-memberPass{font-size:12px;color:#666;position:relative;margin-top:7px;padding-left:50px;height:18px;}
.tang-pass-login .pass-form-item-memberPass input{vertical-align:middle;}
.tang-pass-login .pass-form-item-memberPass label{padding-left:5px;}
.tang-pass-login .pass-form-item-submit{margin-bottom:15px;margin-left:0;}
.tang-pass-login .pass-form-item-submit{height:20px;line-height:34px;}
.tang-pass-login .pass-form-item-submit input{float:left;display:inline;font-size:14px;cursor:pointer;}
.tang-pass-login .pass-form-item-submit .pass-button-submit{font-size:18px;letter-spacing:10px;}
.tang-pass-login .pass-form-item-submit a.pass-fgtpwd{font-size:12px;color:#00c;margin-left:20px;float:left;height:32px;line-height:32px;text-decoration:underline;}
.tang-pass-login .pass-button-submit{background:url("tpl/219kacom/images/bu.png") no-repeat;width:220px;height:40px;border:none;color:#FFF;background-position:0 0;font-family:'Microsoft YaHei';font-size:20px;letter-spacing:3px;}
.tang-pass-login .pass-button-submit:hover{background-position:0 -40px;}
.tang-pass-login .pass-button-submit:active{background-position:0 -80px;}
.tang-pass-login .pass-item-error,.tang-pass-login .pass-item-tip{float:left;display:inline;height:26px;line-height:26px;padding-left:10px;}
.tang-pass-login .pass-item-error{color:#DA1111;}
.tang-pass-login .pass-item-tip{color:#A4A4A4;}
.sc-tip{color:#bbb;margin-right:30px;margin-top:20px;}
.login-box-bottom{margin-top:30px!important;margin-top:5px;margin-left:30px;}
.login-box-bottom a{font-size:12px;color:#fff;}
.register{display:inline-block;width:100px;height:25px;background:#3c95b2;text-align:center;padding-top:px;margin-right:5px;zoom:1;}
.login-nav-separate{width:10px;height:35px;float:left;display:inline;list-style:none;position:relative;margin-right:12px;}
.login-nav-separate span{width:100%;height:35px;line-height:35px;color:#b8b7b7;font-size:14px;text-align:center;display:block;position:absolute;}
.login-box .tang-pass-login .pass-form-item-password{font-size:16px;color:#fff;margin-top:6px;}
.login-box .tang-pass-login .pass-form-item-password label{display:block;text-align:left;}
</style>
<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
  <div  style=" margin-top:0px;"  class="banner">
	<div  class="w-980 login-area pr">
		<div  class="login-box pa">
 			<div  id="bp_pass_login_form"  class="tang-pass-login">
			<form  class="login-form"  id="loginform"  name="aspnetForm"  method="post"  action="/userlogin.htm">
			<p  class="pass-form-item pass-form-item-password">
			  <?php if(!isset($_SESSION['login_username'])){?>
			<p style="color:#FFFFFF;font-size:16px;" align="center" >登陆/Login</p>
			<p  class="pass-form-item pass-form-item-password">
				<label  class="pass-label">账号:</label>
				<input class="pass-text-input pass-text-input-userName pass-username" type="text" name="username" maxlength="20" value="" onfocus="if (value ==''){value =''}" onblur="if (value ==''){value=''}" />
			</p>
			<p  class="pass-form-item pass-form-item-password">
				<label  class="pass-label">密码:</label>
				<input class="pass-text-input pass-text-input-password" type="password" name="password" maxlength="20" />
			</p>
	
	
			<p  class="pass-form-item pass-form-item-password">
				<label  class="pass-label">验证码:</label>
               <input class="pass-text-input pass-text-input-password" type="text" name="chkcode" maxlength="5" value="" onfocus="if (value ==''){value =''}" onblur="if (value ==''){value=''}" />
			  <img class="pass-text-input pass-text-input-password" onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="/includes/libs/chkcode.htm" style="border:0px solid #bcbcbc" align="absmiddle" title="点击刷新验证码" />
	
		</p>
		<p  class="pass-form-item pass-form-item-submit"><input class="pass-button pass-button-submit" value="登录" type="submit"></p>
		
				</form>

			</div>
			
			
			<div  class="login-box-bottom">
				<a  href="register.htm"  class="register">注册账号</a>
				<a  href="retpwd.htm"  class="f-pass">忘记密码？</a>
			</div>
			               <?php }else{?>
                <style>
                #logined{ height: 183px;}
                #logined li{ padding: 5px 0;}
                </style>
                <ul id="logined">
                	<?php
                	$db=Mysql::getInstance();
									$re=$db->query("select * from ".DB_PREFIX."userlogs where userid=".$_SESSION['login_userid']." order by id desc limit 0,1");
									$re=$db->fetch_array($re);
                	?>
                	<h2><li>用户名：<strong style="color:#3300FF;" ><?php echo $_SESSION['login_username'];?></strong></li></h2>
                	<br>
                	<h3><li><strong style="color:#FFFFFF;" >上次登录IP：<?php echo  $re["logip"];?></strong></li><br></h3>
                	
                	<li><a href="/usr" input class="pass-button pass-button-submit">快捷登录</a> &nbsp; &nbsp;<a href="/usr/login.php?action=logout" input class="pass-button pass-button-submit">退出登录</a></li>
                </ul>
                <?php }?>
			  		</div>
	</div>
  <div class="slide-main" id="touchMain">
    <a class="prev" href="javascript:;" stat="prev1001">
        <img src="tpl/219kacom/images/r-btn.png"/>
    </a>
    <div class="slide-box" id="slideContent">
        <div class="slide" id="bgstylec">
            <div class="obj-e"></div>
            <div class="obj-f banner01-pc">
                <div class="method">
                    <h4 >加入我们意味着同时支持微信、支付宝等多种支付渠道.<br>全自动发卡平台领导者 一直被模仿 从未被超越.
                    </h4>
                    <span><img src="tpl/219kacom/images/banner-icons.png"></span>
                    <p><a class="button blue cta" href="#" data-t="index.hero.cta">只要你有量费率都不是问题!</a></p>
                </div>
            </div>
        </div>
        <div class="slide" id="bgstylea">
            <div class="obj-a banner02">
                <h1 style="font-size:40px; font-weight:normal;"><?php echo $this->config['sitename'] ?>商家APP移动端&nbsp;<br>最简单，也最安全!</h1>
                <h4 style="font-size:22px; font-weight:300;">方便客户随时随地查阅销售额.等各项操作.<br>支持Android版2.2以上或者IOS<br>只要你的手机或平板可以上网，即可使用</h4>
                <p>
				<p style="text-align:center"><img src="tpl/219kacom/images/anzudo.png" ></p>
            </div>
            <div class="obj-b"><img src="tpl/219kacom/images/iphone.png"/></div>
        </div>
        <div class="slide" id="bgstyleb">
            <div class="obj-c banner03-text">
                <h1 style="font-size:40px; font-weight:normal;color:#fff"><?php echo $this->config['sitename'] ?>，可能是最合适你的</h1>
                <h4 style="font-size:22px; font-weight:300; color:#fff">自动发货1秒急速响应省时省心省力，结算费率低，利润高 ，<br>
                    并且，所有交易一目了然……</h4>
            </div>
            <div class="obj-d">
                <div class="pc">
				<img src="tpl/219kacom/images/banner3-pc.png"></div>
                <!--<div><img src="tpl/219kacom/images/banner3-iphone.png"></div>-->
            </div>
        </div>

    </div>
    <!--<a class="next" href="javascript:;" stat="next1002"><img src="tpl/219kacom/images/r-btn.png"/></a>-->
    <div class="item"><a class="cur" stat="item1001" href="javascript:;"></a><a href="javascript:;" stat="item1002"></a><a
            href="javascript:;" stat="item1003"></a></div>
</div>

<div class="open-details fn-clear">
    <table class="open-items" >
        <tbody>
        <tr>
            <td >
                <div class="items-inner ">
                    <div class="not-hover-cont">
                        <div class="icon-img"><img src="tpl/219kacom/images/jrlc-ico2x.png"></div>
                        <div class="icon-title">支持主流通道</div>
				
					<div class="icon-details">银联-支付宝-财付通-微信支付</div>
                                   
                    </div>
                  
                </div>
            </td>
            <td>
                <div class="items-inner ">
                    <div class="not-hover-cont">
                        <div class="icon-img"><img src="tpl/219kacom/images/fy-ico2x.png"></div>
                        <div class="icon-title">API接口</div>
					<div class="icon-details">多种支付场景.一站式通道解决方案</div>         
                    </div>
					  <div class="hover-cont fn-clear">
                        <div class="left-content" onclick="javascript:window.location.href='useful.htm'">
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="items-inner ">
                    <div class="not-hover-cont">
                        <div class="icon-img"><img src="tpl/219kacom/images/glpt-ico2x.png"></div>
                        <div class="icon-title">安全保障</div>
						<div class="icon-details">24小时候技术支撑,确保全程安全无忧</div>
                    </div>
                    </div>
            </td>
            <td>
                <div class="items-inner ">
                    <div class="not-hover-cont">
                        <div class="icon-img"><img src="tpl/219kacom/images/help-ico2x.png" alt="" smartracker="on"></div>
                        <div class="icon-title">贴心服务</div>
						<div class="icon-details">客户至上.诚信为首是我们的服务宗旨 </div>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>