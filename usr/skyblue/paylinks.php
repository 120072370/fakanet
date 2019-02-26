<?php if(!defined('WY_ROOT')) exit; ?>
<div class="row">
    <div class="col-md-3"></div>
<div class="col-md-6">
    <div class="panel panel-default panel-shadow" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">我的支付链接</div>
        </div>
        <!-- panel body -->
        <div class="panel-body">
				<div class="main" >

				<!--<div style="color:#cc3333;font-size:14px">我的商户链接</div>-->
				
				<!--<div style="color:#75b00e;font-weight:bold;font-size:14px;margin-top:15px">超级防御多线路链接 ：无视一切攻击：</div>
				<?php foreach ($mypaylinks as $k => $v) {?>
				<div style="margin-top:10px">线路<?php echo $k+1;?>：<a  style="color:#666" href="<?php echo $v; ?>" target="_blank"><?php echo $v; ?></a></div>
				<?php }?>-->
				
				<!--<div style="color:#75b00e;font-weight:bold;font-size:14px;margin-top:45px">二级域名：稳定性极差，不推荐使用,满足特殊需要用户</div>
				<?php if(!empty($users['domain'])){?>
				<div style="margin-top:10px"><a  style="color:#666" href="http://<?php echo $users['domain']?>.<?php echo $siteurl?>" target="_blank">http://<?php echo $users['domain']?>.<?php echo $siteurl?></a></div>
				<?php }?>
				<div style="color: #75b00e; font-weight: bold; font-size: 14px; margin-top: 15px">
		            <form action="userDomain.php?action=editsave" method="post">
		                设置域名：<input id="diyDomain" name="domain" value="<?php echo $users['domain']?>" type="text" width="80px" >.<?php echo $siteurl?> <input id="btnSubmit" type="submit" value="设置专属二级域名">
		            </form>
		        </div>-->
				
				<div style="color:#75b00e;font-weight:bold;font-size:14px;color:red;">温馨提示：如需在QQ群发广告,请务必使用"销售连接"短网址进行发送 </div>
				<?php foreach ($goodurl as $k => $v) {?>
				<div style="margin-top:10px">线路<?php echo $k+1;?>：<a  style="color:#666" href="<?php echo $v; ?>" target="_blank"><?php echo $v; ?></a></div>
				<?php }?>
				
				
				<p style="margin:12px 0">链接说明：商品和分类的独立链接在<a href="goodcate.php">商品分类</a>和<a href="goodlist.php">商品列表</a>中获取！</p>
				<div style="color:#75b00e;font-weight:bold;font-size:14px;margin-top:45px">生成浮动代码 </div>
				<style type="text/css">
				ul.fudong li{ line-height: 30px; list-style:none; margin-bottom:10px;}
                ul.fudong li input,select{ margin-left:10px; width:30%; padding:5px;}
				</style>
				<form action="/usr/JavaScript.php" method="post" class="form_fudong">
					<ul class="fudong">
						<li>
							漂浮位置
							  <select name="_zuoyou">
								<option value="0">右</option>
								<option value="1" selected="selected">左</option>
							  </select>
						*左右显示</li>
						<li>
							购买文字
							<input type="text" name="_biaoti"  value="立即购买" />
						</li>
						<li>
							漂浮类型
							  <select name="_leixing">
								<option value="0">代码</option>
								<option value="1" selected>图片</option>
							</select>
						*建议选择图片</li>
						<li>
							文字颜色
							  <input type="text" name="_tupian_biankuang_yanse" class="colorpicker colorpicker-element"  value="#000" />
						</li>
						<li>
							图片地址
							<input type="text" name="_tupian_dizhi"  value="http://" />
							*可以自定义图片地址
						</li>
						<li>
							图片长度
							<input type="text" name="_tupian_gaodu"  value="280" />
						*图片长度</li>
					  <li>
							图片宽度
							<input type="text" name="_tupian_kuandu"  value="135" />
							*图片宽度
						</li>
						<li>
							图片边部
							<input type="text" name="_tupian_bianju"  value="10" />
					  *图片距离左侧或右侧边部距离</li>
						<li>
							弹窗文字
							  <input type="text" name="_liulanqi_biaoti"  value="欢迎使用" />
						*弹窗，窗口文字说明</li>
						<li>
							弹窗内连接
							<select name="_liulanqi_lianjie">
								<?php foreach ($goodurl as $k => $v) {?>
								<option value="<?php echo str_replace('lin', 'pfu', $v) ; ?>" <?php if($k==1){echo 'selected';}?>>线路<?php echo $k+1;?>：<?php echo str_replace('lin', 'pfu', $v); ?></option>
								<?php }?>
							</select>
						*选择弹窗域名</li>
						<li>
							弹窗宽
							<input type="text" name="_liulanqi_kuandu"  value="600" />
						*弹窗宽度，默认不要修改</li>
						<li>
							弹窗长
							<input type="text" name="_liulanqi_gaodu"  value="700" />
						*弹窗长度，默认最好不要修改</li>
						<li>
							是否需要区分首拼大小写
							<select name="_liulanqi_gundongtiao">
								<option value="Yes" selected="selected">是</option>
								<option value="No">否</option>
							</select
						>
							*不建议修改</li>
						<li>
							<input type="button" class="btn btn-success" value="确定生成"/>
						</li>
						<li>
							<textarea class="textarea_fudong_hidden" style="display: none;"><script type="text/javascript" src="dataurl"></script></textarea>
