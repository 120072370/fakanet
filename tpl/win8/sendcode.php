<?php if(!defined('WY_ROOT')) exit; ?>
<script src="tpl/win8/js/city.js" type="text/javascript"></script>
<script src="tpl/win8/js/formValidator_min.js" type="text/javascript"></script>
<script src="tpl/win8/js/formValidatorRegex.js" type="text/javascript"></script>

<link rel="stylesheet" type="text/css" href="/tpl/win8/css/style.css" />

<form id="form1" name="form1" action="regsave.htm" method="POST" >
    <div id="register_main">
        <div class="register_title"></div>
		<div class="register_main_content">
		    <div class="register_option">基本信息</div>
			<div class="register_option line"><input type="radio" name="reginfo[istg]" id="" value="0" checked="checked" />商户</label>
    	    <input type="radio" name="reginfo[istg]" id="" value="1" />推广会员</label>
			<table>
			<tr>
			<td class="r_o_t" width="150"><span>*</span> 用 户 名： </td>
			<td class="r_o_i"><input type="text" name="reginfo[username]" id="newusername" /></td>
			<td class="r_o_m" width="420"><span id="newusernameTip">请填写要注册的商户名</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 邮箱地址：</td>
			<td class="r_o_i"><input type="text" name="reginfo[email]" id="newemail" /></td>
			<td class="r_o_m"><span id="newemailTip">请填写您的邮箱地址</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 手机号码：</td>
			<td class="r_o_i"><input type="text" name="reginfo[phone]" id="newmobile" /></td>
			<td class="r_o_m"><span id="newmobileTip">请填写您的手机号码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 身份证号：</td>
			<td class="r_o_i"><input type="text" name="reginfo[idcard]" id="newidcard" /></td>
			<td class="r_o_m"><span id="newidcardTip">请填写身份证号码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 联系Q Q：</td>
			<td class="r_o_i"><input type="text" name="reginfo[qq]" id="newqq" /></td>
			<td class="r_o_m"><span id="newqqTip">请填写您的QQ号码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 登陆密码：</td>
			<td class="r_o_i"><input type="password" name="reginfo[password]" id="password1" /></td>
			<td class="r_o_m"><span id="password1Tip">请填写密码</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 密码确认：</td>
			<td class="r_o_i"><input type="password" name="reginfo[confirmpassword]" id="password2" /></td>
			<td class="r_o_m"><span id="password2Tip">请再次输入确认密码</span></td>
			</tr>
			</table>

		    <div class="register_option line">收款信息</div>
			<table>
			<tr>
			<td class="r_o_t" width="150"><span>*</span> 收款方式：</td>
			<td class="r_o_i">
			<select name="reginfo[ptype]" id="ptype" onchange="selectptype()">
			<option value="1" selected>银行账户</option>
			<option value="2">支付宝</option>
			<!--<option value="3">财付通</option>-->
			</select></td>
			<td class="r_o_m" width="420"><span>&nbsp; 请选择收款方式</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 结算模式：</td>
			<td class="r_o_i"><select name="reginfo[ctype]"><option value="1">自动结算</option></select></td>
			<td class="r_o_m"><span>&nbsp; 默认自动结算</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"><span>*</span> 开户银行：</td>
			<td class="r_o_i">
			<select name="reginfo[bank]" id="bank">
				<option value="中国工商银行">中国工商银行</option>
				<option value="上海浦东发展银行">上海浦东发展银行</option>
				<option value="中国农业银行">中国农业银行</option>
				<option value="招商银行">招商银行</option>
				<option value="中国建设银行">中国建设银行</option>
				<option value="兴业银行">兴业银行</option>
				<option value="广东发展银行">广东发展银行</option>
				<option value="深圳发展银行">深圳发展银行</option>
				<option value="中国民生银行">中国民生银行</option>
				<option value="交通银行">交通银行</option>
				<option value="中信银行">中信银行</option>
				<option value="中国光大银行">中国光大银行</option>
				<option value="中国银行">中国银行</option>
				<option value="支付宝">支付宝</option>
				<option value="中国邮政储蓄">中国邮政储蓄</option>
			</select></td>
			<td class="r_o_m"><span>&nbsp; 请选择您的开户银行，注册后不能修改</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"><span>*</span> 开户城市：</td>
			<td class="r_o_i">
			<div id="residecitybox">
			<script type="text/javascript">
                showprovince('resideprovince', 'residecity', '', 'residecitybox');
                showcity('residecity', '', 'resideprovince', 'residecitybox'); 
			</script>
			</div>
			</td>
			<td class="r_o_m"><span id="residecityTip">请选择您的开户行所在城市，注册后不能修改</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"><span>*</span> 支行地址：</td>
			<td class="r_o_i"><input type="text" name="reginfo[addr]" id="address" /></td>
			<td class="r_o_m"><span id="addressTip">&nbsp;请填写开户行准确的地址信息，不清楚的可以暂时不填写</span></td>
			</tr>

			<tr class="pt bank">
			<td class="r_o_t"><span>*</span> 收款账号：</td>
			<td class="r_o_i"><input type="text" name="reginfo[card]" id="ubank_no1" /></td>
			<td class="r_o_m"><span id="ubank_no1Tip">请填写您的账号，注册后不能修改</span></td>
			</tr>

			<tr class="pt alipay">
			<td class="r_o_t"><span>*</span> 支付宝账号：</td>
			<td class="r_o_i"><input type="text" name="reginfo[alipay]" id="alipay" /></td>
			<td class="r_o_m"><span id="alipayTip">请填写您的支付宝账号，注册后不能修改</span></td>
			</tr>

			<tr class="pt tenpay">
			<td class="r_o_t"><span>*</span> 财付通账号：</td>
			<td class="r_o_i"><input type="text" name="reginfo[tenpay]" id="tenpay" /></td>
			<td class="r_o_m"><span id="tenpayTip">请填写您的财付通账号，注册后不能修改</span></td>
			</tr>

			<tr>
			<td class="r_o_t"><span>*</span> 真实姓名：</td>
			<td class="r_o_i"><input type="text" name="reginfo[realname]" id="ubank_user" /></td>
			<td class="r_o_m"><span id="ubank_userTip">请填写您的姓名，注册后不能修改</span></td>
			</tr>
			</table>

			<div class="register_option line" style="color:#000;padding-top:10px">注册条款</div>
			<strong style="font-size:14px;color:red">特别申明：赌博、淫秽色情、裸聊、诱导交友、欺诈钓鱼、未取得文网棋牌游戏等类别禁止注册，一经发现封停账号拒绝结算等处理。</strong>
			<div id="register_agreement_container">
				<div id="agreement_content">
					<p>
						<strong><?php echo $this->config['sitename'] ?>多途径支付平台</strong>（以下简称“<?php echo $this->config['sitename'] ?>”）依照本协议及其相关操作规则提供基于互联网的支付网关服务（以下简称“支付网关服务”或“服务”），为申请获得此服务，服务使用人（以下称“用户”）须同意本协议的全部条款并按照“<?php echo $this->config['sitename'] ?>”的提示（包括但不限于页面、邮件等）完成全部的注册程序。用户在进行注册程序过程中点击标示为"同意"的按钮或链接即表示用户完全同意接受本协议项下的全部条款。<br />
						<br />
						<strong>1 服务内容</strong><br />
						1.1 用户选择“<?php echo $this->config['sitename'] ?>”在线支付系统作为用户销售平台首选的在线支付工具，通过“<?php echo $this->config['sitename'] ?>”在线支付系统在互联网上受理用银行卡进行支付的商务交易。“<?php echo $this->config['sitename'] ?>”作为在线支付服务提供商，利用“<?php echo $this->config['sitename'] ?>”在线支付平台为用户提供在线支付及结算服务。“<?php echo $this->config['sitename'] ?>”在线支付系统服务内容包括：为用户在线成功交易代收持卡人所支付的交易金，通过双方的往来账户进行结算，“<?php echo $this->config['sitename'] ?>”按照用户所选择之产品的不同收取一定比例的手续费。<br />
						1.2 “<?php echo $this->config['sitename'] ?>”提供的支付网关服务的具体内容由“<?php echo $this->config['sitename'] ?>”根据实际情况决定。“<?php echo $this->config['sitename'] ?>”保留在通知用户的情况下随时变更、中断或终止部分或全部服务的权利。<br />
						1.3 “<?php echo $this->config['sitename'] ?>”提供的支付网关服务，因服务的不同，会对使用部分服务的用户收取费用。如用户拒绝支付该费用，则不能使用对应的服务。对当前免费或收费的服务，“<?php echo $this->config['sitename'] ?>”不承诺一直免费或收费。<br />
						1.4 “<?php echo $this->config['sitename'] ?>”仅提供支付网关服务，用户为使用此服务而需要的相关设备（包括但不限于电脑、调制解调器及其它与接入互联网有关的装置）及所需的费用（包括但不限于接入互联网而支付的电话费及上网费）均由用户自行负担。</p>
					<p>
						<strong>2 用户责任和义务</strong><br />
						2.1 用户确保所提供电子商务服务中商品的质量及售后服务与其在网上宣传的质量一致。<br />
						2.2 用户应在用户网站电子商务相关页面上如实描述“<?php echo $this->config['sitename'] ?>”银行卡网上支付业务，用户不得采用技术手段或其它非法手段截获持卡人的卡信息，代替持卡人提交订单。用户必须在用户网站引导持卡人到“<?php echo $this->config['sitename'] ?>”网上支付平台亲自提交订单。<br />
						2.3 用户终止电子商务服务或业务发生变更时，应提前一个月通知“<?php echo $this->config['sitename'] ?>”，否则须承担由此给“<?php echo $this->config['sitename'] ?>”造成的一切损失。<br />
						2.4 用户应向“<?php echo $this->config['sitename'] ?>”提供合作网上支付平台所必需的文件、资料、信息及相关工作，以配合“<?php echo $this->config['sitename'] ?>”完成接入系统的相关工作，并对其所提供的上述材料之合法性、完整性及真实性负责。<br />
						2.5 用户承诺在其网上支付页面以适当的方式完整登载“<?php echo $this->config['sitename'] ?>”提供的说明材料。具体登载方式、内容由“<?php echo $this->config['sitename'] ?>”提供，并经双方认可。<br />
						2.6 在用户承诺时间内，对于成功支付的交易用户如果不提供送货或相关服务，由此造成的一切法律上的责任由用户负责。<br />
						2.7 用户不得把“<?php echo $this->config['sitename'] ?>”提供的银行卡网上支付接口技术、安全协议及证书等转交其它网站和企业使用。<br />
						2.8 用户须在网站主页或其他显著位置上添加“<?php echo $this->config['sitename'] ?>”的标识，以确保客户支付流程的畅通。<br />
						2.9 用户在申请使用“<?php echo $this->config['sitename'] ?>”支付网关服务时，必须向“<?php echo $this->config['sitename'] ?>”提供准确的公司资料、基本业务情况说明及相关法律证明，如公司资料有任何变动，用户须及时书面通知“<?php echo $this->config['sitename'] ?>”更新。由于用户所提供的资质材料不准确、不真实等情况而导致的经济和法律方面的责任，由用户承担。<br />
						2.10 在服务有效期内，若银行卡支付时发生技术性障碍，影响实时支付，用户应与“<?php echo $this->config['sitename'] ?>”积极合作，配合相关第三方(如银行、网关、电信等)查明原因，以求妥善处理，所造成的经济损失由责任方承担。<br />
						2.11 用户应同意接受“<?php echo $this->config['sitename'] ?>”通过电子邮件或其他方式向用户发送的商品促销和其它相关商业信息。</p>
					<p>
						<strong>3 “<?php echo $this->config['sitename'] ?>”责任与义务</strong><br />
						3.1 “<?php echo $this->config['sitename'] ?>”负责为用户提供安全加密服务，即为用户使用“<?php echo $this->config['sitename'] ?>”的网上支付功能提供高质量的网络传输加密通道，包括为用户提供订单信息传输的接口规范、配置安全传输协议、后台管理权限设定等。<br />
						3.2 “<?php echo $this->config['sitename'] ?>”负责为用户提供网上安全支付服务，即为用户提供其商务网站进行交易所需要的在线支付与结算功能。通过“<?php echo $this->config['sitename'] ?>”实现网上支付系统与银行交换信息，并将银行的确认信息反馈用户。<br />
						3.3 “<?php echo $this->config['sitename'] ?>”负责为用户提供在线查询服务，即为用户设立网上交易查询功能，为用户提供信息管理和交易信息查询服务，并支持二十四（24）小时在线修改、查询功能。“<?php echo $this->config['sitename'] ?>”在每次成功交易后实时将成功交易数据上传至提供给用户查看数据的服务器上，并同时向用户发送交易成功的书面通知，保证用户及时、准确的查看交易数据。<br />
						3.4 用户户在利用“<?php echo $this->config['sitename'] ?>”网络支付系统进行交易时，由“<?php echo $this->config['sitename'] ?>”对其资金状况进行管理。双方进行结算，“<?php echo $this->config['sitename'] ?>”扣除用户应交给“<?php echo $this->config['sitename'] ?>”的交易手续费后，将剩余的费用支付到用户指定的账号上。<br />
						3.5 “<?php echo $this->config['sitename'] ?>”应确保网上支付系统的正常安全运作，向用户及用户顾客提供安全、有效的网上支付服务。<br />
						3.6“<?php echo $this->config['sitename'] ?>”为用户提供完整的技术接口文档和用户使用手册，并提供操作培训和随系统升级而及时更新文档。<br />
						3.7 “<?php echo $this->config['sitename'] ?>”有责任指派专门的技术负责人协助用户调试接口程序。<br />
						3.8 “<?php echo $this->config['sitename'] ?>”不得将用户有关的任何商业资料以任何形式透露给任何第三方；<br />
						3.9 由于“<?php echo $this->config['sitename'] ?>”的原因引起的一切客户投诉或引起的法律上的责任，由“<?php echo $this->config['sitename'] ?>”负责，如因此造成用户损失，“<?php echo $this->config['sitename'] ?>”应向用户承担赔偿责任。<br />
						3.10 用户有下列情形之一的，“<?php echo $this->config['sitename'] ?>”有权立即终止本协议，并追偿导致的损失：<br />
						1） 与客户串通诈骗银行资金的；<br />
						2） 故意诋毁或损害“<?php echo $this->config['sitename'] ?>”网上银行声誉的；<br />
						3） 连续90天没有交易发生的；<br />
						4） 无理拒绝受理客户使用用户网上支付系统进行交易的；<br />
						5） 销售国家禁止流通、限制流通商品或提供非法服务的；<br />
						6） 产品质量低劣给消费者造成重大损失或信誉低下的；<br />
						7） 累计3次以上经法院判决或仲裁对客户存在欺诈行为的；<br />
						8） 经公安机关、工商税务等国家部门认定已无业务资格的；<br />
						9） 开展的业务范围涉及如下内容的：<br />
						反对宪法所确定的基本原则的；<br />
						危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；
						<br />
						损害国家荣誉和利益的；<br />
						煽动民族仇恨、民族歧视，破坏民族团结的；<br />
						破坏国家宗教政策，宣扬邪教和封建迷信的；<br />
						散布谣言，扰乱社会秩序，破坏社会稳定的；<br />
						散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br />
						涉及赌博、洗钱、套现、传销等活动的；<br />
						侮辱或者诽谤他人，侵害他人合法权益的；<br />
						含有欺骗性的。</p>
					<p>
						 </p>
					<p>
						<strong>4 服务开通、变更、中断和终止</strong><br />
						4.1 用户如需使用本支付网关服务，须仔细阅读并严格遵守“<?php echo $this->config['sitename'] ?>”制定的该服务协议，完成全部注册程序，才能成为“<?php echo $this->config['sitename'] ?>”支付网关服务的用户。<br />
						4.2 “<?php echo $this->config['sitename'] ?>”有权根据系统升级等需要暂时中断提供服务，但应提前七天告知用户，并预告恢复日期，同时，本服务使用期限顺延相应天数。<br />
						4.3 “<?php echo $this->config['sitename'] ?>”有权自行决定对支付网关服务内容进行改动和升级，但应提前三天告知用户，并预告完成日期。<br />
						4.4 因“<?php echo $this->config['sitename'] ?>”之外的第三方所造成的服务中断和终止（包括但不限于自然灾害、战争、以及不能预见、不能避免和不能克服的事件或情况），“<?php echo $this->config['sitename'] ?>”不承担责任。<br />
						4.5 用户有权终止本协议，但至少提前10个工作日书面通知“<?php echo $this->config['sitename'] ?>”，并及时清结与“<?php echo $this->config['sitename'] ?>”的债权债务。“<?php echo $this->config['sitename'] ?>”对结算过程中一切未了结的债权债务保留追索的权利。<br />
						4.6 “<?php echo $this->config['sitename'] ?>”保留因自身业务变更而终止向用户提供服务的权利，至少提前10个工作日通知用户，并清结与用户之间的债权债务。</p>
					<p>
						5 内容所有权及保密<br />
						5.1 “<?php echo $this->config['sitename'] ?>”提供的网络服务内容包括但不限于：文字、软件、声音、图片、录象、图表等。所有这些内容归“<?php echo $this->config['sitename'] ?>”所有，受版权、商标和其它财产所有权法律的保护。<br />
						5.2 用户只有在获得“<?php echo $this->config['sitename'] ?>”或其他相关权利人的授权之后才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。<br />
						5.3 用户同意，在“<?php echo $this->config['sitename'] ?>”向用户提供服务过程中可能需要接触、了解“<?php echo $this->config['sitename'] ?>”的生产、经营、管理信息，这些信息对“<?php echo $this->config['sitename'] ?>”来说是非常重要的，一旦泄露，将使“<?php echo $this->config['sitename'] ?>”丧失竞争优势或处于不利地位，因此，用户保证对其在工作中知悉到的（不论是“<?php echo $this->config['sitename'] ?>”提供的还是用户偶然获得的）任何“<?php echo $this->config['sitename'] ?>”的经营管理信息，以及“<?php echo $this->config['sitename'] ?>”为履行本协议而向用户披露的“<?php echo $this->config['sitename'] ?>”的文件、资料和经营、管理、生产工艺、流程、文件，负有严格的保密义务，不得以任何形式予以公开、发表或向任何第三方提供、泄露；未经“<?php echo $this->config['sitename'] ?>”事先书面许可，用户在今后的教学、培训、论文发表、研讨、演讲等公开场合或为他方提供咨询服务过程中不得以任何明示或暗示方式提供、引用“<?php echo $this->config['sitename'] ?>”的资料、或以“<?php echo $this->config['sitename'] ?>”事例为案例。对于使用完毕的“<?php echo $this->config['sitename'] ?>”提供的任何技术、经营、管理、工艺、流程文件或其他资料，包括在服务过程中所起草的的草稿或过程文件，用户须在服务期限结束后销毁或归还北京云网。除非：<br />
						1. 在披露这些资料信息于任何一方时，资料信息是公示的；<br />
						2. 非因违反本义务规定而随后进入公示范围的资料信息；<br />
						3. 依据法律或在任何诉讼过程中的要求披露的资料信息；或，<br />
						4. 在进行披露之前，该等资料信息是为任何一方所合法拥有的并有任何一方或它的代表人的书面记录为证。<br />
						5.4 保密期限不受本协议期限的限制。在期限届满后，用户仍应保护北京云网的商业秘密，尊重并保证不侵犯“<?php echo $this->config['sitename'] ?>”因提供服务所获得之成果及其所附的一切权益。</p>
					<p>
						<strong>6 隐私保护</strong><br />
						6.1“<?php echo $this->config['sitename'] ?>”保证不对外公开或向第三方提供用户注册资料及用户在使用网络服务时存储在“<?php echo $this->config['sitename'] ?>”的非公开内容，但下列情况除外：<br />
						事先获得用户的明确授权；<br />
						根据有关的法律法规要求；<br />
						按照相关政府主管部门的要求；<br />
						为维护社会公众的利益；<br />
						为维护“<?php echo $this->config['sitename'] ?>”的合法权益。<br />
						6.2 “<?php echo $this->config['sitename'] ?>”可能会与第三方合作向用户提供相关的网络服务，在此情况下，如该第三方同意承担与“<?php echo $this->config['sitename'] ?>”同等的保护用户隐私的责任，则“<?php echo $this->config['sitename'] ?>”可将用户的注册资料等提供给该第三方。<br />
						6.3 在不透露单个用户隐私资料的前提下，“<?php echo $this->config['sitename'] ?>”有权对整个用户数据库进行分析并对用户数据库进行商业上的
				</div>
			</div>

			<div style="margin:20px 0;font-size:14px;text-align:center">
			<input type="radio" name="agree" value="yes" id="r1" checked> <label for="r1">同意</label>&nbsp;&nbsp;&nbsp;
			<input type="radio" name="agree" value="no" id="r2"> <label for="r2">不同意</label>
			</div>

			<div style="text-align:center"><input type="submit" value="" class="register_button" /></div>

		</div>
	</div>
	</form>
