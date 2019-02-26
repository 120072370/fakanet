<?php if(!defined('WY_ROOT')) exit; ?>
﻿<style type="text/css">
	.case_box {
    width: 908px;
    margin: 0 auto;
    font-family: Microsoft YaHei;
    text-align: left;
}.address_box {
    overflow: hidden;
    zoom: 1;
    padding: 0 0 30px 0;
    margin: 0 0 30px 0;
    border-bottom: 1px dashed #D2D1D1;
}.table_obj {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
}.table_obj .col_no1 {
    width: 25%;
    border-right: 1px solid #E6E6E6;
}.table_obj .col_no2 {
    width: 25%;
    border-right: 1px solid #E6E6E6;
}.table_obj .col_no3 {
    width: 25%;
}
.case_box .m_title {
    font-size: 14px;
    margin: 10px 0;
}
.case_box .m_info {
    font-size: 12px;
    margin: 0 0 15px 0;
    color: #636363;
}
.shadow {
    -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0px 1px 3px rgba(0,0,0,0.15);
}
.address_box .address_con {
    
    padding: 30px 0;
    overflow: hidden;
    zoom: 1;
}
.address_con {
    background-position: 0 -100px;
}
.address_box .address_con .name {
    padding-left: 90px;
    font-size: 16px;
    line-height: 28px;
    margin: 0;
}
.address_box .address_con .info {
    padding-left: 90px;
    line-height: 26px;
    _margin-top: 8px;
}
.info {
    color: #676666;
    font-size: 12px;
}
.address_box .address_con .info .phone {
    margin: 0 20px 0 0;
}
.address_box .address_con .info {
    padding-left: 90px;
    line-height: 26px;
    _margin-top: 8px;
}
.address_box .address_con .ico_obj {
    height: 15px;
    display: inline-block;
    position: relative;
    top: 4px;
}
.ico_phone {
    background-position: -400px 0;
    width: 12px;
}
.ico_box, .ico_phone, .ico_maddress, .ico_info, .ico_rtx, .ico_qq, .ico_ec, .address_con {
    display: block;
   
}
.address_box .address_con .ico_obj {
    height: 15px;
    display: inline-block;
    position: relative;
    top: 4px;
}
.ico_maddress {
    background-position: -415px 0;
    margin: 0 4px 0 0;
    width: 12px;
}
.address_box {
    overflow: hidden;
    zoom: 1;
    padding: 0 0 30px 0;
    margin: 0 0 30px 0;
    border-bottom: 1px dashed #D2D1D1;
}
.table_pay {
    background: #FFF;
    -moz-border-radius: 4px;
    -khtml-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
}
.bd {
    border: 1px solid #E7E7E7;
}

.table_obj th.c_n {
    border-right: 1px solid #D6D6D6;
}
.table_price th {
    text-align: center;
    text-indent: 0;
}
.table_pay th {
    background: #EBEDEF;
    height: 40px;
    line-height: 40px;
}
.table_obj th {
    background: #F1F1F1;
    border-bottom: 1px solid #D6D6D6;
    height: 45px;
    line-height: 45px;
    text-indent: 60px;
}
.table_pay .l_bg {
    background: #F1F1F1;
}
.table_obj td {
    line-height: 45px;
    text-indent: 60px;
}
.table_pay td {
    height: 38px;
    line-height: 38px;
    color: #646464;
}
.table_price td {
    text-align: center;
    text-indent: 0;
    color: #646464;
}
.min_box {
    width: 980px;
    margin: 0 auto;
    text-align: left;
}
.ico_phone {
    background-position: -400px 0;
    width: 12px;
}

	</style>
	
	
	
	<div class="Banner">
<div class="img" style="background-image: url(tpl/219kacom/images/ban02.jpg);"></div>
</div>
<div class="Crumbs w">
<h2 class="card"><i></i>联系方式<span><span>/</span> Contact</span></h2>
</div>
<div class="w">
<div class="cardBox"><div class="tb"></div></div>
<div class="min_box" style="background: none repeat scroll 0 0 #F1F3F4;
    border: 1px solid #F0F0F0;padding: 30px 0 50px;">
<div class="case_box">
<div class="address_box">
<div class="address_con shadow">
<h3 class="name">客服电话：<?php echo $this->config['tel'] ?> &nbsp;&nbsp;(服务时间:早9点到晚18点)</h3>
<div class="info">

</div>
</div>
</div>
<div class="address_box">
<h3 class="m_title">商务人员联系QQ列表</h3>
<p class="m_info">请直接找您需要的客服人员。</p>

<table class="table_obj bd table_pay table_price shadow">
<colgroup>
<col class="col_no1">
<col class="col_no2">
<col class="col_no3">
</colgroup>
<thead>
<tr class="l_bg">
<td class="c_n"><h3>商务人员</h3></td>
<td class="c_n"><h3>各商务相关职责</h3></td>
<td class="c_n"><h3>值班经理</h3></td>
</tr>
</thead>
<tbody>
<tr>
<td class="c_n">商务咨询</td>
<td class="c_n"><strong style="color:red">帐号开通审核[添加好友的时候请备开通帐号]</strong>
<td>
<a target="_blank" id="kfqq1" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes"><img border="0" src="tpl/219kacom/images/qq2.jpg" alt="在线咨询" title="在线咨询"/></a>
</td>
</tr>
<tr class="l_bg">
<td class="c_n">提现</td>
<td class="c_n">提现问题咨询</td>
<td>
<a target="_blank" id="kf1qq1" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes"><img border="0" src="tpl/219kacom/images/qq2.jpg" alt="在线咨询" title="在线咨询"/></a>
</td>
</tr>
<tr>
<td class="c_n">投诉</td>
<td class="c_n">客服服务投诉</td>
<td>
<a target="_blank" href="tencent://message/?uin=<?php echo $this->config['qq'] ?>&amp;Site=在线咨询&amp;Menu=yes"><img src="tpl/219kacom/images/qq2.jpg"></a>

</td>
</tr>
<tr class="l_bg">
<td class="c_n">技术服务</td>
<td class="c_n">技术支持、协助接入</td>
<td>
<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes"><img border="0" src="tpl/219kacom/images/053d44ed27d4467e89e263da5dad9703.gif" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
</td>
</tr>
</tbody>
</table>
</div>

</div>
</div>