<textarea class="textarea_fudong" rows="5" cols="50"></textarea>
						</li>
					</ul>
				</form>	
				<script type="text/javascript">
					jQuery(document).ready(function($){ 
					    try{
					        jQuery(document).on('click', '.btn-success', function () {
					    		jQuery.post(
					    			'/usr/JavaScript.php',
					    			jQuery(".form_fudong").serializeArray(),
					    			function (data) {
					    				if (data.status==1) {
											jQuery(".textarea_fudong").html(jQuery(".textarea_fudong_hidden").html().replace('dataurl',encodeURI(data.url)));
					    				}
					    			}
					    		);       
					    	}) 
					    }catch(e){}
					});
				</script>
				<div style="color:#75b00e;font-weight:bold;font-size:14px;margin-top:45px">如需使用此功能，请联系平台客服开通(价格：58元/月)。</div>
			</div>

				</div>
        </div>
    </div>
    </div>
<script>
$(function(){
    $('[name=link_state]').click(function(){
	    $.get('paylinks.php',{action:'op',t:new Date().getTime()},function(data){
		    if(data=='0'){
			    $('img#link_state').attr('src','weiqi/images/ico_remove.png');
				$('[name=link_state]').val('开启');
			} else {
			    $('img#link_state').attr('src','weiqi/images/ico_ok.png');
				$('[name=link_state]').val('关闭');
			}
		})
	})
})
function copyToClipboard(txt) {   
     if(window.clipboardData) {    
             window.clipboardData.clearData();    
             window.clipboardData.setData("Text", txt);  
			 alert("成功复制到剪贴板！");
     } else if(navigator.userAgent.indexOf("Opera") != -1) {   
          window.location = txt;    
     } else if (window.netscape) {    
          try {    
               netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");    
          } catch (e) {    
               alert("被浏览器拒绝！\n请在浏览器地址栏输入'about:config'并回车\n然后将'signed.applets.codebase_principal_support'设置为'true'");    
          }    

          var clip = Components.classes['@mozilla.org/widget/clipboard;1'].createInstance(Components.interfaces.nsIClipboard);   
          if (!clip)    
               return;    
          var trans = Components.classes['@mozilla.org/widget/transferable;1'].createInstance(Components.interfaces.nsITransferable); 
          if (!trans)    
               return;   
          trans.addDataFlavor('text/unicode');    
          var str = new Object();    
          var len = new Object();    
          var str = Components.classes["@mozilla.org/supports-string;1"].createInstance(Components.interfaces.nsISupportsString);   
          var copytext = txt;    
          str.data = copytext;    
          trans.setTransferData("text/unicode",str,copytext.length*2);    
          var clipid = Components.interfaces.nsIClipboard; 
          if (!clip)    
               return false;    
          clip.setData(trans,null,clipid.kGlobalClipboard);    
          alert("成功复制到剪贴板！"); 
     }
}

var ctxt = "";
function cpcards(){
	copyToClipboard(ctxt);
}
</script>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap-colorpicker.min.js"></script>