<script type="text/javascript">
    var selectptype=function(){
		var val=$('#ptype').val();
		
	    if(val=='1'){
			$("#residecity").attr("disabled",false).unFormValidator(false);
			$("#ubank_no1").attr("disabled",false).unFormValidator(false);
			$("#address").attr("disabled",false);
			$("#bank").attr("disabled",false);
			$('tr.bank').show();
			
			$("#alipay").attr("disabled",true).unFormValidator(true);
			$("#tenpay").attr("disabled",true).unFormValidator(true);  
			$('tr.pt:not(.bank)').hide();			
			
		} else if(val=='2'){		
			$("#alipay").attr("disabled",false).unFormValidator(false);
		    $('tr.alipay').show();
			$('tr.pt:not(.alipay)').hide();			
			$("#residecity").attr("disabled",true).unFormValidator(true);
			$("#ubank_no1").attr("disabled",true).unFormValidator(true);
			$("#address").attr("disabled",true);
			$("#bank").attr("disabled",true);
			$("#tenpay").attr("disabled",true).unFormValidator(true);

		} else if(val=='3'){
			$("#tenpay").attr("disabled",false).unFormValidator(false);
		    $('tr.tenpay').show();
			$('tr.pt:not(.tenpay)').hide();	
			$("#residecity").attr("disabled",true).unFormValidator(true);
			$("#ubank_no1").attr("disabled",true).unFormValidator(true);
			$("#address").attr("disabled",true);
			$("#bank").attr("disabled",true);
			$("#alipay").attr("disabled",true).unFormValidator(true);	
		}
	}

