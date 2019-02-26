<?php if(!defined('WY_ROOT')) exit; ?>


<?php echo $msg ?>
    <div id="login_main">	
		<div class="login_ss">
			<ul class="login_ii">		    
			<form name="ft" method="post" action="withquestion.htm">
			<input type="hidden" value="<?php echo $userid ?>" name="uid" />
			<li class="login_tt">安全问题：<?php echo $question ?></li>
			<li class="login_ff">问题答案：<input type="text" name="answer" maxlength="50" /></li>
			<li class="login_ff">重设密码：<input type="password" name="newpassword" maxlength="20" /></li>
			<li class="login_ff">确认密码：<input type="password" name="confirmpassword" maxlength="20" /></li>
			<li class="login_ff">&nbsp;&nbsp;&nbsp;验证码：<input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
			<li class="button"><input type="submit" class="getback_pwd" style="margin-left:85px" value="" /></li>
			</form>
			</ul>
		</div>
	</div>


<div class="banner">
		<img src="/Skin/Home/Red/images/917_page_banner01.jpg" />
			</div>
		</div>
<div class="content">
			<div class="page_gonggao">
				<div class="page_header">
					<h1>网站管理</h1>
					<div class="recent">
						<span>当前位置：<a href="/">首页 </a> > 交易查询</span>
					</div>
				</div>
				<div class="page_content">
					<div class="left_nav">
						<ul>
							<li><a href="/login.htm">登录平台</a></li>
							<li><a href="/sendcode.htm">免费注册</a></li>
							<li><a href="/retpwd.htm">找回密码</a></li>
							<li class="nav_current"><a href="/orderquery.htm">交易查询</a></li>
						</ul>
					</div>
					<div class="center_text">						
						<div class="charge_search">
							<div class="search_btn">
								<img src="/tpl/yc88net/tiaozhuan.png" />
							</div>
							<div class="news_cearch">
<div class="clear">
    </div>
    <br />
    <div class="center" style="margin: 10px auto 30px;">
        <div class="login">            
            <div style="width: 900px; margin: auto">
                <div style="width: 900px; margin: auto">
                    <div class="search_tip" style="text-align: center;">
                        <div id="msg_tip">
                             <div style="border:0px solid #ccc;padding:20px;">
<?php echo $msg ?>
    <div id="login_main">	
		<div class="login_ss">
			<ul class="login_ii">		    
			<form name="ft" method="post" action="withquestion.htm">
			<input type="hidden" value="<?php echo $userid ?>" name="uid" />
			<li class="login_tt">安全问题：<?php echo $question ?></li>
			<li class="login_ff">问题答案：<input type="text" name="answer" maxlength="50" /></li>
			<li class="login_ff">重设密码：<input type="password" name="newpassword" maxlength="20" /></li>
			<li class="login_ff">确认密码：<input type="password" name="confirmpassword" maxlength="20" /></li>
			<li class="login_ff">&nbsp;&nbsp;&nbsp;验证码：<input type="text" name="chkcode" maxlength="5" style="width:70px" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码！" /></li>
			<li class="button"><input type="submit" class="getback_pwd" style="margin-left:85px" value="" /></li>
			</form>
			</ul>
		</div>
	</div>
	</div></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var JumpUrl = function () {
            window.location.href = '/login.html';
        }
        $(function () {
            setTimeout(changeTimes, 1000);
        })
        var changeTimes = function () {
            if ($('#times').text() == 0) {
                JumpUrl();
                return false;
            } else {
                $('#times').text($('#times').text() - 1);
                setTimeout(changeTimes, 1000);
            }
        }
    </script></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>	
</div>	
		</div>
			</div>

			<div class="safely"></div>
		</div>