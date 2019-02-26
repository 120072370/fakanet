<?php if(!defined('WY_ROOT')) exit; ?>

  <div class="center">    
<div class="ad m10">
            <div id="focus">
                <ul style="left: 0px; width: 2800px;">
                    <li><a target="_blank">
                        <img title="永纯发卡" alt="HappyNewYear" src="tpl/slwka/Images/2.jpg"></a></li>
                    <!--<li><a target="_blank">
                        <img title="永纯发卡" alt="永纯发卡" src="tpl/slwka/Images/1.jpg"></a></li>
                    <li><a target="_blank">
                        <img title="永纯发卡" alt="永纯发卡" src="tpl/slwka/Images/2.jpg"></a></li>
                    <li><a target="_blank">
                        <img title="永纯发卡" alt="永纯发卡" src="tpl/slwka/Images/3.jpg"></a></li>-->
                </ul>
            </div>   
            <div class="new_release">
                <div class="new_release_left b">
                    最新动态</div>
                <div class="new_release_right gray">
                    <span class="ico"></span>
                    <iframe id="newBillsIframe" height="42" marginheight="0" border="0" 
                    src="tpl/slwka/newBillsList.htm" frameborder="0" width="520" 
                    name="newBillsIframe" marginwidth="0" scrolling="no">
                    </iframe>
                </div>
            </div>
        </div>
        
        <div class="btnlist">
            <div class="btn_title">
                <a class="an_1" href="register.htm" rel="nofollow"></a>
                <a class="an_2" href="login.htm" rel="nofollow"></a>
                <a class="an_3" href="register.htm" rel="nofollow"></a>
            </div>

            <!---////用户登陆
            ---->
            <div class="news_login_right">
                <ul>
                    <form name="login" method="post" action="userlogin.htm">
                    <li>
                        <input class="input_login wbcd" type="text" name="username" onkeydown="enterSearch(event);" value="请输入用户名" tabindex="1" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}"></li>
                    <li>
                        <input class="input_login wbcd" type="password" id="password" name="password" onkeydown="enterSearch(event);" value="请输入登陆密码" tabindex="2" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}"></li>
                    <li>
                        <div style="float: left">
                            <input type="text" name="chkcode" maxlength="5" style="width:70px" tabindex="3" /> <img onclick="javascript:this.src=this.src+'?t=new Date().getTime()';" src="includes/libs/chkcode.htm" align="absmiddle" title="点击刷新验证码" />
                        <div style="float: left; margin-left: 10px; display: inline;">
                        </div>
                    </li>
                    <div class="clear">
                    </div>
                    <li>
                        <div style="float: left; margin-top: 5px">
                            <a id="hlkOK" class="dlan" tabindex="4" onclick="$('#login_bnt').click()" onclientclick="return Checks()">
                            </a>
                            <input type="submit" name="login_bnt" value="" onclick="return Checks();" id="login_bnt" style="display: none;">
                        </div>
                    </li>
                    </form>
                    <div class="clear">
                    </div>
                </ul>
            </div>
            <div class="right_box mt10 gray">
                <ul>
                    <li><i class="safe"></i><a class="blue_2 b">交易安全</a><br>
                        专业平台保障 安全无忧</li>
                    <li><i class="release"></i><a class="blue_2 b">闪电发货</a><br>
                        极速发货体验 即买即发</li>
                </ul>
            </div>
        </div>
    </div>
    <!-----------------------------------------点卡------------------------------------------------->
    <div class="center">
        <div class="game_content">
          
                
                    <ul>
                       <div style="width:674px;float:left;overflow:hidden" class=game_tab>&nbsp;<br><img title=自动发卡平台 alt=自动发卡平台 src="tpl/slwka/images/9.jpg"></A> </div>
							
							
							
							
                 
            </div>
            <div class="seckill">
                <h3 class="f14 cent">
                    站内动态</h3>
                <ul>
                    <br>
                   <?php 
				if($news): 
				$i=1;
				foreach($news as $key=>$val):
				if($i>5) break;
				if($val['classid']==3 && $val['is_display_home']):
				$addtime=strtotime($val['addtime']);
				$now=strtotime(date('Y-m-d H:i:s'));
				$days=ceil(($now-$addtime)/86400);
				?>
				    <li><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" style="color:#<?php echo $val['is_color'] ?>;<?php echo $val['is_bold']!='' ? 'font-weight:bold' : '' ?>"><?php echo strlen($val['title'])>15 ? subString($val['title'],0,14) : $val['title'] ?></a><?php echo $days>3 ? '' : '<img src="tpl/default/images/news.gif" />' ?></li>
				<?php
				$i++;
				endif;
				endforeach;
				endif;
				?>                   
                </ul>
            </div>
        </div>
    </div>