$(function(){
	$("#newusername").focus();
	
	$("#r2").click(function(){
		$(".register_button").attr("disabled",true);
		$(".register_button").addClass('notallowsubmit');
	});

    $("#r1").click(function(){
		$(".register_button").attr("disabled",false);
		$(".register_button").removeClass('notallowsubmit');
	});

	$.formValidator.initConfig({formid:"form1",onerror:function(msg){alert(msg)},onsuccess:function(){ return true; }});
	$("#newusername").formValidator({onshow:"请填写要注册的用户名",onfocus:"用户名至少6个字符，最多20个字符",onempty:"用户名必须填写",oncorrect:"该用户名可以注册"}).inputValidator({min:5,max:20,onerror:"您填写的用户名长度不正确，请确认"}).regexValidator({regexp:"username",datatype:"enum",onerror:"用户名必须是字母开头，且只能为字母或数字"})
	    .ajaxValidator({
	    type : "get",
		url : "checkuser.htm",
		success : function(data){
            if(data=='0'){
                return true;
			} else {
                return false;
			}
		},
		buttons: $(".register_button"),
		error: function(){alert("服务器没有返回数据，可能服务器忙，请重试！");},
		onerror : "该用户名已被使用，请更换！",
		onwait : "正在对用户名进行合法性校验，请稍候..."
	});

	$("#newemail").formValidator({onshow:"请填写您的邮箱地址",onfocus:"用于找回密码、接收校验信息",oncorrect:"邮箱填写完成",defaultvalue:"@"}).inputValidator({min:6,max:100,onerror:"您填写的邮箱长度不正确，请确认"}).regexValidator({regexp:"^([\\w-.]+)@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.)|(([\\w-]+.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(]?)$",onerror:"您填写的邮箱格式不正确，请确认"});
	$("#newmobile").formValidator({onshow:"请填写您的手机号码",onfocus:"请填写您的手机号码",oncorrect:"手机号码填写完成",onempty:"手机号码必须填写"}).inputValidator({min:11,max:11,onerror:"手机号码必须是11位"}).regexValidator({regexp:"mobile",datatype:"enum",onerror:"您输入的手机号码格式不正确"});
	$("#newidcard").formValidator({empty:true,onshow:"真实有效的身份证",onfocus:"真实有效的身份证",oncorrect:"请确认无误，注册后不能修改",onempty:"身份证号码注册后不能修改"}).inputValidator({max:18,onerror:"身份证号码最多18位字符"});
	$("#newqq").formValidator({onshow:"请填写您的QQ号码",onfocus:"请填写您的QQ号码",oncorrect:"QQ号码填写完成",onempty:"QQ号码必须填写"}).inputValidator({min:5,max:12,onerror:"最少5位，最多12位字符"});
	$("#password1").formValidator({onshow:"请填写登录密码，至少6位字符",onfocus:"登录密码不能为空",oncorrect:"登录密码填写完成"}).inputValidator({min:6,empty:{leftempty:false,rightempty:false,emptyerror:"密码两边不能有空符号"},onerror:"密码不能为空，请确认"});
	$("#password2").formValidator({onshow:"请确认登录密码",onfocus:"两次密码必须一致",oncorrect:"密码一致"}).inputValidator({min:6,empty:{leftempty:false,rightempty:false,emptyerror:"重复密码两边不能有空符号"},onerror:"重复密码不能为空，请确认"}).compareValidator({desid:"password1",operateor:"=",onerror:"两次密码不一致，请确认"});
	$("#BankList").formValidator({onshow:"请选择您的开户银行，注册后不能修改",onfocus:"请选择您的开户银行",oncorrect:"开户行填写完成，注册后不能修改",onempty:"开户银行必须选择"}).inputValidator({min:1,onerror:"开户银行必须选择"});
	$("#residecity").formValidator({onshow:"请选择您的开户银行所在城市，注册后不能修改",onfocus:"请选择您的开户银行所在城市",oncorrect:"请确认无误，注册后不能修改",onempty:"开户银行所在城市必须选择"}).inputValidator({min:1,onerror:"请选择您的开户银行所在城市"});
	$("#ubank_no1").formValidator({onshow:"请填写您的收款账号，注册后不能修改",onfocus:"请填写您的收款账号，请确认无误",oncorrect:"收款账号填写完成"}).regexValidator({regexp:"^.{6,30}$",onerror:"您填写的收款账号格式不正确"});
	$("#ubank_no2").formValidator({onshow:"请确认您的收款账号",onfocus:"请确认两次收款账号一致",oncorrect:"收款账号一致"}).regexValidator({regexp:"^.{6,30}$",onerror:"您填写的收款账号格式不正确"}).compareValidator({desid:"ubank_no1",operateor:"=",onerror:"两次收款账号不一致，请确认"});
    $("#ubank_user").formValidator({onshow:"请填写收款人姓名，注册后不能修改",onfocus:"请填写收款人姓名，注册后不能修改",oncorrect:"收款人姓名填写完成。",onempty:"收款人姓名必须填写"}).inputValidator({min:2,onerror:"收款人姓名必须填写真实姓名"});
	$("#alipay").formValidator({onshow:"请填写您的支付宝账号，注册后不能修改",onfocus:"请填写您的账号，仔细填写",oncorrect:"支付宝账号填写完成",onempty:"支付宝账号必须填写"}).inputValidator({min:10,onerror:"支付宝账号必须填写"});
	$("#tenpay").formValidator({onshow:"请填写您的财付通账号，注册后不能修改",onfocus:"请填写您的账号，仔细填写",oncorrect:"财付通账号填写完成",onempty:"财付通账号必须填写"}).inputValidator({min:5,onerror:"财付通账号必须填写"});
selectptype();
});
</script>