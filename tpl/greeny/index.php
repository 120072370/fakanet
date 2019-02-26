<?php if(!defined('WY_ROOT')) exit; ?>

  <div id="content" class="b_clear b_m_b">
    <div class="banner">
	  <div id="slides">
		    <a href="javascript:;" class="prev">上翻</a>
		    <div class="slides_container" id="slibanner">
				<a href="register.htm" rel="target"><img src="tpl/greeny/common/images/banner-01.jpg" width="950" height="210" id="myImage" alt="Banner1" /></a>
				<a href="register.htm" rel="target"><img src="tpl/greeny/common/images/banner-02.jpg" width="950" height="210" id="myImage2" alt="Banner2" /></a>
				
			</div>
		    <a href="javascript:;" class="next">下翻</a></div>
	</div>
	<style type="text/css">
.index_chart{margin-top:15px;}.index_chart em{font-style:normal;font-size:16px;font-weight:700} .info1,.info2{height:40px;position:absolute;top:0;left:0;padding:0 8px 0 40px} .info1{background:url(tpl/greeny/common/images/data_ico.png) no-repeat;right:0;z-index:2} .info2{z-index:1} .info_wrap1 .info2{background:#ACC221} .info_wrap1,.info_wrap2,.info_wrap3{height:40px;line-height:40px;background:#B1B1B1;font-size:14px;color:#FFF;position:relative;width:312px;margin-right:6px;overflow:hidden} .info_wrap3{margin-right:0} .info_wrap1 .info1{background-position:10px 10px} .info_wrap2 .info1{background-position:10px -20px} .info_wrap3 .info1{background-position:10px -80px} .info_wrap2 .info2{background:#F4BA00} .info_wrap3 .info2{background:#51BDEA} .info_wrap1 span,.info_wrap2 span,.info_wrap3 span{float:right}
	</style>
	<div class="index_chart">
	    <h4 align="center"><img src="tpl/greeny/common/images/laka_jcsj.png" alt="基础数据统计" /></h4>
	    <div class="b_l info_wrap1">
				<div class="info1"><div class="b_l">消耗卡平均耗时小于</div><span><em id="cachewrap1">Loading..</em> 秒</span></div>
				<div style="width:45%;" class="info2"></div>
		</div>
		<div class="b_l info_wrap2">
				<div class="info1"><div class="b_l">平台当前可用通道为</div><span><em id="cachewrap2">Loading..</em> 个</span></div>
				<div style="width:100%;" class="info2"></div>
		</div>
		<div class="b_l info_wrap3">
				<div class="info1"><div class="b_l">当前 <b id="cachewrap3">Loading..</b> 使用人数比例最高</div></div>
				<div style="width:100%;" class="info2"></div>
		</div>
	</div>
    <div class="b_l b_m_t area-l">
	  <div class="area-box">
	    <div class="area-t">
		  <div class="titbn"><h4>平台信息</h4></div>
		  <div class="more"><a href="news.htm"><img src="tpl/greeny/common/images/morebn.png" alt="更多" width="65" height="24" border="0" /></a></div>
		</div>
		<div style="clear:both"></div>
		<div class="area-c">
		    <div class="b_l box-l">
			  <div class="box-l-t"><h4>支持卡类</h4></div>
			  <ul class="b_clear">
			    
			    <li><a>腾讯一卡通<b></b></a></li>
 
			    <li><a>盛大一卡通<b></b></a></li>
 
			    <li><a>骏网一卡通<b></b></a></li>
 
			    <li><a>完美一卡通<b></b></a></li>
 
			    <li><a>搜狐一卡通<b></b></a></li>
 
			    <li><a>征途一卡通<b></b></a></li>
 
			    <li><a>久游一卡通<b></b></a></li>
 
			    <li><a>网易一卡通<b></b></a></li>
 
			    <li><a>电信充值卡<b></b></a></li>
 
			    <li><a>移动充值卡<b></b></a></li>
 
			    <li><a>联通充值卡<b></b></a></li>
 
			    <li><a>纵游一卡通<b></b></a></li>
 
			    <li><a>天宏一卡通<b></b></a></li>
 
			    <li><a>天下一卡通<b></b></a></li>
 
			    <li><a>光宇一卡通<b></b></a></li>
 
			  </ul>
			</div>
			<div class="b_l box-r">
			  <div class="box-r-t"><h4>站内动态</h4></div>
			  <ul>
                <?php 
				if($news): 
				$i=1;
				foreach($news as $key=>$val):
				if($i>9) break;
				if($val['classid']==1 && $val['is_display_home']):
				$addtime=strtotime($val['addtime']);
				$now=strtotime(date('Y-m-d H:i:s'));
				$days=ceil(($now-$addtime)/86400);
				?>
				    <li><span><font color="gray"><?php echo date('Y-m-d',$addtime) ?></font></span><a target="_blank" href="view.htm?id=<?php echo $val['id'] ?>" class="Btips" title="<?php echo $val['title'] ?>" style="color:#333;"><?php echo strlen($val['title'])>15 ? subString($val['title'],0,15) : $val['title'] ?></a></li>
				<?php
				$i++;
				endif;
				endforeach;
				endif;
				?>
			  
			  </ul>
			</div>
			<div class="clear"></div>
		  <div class="b_m_t" id="newad"><a href="register.htm" rel="target"><img src="tpl/greeny/common/images/bannerad.gif" alt="立即注册"  width="623" height="86" /></a></div>
		</div>
	  </div><!--/box end-->
	</div><!--/left end-->
	<div class="b_r b_m_t area-r">
<?php require 'login_common.php'; ?>
	</div><!--/right end-->
  </div><!--/content end-->
  <div class="lxbox">
	  <div class="lxbox-t"><h4>联系我们</h4></div>
	  <div class="lxbox-c">
	    <a href="contact.htm"><img src="tpl/greeny/common/images/lianxi.png" alt="联系我们" border="0" /></a>
    </div>
  </div>

