<?php if(!defined('WY_ROOT')) exit; ?>
<?php 
	$index = $_GET['id'];
?>
<div class="container">
    <br />
	<div class="mainblk clearfix">
		<div class="leftmain">
			<div class="leftmenu">
				<div class="lm_tp">&nbsp;</div>
				<div class="lm_content">
					<div class="menublk">
						<h2>
							<span class="zt"><a href="faq.htm">热点问题</a></span>
						</h2>
                            <ul>
                                <li><a href="/faq.htm?id=1">如何使用自助交易</a></li>
                                <li><a href="/faq.htm?id=2">买家如何获取卡密信息</a></li>
                                <li><a href="/faq.htm?id=3">什么是自动卡密</a></li>
                                <li><a href="/faq.htm?id=4">买家交易协议</a></li>
                                <li><a href="/faq.htm?id=5">交易协议</a></li>
                            </ul>
                            <div class="menublk_bt">
                            </div>
                        </div>
                        <div class="menublk">
                            <h2>
                                <span class="zt"><a href="faq.htm">新手帮助</a></span></h2>
                            <ul>
                                <li><a href="/faq.htm?id=7">商品如何发布</a></li>
                                <li><a href="/faq.htm?id=6">商品如何下架</a></li>
                                <li><a href="/faq.htm?id=8">卖家如何收款</a></li>
                                <li><a href="/faq.htm?id=9">卖家协议</a></li>
                                <li><a href="/faq.htm?id=9">发布协议</a></li>
                            </ul>
                            <div class="menublk_bt">
                            </div>
                        </div>
                    </div>
                    <div class="lm_bt">
                        &nbsp;</div>
                </div>
            </div>
            <div class="rightmain">
                <div class="blueblk beforebuy">
                    <div class="crumb">
                        您的位置：<a href="faq.htm">帮助中心</a></div>
                    <br>
					<?php if($index == 1){ ?>
					<div class="articlecontent">
                        <h2>如何使用自助交易</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    买方：<br>
                                    1. 通过自助交易网站挑选自己所需的商品。<br>
                                    2. 填写购买信息，支付所需金额到自助交易平台。<br>
                                    3. 与卖家交易得到商品，确认交易完成。<br>
                                    卖方：<br>
                                    1. 发布商品出售信息，等待买家咨询。<br>
                                    2. 买家付款后平台自动发商品给买家。<br>
                                    3. 收到平台订单款。</p>
                            </div>
                        </div>
					<?php } else if($index == 2){ ?>
					<div class="articlecontent">
                        <h2>买家如何获取卡密信息</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    通过商品购买页面选择自己要购买的商品，选择支付通道付款后会自动跳转到发货页面，如果没有收到对应的卡密，保存好自己的订单号，在订单查询页面获取即可！
                            </div>
                        </div>
					<?php } else if($index == 3){ ?>
					<div class="articlecontent">
                        <h2>什么是自动卡密</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    买家支付订单后，可以到：交易查询→找到订单并点击“详情”，即可在打开的新页面中看到卡密信息。<br>
                                    <?php echo $this->config['sitename'] ?>提醒您：提取卡密后请迅速到官方网站进行充值；入有什么问题请立即联系卖家进行咨询（商品购买页面均有卖家联系方式）。</p>
                          </div>
                        </div>
					<?php } else if($index == 4){ ?>
					<div class="articlecontent">
                        <h2>买家交易协议</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    欢迎阅读<?php echo $this->config['sitename'] ?>交易协议，如您要使用本网站所提供的网络游戏物品交易服务，您需要遵守以下内容：<br>
                                    1、用户有义务保护好自己的帐号密码，如自己保护不当遗失被别人冒领，<?php echo $this->config['sitename'] ?>只能提供力所能及帮助但不承担赔偿责任。<br>
                                    2、卖家不会在游戏里再向您取回任何商品；如果交易成功之后，您将该物品与任何人进行交易，<?php echo $this->config['sitename'] ?>概不负责也不承担任何法律责任。<br>
                                    3、<?php echo $this->config['sitename'] ?>有权验证在交易过程中您使用的ＱＱ是否与填单ＱＱ相一致，并有权无条件拒绝ＱＱ不一致的订单交易以及查询。<br>
                                    4、所有交易游戏商品因游戏开发商或运营商之原因造成该商品属性变化、物品消失、封存等情况，<?php echo $this->config['sitename'] ?>概不负责。<br>
                                    5、在使用交易成功后，请您马上去购买商品的真实性。如果在15分钟后出现任何问题，<?php echo $this->config['sitename'] ?>概不负责也不承担任何法律责任。<br>
                                    7、当您确认购买物品无法使用，请在第一时间联系卖家进行确认，如卖家24小时后没有给你做出任何回应以及解决方案，可以联系我们客服人员进行确认退款。<br>
                                    8、<?php echo $this->config['sitename'] ?>不审核道具类物品的市场价值，请您购买时再三确认是否要交易。若交易成功后，您对道具类物品市场价值有异议，365卡概不负责也不承担任何法律责任。<br>
                                    凡通过<?php echo $this->config['sitename'] ?>网站购买或出售交易，即表示接受并遵守以上内容。</p>
                          </div>
                        </div>
					<?php } else if($index == 5){ ?>
					<div class="articlecontent">
                        <h2>交易协议</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    欢迎阅<?php echo $this->config['sitename'] ?>网站自助交易服务协议条款，如您要使用<?php echo $this->config['sitename'] ?>所提供的网络游戏物品自助交易服务，您需要遵守以下内容。<br>
                                    1．您在发布商品前须确认所要发布商品真实存在，并保证此商品为合法所得，且获得此商品之方式不违反该网络游戏开发商及运营商之相关游戏规定。<br>
                                    2．您在使用自助交易服务过程中发布交易信息之时，须确认所发布信息与所要出售商品之属性完全相符，并保证此商品与买家达成交易意向前属性未发生变化。<br>
                                    3．您须确认此商品属性不会因游戏相关规则等非人为原因，而发生属性变化。如该网络游戏营运规则中，此商品会因时间等原因而发生属性变化，则发布自助交易信息时必须详细注明。<br>
                                    4．<?php echo $this->config['sitename'] ?>有权验证您所发布之自助交易信息与该商品真实属性是否相符，并有权无条件拒绝某商品的自助交易。<br>
                                    5．商品交易后，您不得再进行与该商品相关或间接相关之操作。如要取回商品，须与买家达成交易取消共识后，方可取回商品。<br>
                                    6．当商品交于买家，并得到买家确认，卖家收到交易所得后，即表示该商品之原使用者已放弃该商品之使用权，归买家所有。<br>
                                    7．所有自助交易游戏商品因游戏开发商或运营商之原因造成该商品属性变化、商品消失、封存等情况，<?php echo $this->config['sitename'] ?>概不负责。<br>
                                    8．用户有义务保护好自己的ID密码，如自己保护不当遗失被别人冒领本站只能提供力所能及帮助但不承担责任。<br>
                                    凡通过<?php echo $this->config['sitename'] ?>网站发布自助信息，即表示接受并遵守以上内容。<br>
                                    本服务协议双方为本网站与使用本网站自助服务用户，本服务协议具有合同效力。<br>
                                    若因违反此协议内容（如违反网络游戏运营商之相关服务规定）所造成的损失（包括但不限于商品被网络游戏运营商没收、删除、修改等），由违约人承担全部责任，并赔偿该自助游戏商品购买人、网络游戏运营商及<?php echo $this->config['sitename'] ?>之全部损失。<br>
                                </p>
                          </div>
                        </div>
					<?php } else if($index == 6){ ?>
					<div class="articlecontent">
                        <h2>商品如何发布</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    登录<?php echo $this->config['sitename'] ?>帐号→商品管理→选择/创建商品分类→添加商品（填写出售信息并提交发布）</p>
                          </div>
                        </div>
					<?php } else if($index == 7){ ?>
					<div class="articlecontent">
                        <h2>商品如何下架</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    登录<?php echo $this->config['sitename'] ?>帐号→商品管理→商品列表→上架/下架（商品）</p>
                          </div>
                        </div>
					<?php } else if($index == 8){ ?>
					<div class="articlecontent">
                        <h2>卖家如何收款</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    商品出售成功之后，会根据您当时发布商品信息时所选择的方式直接转入您的<?php echo $this->config['sitename'] ?>账户或者24小时后汇入您的银行帐号。<br>
                                    具体结算规则请联系客服人员咨询；<br>
                                    注：以上到账时间仅做参考，由于银行系统维护也可能导致到账时间延长。<br>
                                </p>
                          </div>
                        </div>
					<?php } else if($index == 9){ ?>
					<div class="articlecontent">
                        <h2>卖家协议</h2>
                        <h2>&nbsp;
                            </h2>
                        <p class="time">
                            更新时间: 2013-10-22</p>
                        <div id="main">
                            <div id="tablestyle4">
                                <p>
                                    <strong>卖家规范</strong>
								</p>
								<p>
                                    <strong>
                                    <br>
                                    </strong>违规行为，是指涉嫌损害买家、卖家或自助交易的正当权益，及涉嫌违反国家法律法规的行为。<br>
                                    严重违规行为，是指严重破坏自助交易经营秩序，并涉嫌违反国家法律法规的行为，该365卡帐号以及资金将被冻结。<br>
                                    严重违规行为内容如下：<br>
                                    1、在成交留言中发布欺骗信息。<br>
                                    2、骗取他人帐号信息以及盗取他人帐号内物品。<br>
                                    3、发布国家法律法规禁止发布的信息的行为。<br>
                                    (1)、卖家在申诉内容有谩骂买家的语句等。<br>
                                    (2)、卖家对于回复买家咨询留言中有谩骂、威胁语句等。<br>
                                    (3)、卖家在发布单中发布广告、诋毁他人名誉、严重与实际不符信息等。<br>
                                    4、卖家利用不正当手段恶意打击市场价格、扰乱市场秩序的行为。<br>
                                    5、卖家在说明内容里留有其他与交易无关网站或者国家禁止网站的链接地址。<br>
                                    6、以抬高信用为目的行为炒作信用度的行为。<br>
                                    7、卖家在提交协商结果的补充说明里写有谩骂、威胁的语句等。<br>
                                    8、违反《自助交易》的行为。<br>
                                    9、卖家欺骗用户以及客服、伪造证据的行为。<br>
                                    本规则<?php echo $this->config['sitename'] ?>拥有最终解释权。								</p>
								<p>
                                    <br>
                                    <strong>发布规范<br>
                                    </strong>所发布的商品标题、图片、描述等信息缺乏或者多种信息相互不一致的情况，5173不允许发布。其中具体形式包括：<br>
                                    1、发布的商品缺乏关键的信息描述（包含但不仅限于如下情况：商品标题、商品描述中只有无含义的数字和字母等）。<br>
                                    2、发布的商品关键要素相互不符（包含但不仅限于如下情况：发布的商品描述与图片不一致）。<br>
                                    3、发布商品信息中包含诽谤、谩骂、色情、暴力威胁等攻击性言语以及其它非商品信息的（包含但不仅限于如下情况：使用不文明语言等）。<br>
                                    4、发布的商品在物品描述内必须清楚填写数量和属性。<br>
                                    违反以上协议，即可判定为违规发布，并将受到<?php echo $this->config['sitename'] ?>的相关处罚。								</p>
                            </div>
                        </div>
					<?php } ?>                    
                        <p>
                            <br>
                        </p>
                        <input id="HiddenArticle" type="hidden" value="N17xFAYV9lg=">
                        <div class="page_operate">
                            <ul>
                                <li class="pre"><a href="#" onclick="history.back(-1);" style="cursor: pointer;COLOR: #4484da; TEXT-DECORATION: none">返回上一页</a></li>
                                <li class="print"><a href="#" onclick="window.print();" style="cursor: pointer;COLOR: #4484da; TEXT-DECORATION: none" target="_blank">
                                    打印本页面</a></li>
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="surveybox">
                        <h3>
                            以上内容是否解决了您的问题呢？</h3>
                        <dl class="layer1">
                            <dt>
                                <input id="btnUseful" type="button" value="是，已经解决" onclick="Useful(289,1);"></dt></dl>
                        <dl class="layer1">
                            <dt>
                                <input id="btnUseless" type="button" value="否，尚未解决" onclick="$('#div_FeedBack_UselessMsg').show();"></dt><dd>如未解决，可以去<a href="/contactus.aspx" style="COLOR: #4484da; TEXT-DECORATION: none">在线帮助系统</a>提问</dd></dl>
                        <div id="div_FeedBack_Complete" class="success_msg" style="display: none">
                            <em class="success">提交成功！</em>谢谢您的反馈。</div>
                        <div id="div_FeedBack_UselessMsg" class="reason" style="display: none">
                            <dl class="reasondl">
                                <dt>原因：</dt><dd><input type="radio" name="r1" id="r1_1" onfocus="this.blur();" onclick="$('#txtReason').val('太简单，用不上');"><label for="r1_1">太简单，用不上</label><input type="radio" name="r1" id="r1_2" onfocus="this.blur();" onclick="$('#txtReason').val('字太多，不想看');"><label for="r1_2">字太多，不想看</label><input type="radio" name="r1" id="r1_3" onfocus="this.blur();" onclick="$('#txtReason').val('太复杂，看不懂'); "><label for="r1_3">太复杂，看不懂</label><input type="radio" name="r1" id="r1_4" onfocus="this.blur();" onclick="$('#txtReason').val('搜到的内容不匹配');"><label for="r1_4">搜到的内容不匹配</label></dd></dl>
                            <dl>
                                <dt>其他原因：</dt><dd><input id="txtReason" type="text" class="txt"></dd></dl>
                            <div class="err">
                                您至少需要选择一项原因</div>
                            <div class="submit">
                                <input type="button" value="提交" onclick="return Useless(289,1);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>