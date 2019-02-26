<?php if(!defined('WY_ROOT')) exit; ?>
    <div class="pagecontent">
    <ul class="page_faq">
      <p class="title">常见问题</p>
      <li><?php echo $this->config['sitename'] ?>是什么样的平台？ 
      <p><?php echo $this->config['sitename'] ?>是一个构造卡类兑换,卡类寄售的服务平台,打破传统购卡售卡体系,为商家提供安全、快捷、简单的售兑卡体系，灵活的系统完成全自动的销售发卡和兑卡操作,自动发发卡,点卡类交易兑付的服务机构。</p>
      </li>
      <li><?php echo $this->config['sitename'] ?>提供API以及网关的自主接入吗？ 
      <p><?php echo $this->config['sitename'] ?>是一个大型的点卡类交易兑付的服务机构,并不是API及网关自主接入的第三方支付服务商。</p>
      </li>
      <li>使用<?php echo $this->config['sitename'] ?>的点卡兑换交易安全吗？ 
      <p><?php echo $this->config['sitename'] ?>拥有的游戏卡厂、中国移动神州行、以及中国电信、联通支付方式,所涉及到的数据包都经过多重签名加密,保证数据传输过程中的唯一性和不可伪造性,服务器端采用verisign提供的ssl证书,确保敏感数据在公网传输过程中的安全性。<br><?php echo $this->config['sitename'] ?>为了保障数据库的安全性，采用了单机容错技术配合远程数据同步,确保毁灭性灾难来临时数据无损,<?php echo $this->config['sitename'] ?>众多的外部节点服务器在解决电信网通互访瓶颈的同时,更起到了流量攻击的抵御能力，确保<?php echo $this->config['sitename'] ?>能够对商户提供全年不间断的服务!</p>
      </li>
      
      <li>如何识别假冒及防范假冒的<?php echo $this->config['sitename'] ?>？  <p>1）<strong>确保您的网址正确</strong><br>点击登录前，请先检查浏览器中的网址。<?php echo $this->config['sitename'] ?>登录页面的网址开头为：   http://<?php echo $this->config['siteurl'] ?>/ 。如果网址中第一个斜杠 (/) 前面非<?php echo $this->config['siteurl'] ?>   ，请勿输入您的<?php echo $this->config['sitename'] ?>用户名和密码。如果您要点击电子邮件中的链接，先确认浏览器中显示的网址和电子邮件显示的一致。 
      谨防假冒<?php echo $this->config['sitename'] ?>的网站<br><br>2）<strong>请务必在以 http://<?php echo $this->config['siteurl'] ?>/ 
      为路径开头的页面上输入<?php echo $this->config['sitename'] ?>密码</strong>，勿在其他路径的页面中输入。即使路径中包含有 <?php echo $this->config['siteurl'] ?> 
      一词的网页，也有可能不是<?php echo $this->config['sitename'] ?>的网页。如果网址中斜杠前包含其他字符，如 @ 、下划线等，那么该网站绝不是<?php echo $this->config['sitename'] ?>的网站。<br>还有一些假冒的网站（也称为 “ 
      欺诈 ” 网站）会仿照<?php echo $this->config['sitename'] ?>的页面风格来获取您的密码进而得到对您账户的访问权限。 <br>登录之前，请检查您浏览器中的网址。 
      所有真正的<?php echo $this->config['sitename'] ?>登录页面的网址开头均为： http://<?php echo $this->config['siteurl'] ?>/ 。 如果第一个斜杠 (/) 前面没有立即出现 
      <?php echo $this->config['siteurl'] ?> ，请千万不要输入您的<?php echo $this->config['sitename'] ?>用户名和密码。</p></li>
      
      <li>发现可疑邮件和虚假网站怎么办？ 
      <p>1）<strong>留意包含附件和链接的电子邮件</strong><br><?php echo $this->config['sitename'] ?>不会向用户发送包含附件的电子邮件，更不会要求您在一个和<?php echo $this->config['sitename'] ?>无关的网页上输入信息。 
      如果您收到看似<?php echo $this->config['sitename'] ?>发送的含附件的电子邮件，请勿打开附件。 
      <br>请尽量不要点击链接。<?php echo $this->config['sitename'] ?>可能也会发送包含链接的电子邮件，但仅为跳转到相关信息便于查询。另：即使提供直接访问<?php echo $this->config['sitename'] ?>页面的链接，<?php echo $this->config['sitename'] ?>也不会要求您提交敏感信息（如账户密码等）！ 
      <br><br>2）<strong>向<?php echo $this->config['sitename'] ?>举报可疑的电子邮件</strong><br><?php echo $this->config['sitename'] ?>决不会要求您通过电子邮件提供登录密码、银行卡卡号或其他敏感信息。若要提供相关信息，必定会引导您返回<?php echo $this->config['sitename'] ?>网站。 
      如果您收到了要求您登录或提供用户信息的电子邮件，并怀疑是否假冒了<?php echo $this->config['sitename'] ?>的名义发送，请立刻联系我们的客服。</p></li>
      </ul>
    </div>
    
        <div class="pagecontent">
    <ul class="page_faq">
      <p class="title">新手指南</p>
      <li>屏蔽弹出窗口
      <p>请务必关闭“google工具栏”等“屏蔽弹出窗口”的工具，否则很可能会在支付中无法看到银行的操作提示，或支付成功后无法看到商家提示“支付成功”的页面。</p>
      </li>
      <li>使用ie浏览器 
      <p>推荐使用ie 浏览器，尽量不要使用其它浏览器，以免因系统不兼容导致无法正常支付。</p>
      </li>
      <li>用ie打开有时候会出现“内存不能读”错误，怎么办？ 
      <p>如果重复支付几次提示的错误一样，可能由于 ie 缓存造成，可以在 ie 的工具菜单中选择“internet选项”，点击“删除 cookies”和“删除文件”的按钮后再重新下订单、支付</p>
      </li>
      <li>注册时没有填写详细资料，以后可以填写吗？ <p>可以，可以以后填写，但是银行帐号信息用于收款、提现等操作必须在注册的时候填写,而且以后修改需要联系客操作,建议注册的时候认证填写。</p></li>
      
      <li>为什么要设置安全码？
      <p>安全码必须设置,如果你需要设置相关安全性的操作或修改基本资料等,就必须通过安全码认证后才可以成功修改。</p></li>
      
      <li>为什么有的支付方式我没有？ 
      <p>可能是您没有开启。您可以打开支付方式的页面，开启或关闭支付方式。</p></li>
      
      <li>如何设置开启新的支付方式？
      <p>您可以打开支付方式页面，开启或关闭支付方式。您可以自己设定所需要的支付方式。</p></li>
      
      <li>可以修改我的换购价格吗,就是支付费率？ 
      <p>可以调整您的支付费率，您只用在费率调整中选择费率值修改即可。 </p></li>      
      </ul>
	</div>
	</div>