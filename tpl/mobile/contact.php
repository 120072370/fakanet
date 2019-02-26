<?php if(!defined('WY_ROOT')) exit; ?>

<div style="margin-top:0px;padding-top:8px;background-color:#f1f1f1">
<ul class="nav nav-tabs" role="tablist">
<li role="presentation">&nbsp;&nbsp;&nbsp;</li>﻿<li role="presentation" class="active"><a href="#" onClick="javascript :history.go(-1);">返回首页</a></li></ul>
<div class="tab-content" style="padding:10px 20px">
<address><strong>服务热线</strong>
<br> <?php echo $this->config['tel'] ?>(服务时间:早9点到晚18点) </address>
<address><strong>帐号开通审核</strong>
<br>QQ:<?php echo $this->config['qq'] ?><a target="blank" href="tencent://message/?uin=<?php echo $this->config['qq'] ?>&amp;Site=发卡&amp;Menu=yes"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->config['qq'] ?>:41" alt="点击这里给我发消息" border="0" align="absmiddle"></a></address>
<address><strong>提现问题咨询</strong>
<br>QQ:<?php echo $this->config['qq'] ?><a target="blank" href="tencent://message/?uin=<?php echo $this->config['qq'] ?>&amp;Site=发卡&amp;Menu=yes"><img src="http://wpa.qq.com/pa?p=1:<?php echo $this->config['qq'] ?>:41" alt="点击这里给我发消息" border="0" align="absmiddle"></a></address>
<address><strong>投诉</strong>
<br><a target="_blank" href="tencent://message/?uin=123456&amp;Site=在线咨询&amp;Menu=yes"><img src="/tpl/219kacom/images/qq2.jpg"></a>
<a target="_blank" href="tencent://message/?uin=123465&amp;Site=在线咨询&amp;Menu=yes"><img src="/tpl/219kacom/images/qq2.jpg"></a>
<a target="_blank" href="tencent://message/?uin=123456&amp;Site=在线咨询&amp;Menu=yes"><img src="/tpl/219kacom/images/qq2.jpg"></a></address>
<address><strong>技术服务</strong>
<br><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $this->config['qq'] ?>:51" alt="点击这里给我发消息" title="点击这里给我发消息"/></a></address>
</div>﻿	</div>
