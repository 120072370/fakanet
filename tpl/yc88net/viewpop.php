<?php if(!defined('WY_ROOT')) exit; ?>


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
								<img src="/Skin/Home/Red/images/tiaozhuan.png" />
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
	<?php if($data): ?>
	    <h3 style="color:#e10000;text-align:center;border-bottom:1px dotted #ccc;padding-bottom:10px"><?php echo $data['title'] ?></h3>
		<div style="line-height:26px;font-size:14px;padding:10px;height:300px;overflow:auto"><?php echo $data['content'] ?></div>
		<div style="text-align:right"><?php echo $this->config['sitename'] ?> <?php echo $data['addtime'] ?></div>
	<?php endif; ?>
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