<?php
if (!defined('WY_ROOT'))
	exit ;
 ?>
<div class="banner">
    <div class="slide">
        <img src="tpl/yc88net/picture/banner4.jpg" />
    </div>
</div>
<style type="text/css">
    .header {
        height: 330px;
    }

    .center_text h2 {
        margin-top: 25px;
        height: 80px;
        line-height: 80px;
        text-align: center;
        color: #1185e8;
        font-size: 24px;
        margin-bottom: 30px;
    }
</style>
    </div>
<style type="text/css">
    .page_header {
        width: 100%;
        height: 100px;
        overflow: hidden;
        border-bottom: solid 1px #f0f0f0;
    }

        .page_header h1 {
            width: 194px;
            height: 100px;
            line-height: 100px;
            float: left;
            font-size: 40px;
            text-align: center;
        }

        .page_header .recent {
            width: 300px;
            height: 100px;
            line-height: 100px;
            float: right;
        }

    .page_content {
        width: 1198px;
        margin: 0 auto 50px 0;
        border-bottom: solid 1px #f0f0f0;
        border-left: solid 1px #f0f0f0;
        overflow: hidden;
    }

    .left_nav {
        width: 211px;
        float: left;
        margin-top: 25px;
    }

        .left_nav ul li {
            height: 50px;
            line-height: 50px;
            float: none;
            text-align: center;
        }

            .left_nav ul li.active {
                background: #1185e8;
            }

            .left_nav ul li a {
                display: inline-block;
                width: 194px;
                height: 50px;
                line-height: 50px;
            }

            .left_nav ul li.active a {
                color: #ffffff;
            }

    .center_text {
        width: 885px;
        float: right;
        border-left: solid 1px #f0f0f0;
        border-right: solid 1px #f0f0f0;
        padding: 0 50px 80px 50px;
        min-height: 550px;
    }
</style>
<div class="main">
    <div class="main-content" style="margin: 30px auto;">
        <div class="page_header">
            <h1>帮助中心</h1>
            <div class="recent">
                <span>
                    当前位置：
                    <a href="/">首页</a>&gt; 帮助中心
                </span>
            </div>
        </div>
        <div class="page_content">
            <div class="left_nav">
                <ul>
                    <li>
                        <a href="/about.htm">关于我们</a>
                    </li>
                    <li>
                        <a href="/contact.htm">联系我们</a>
                    </li>
                    <li class="active">
                        <a href="/faq.htm">帮助中心</a>
                    </li>
                    <li>
                        <a href="/qiye.htm">企业资质</a>
                    </li>
                    <li>
                        <a href="/goumai.htm">购买流程</a>
                    </li>
					<li>
                        <a href="/statement.htm">免责声明</a>
                    </li>
                    <li>
                        <a href="/useful.htm">使用条款</a>
                    </li>
                    <li>
                        <a href="/course.htm">发展历程</a>
                    </li>
                </ul>
            </div>
            <div class="center_text">
                <h2>帮助中心</h2>
                <div class="TextMain" style="line-height: 40px; font-size: 14px;">
                    <div style="padding:1px">
                        <div>
                            <p style="color: #390;font-size: 16px;">1. <?php echo $this->config['sitename'] ?>是什么样的平台？</p><?php echo $this->config['sitename'] ?>是一个专业的软件卡密等虚拟商品在线交易平台,拥有多种兑换方式,费率低,结算快,正规企业平台一直稳定运营,24小时不间断提供自动发卡服务,打破传统购卡售卡体系,为商家提供安全、快捷、简单的售兑卡体系，灵活的系统完成全自动的销售发卡和兑卡操作
                        </div>
                        <div>
                            <p style="color: #390;font-size: 16px;">2. 如何更改收款账号，和联系QQ等重要信息？</p>商户收款信息对于商户至关重要暂不支持自助修改，如需修改商户收款信息请联系平台客服并且提供注册时填写的身份证验证通过后方可重置新的收款信息。
                        </div>
                        <div>
                            <p style="color: #390;font-size: 16px;">3. 你们是如何结算、结算时间及手续费多少？</p>目前平台执行的标准是：商户账户金额满100元/次日结算，未满的累计满100元后将在次日自动结算。
                            <br>正常情况会在的中午12点之前出款完毕，并且在出款后两小时左右到账，具体入款时间以银行为准。最迟将在下午17点前出款完毕，365天正常结算
                        </div>
                        <div>
                            <p style="color: #390;font-size: 16px;">4. 你们会有黑单的情况吗？</p>100%保证绝不存在黑单现象，正规平台，诚信运营，但由于网络原因可能会导致订单返回结果延时等情况，我们会努力避免这种情况的发生，如对订单状态有疑问，请一定及时与客服取得联系查询核实订单详情。
                        </div>
                        <div>
                            <p style="color: #390;font-size: 16px;">5. 平台信誉的信誉有保障吗？</p>虽然我们平台上线不久，但已经是全行业领导者，全行业最大的寄售平台。我们坚信信誉、对商户负责才是长久发展之道，因此受到了众多商户的青睐，也收到了很多商户的反馈意见，促使我们在一直进步着；平台由公司正规运营并且每日结算，不会存在跑路等损人损己的事情，而且我们已经通过网监、工商、工信等部门的备案！
                        </div>
                        <div>
                            <p style="color: #390;font-size: 16px;">6. 如果设置账户安全措施？</p>商户正常登陆商户中心，在【账户信息】下找到【安全设置】，请根据系统提示完成安全措施的应用；成功应用安全措施后可以有让账户更安全，有效防止卡密被盗的情况发生，为了账户的安全，建议启用该功能。
                            <p style="color: #390;font-size: 16px;">7. 网站运行稳定，容易给攻击吗？</p>网站稳定运行，有四到七层的DDoS攻击防护，无视不限于包括CC、SYN flood、UDP flood等所有DDoS攻击方式，通过分布式高性能防火墙＋精准流量清洗＋CC防御+web攻击拦截，组合过滤精确识别，完美防御各种类型攻击，海量带宽，百度级服务的速度和稳定。云加速节点遍布全球，通过智能DNS解析等技术，将访问网站的用户引导至最近最快的节点，同时通过动静态加速及页面优化技术，访问速度和用户体验
                        </div>
                        <p style="color: #390;font-size: 16px;">8. 如何识别假冒及防范假冒的 <?php echo $this->config['sitename'] ?>？</p>1）
                        <strong>留意包含附件和链接的电子邮件</strong>
                        <br><?php echo $this->config['sitename'] ?>不会向用户发送包含附件的电子邮件，更不会要求您在一个和 <?php echo $this->config['sitename'] ?>无关的网页上输入信息。 如果您收到看似 <?php echo $this->config['sitename'] ?>发送的含附件的电子邮件，请勿打开附件。
                        <br>请尽量不要点击链接。<?php echo $this->config['sitename'] ?>可能也会发送包含链接的电子邮件，但仅为跳转到相关信息便于查询。另：即使提供直接访问 <?php echo $this->config['sitename'] ?>页面的链接，<?php echo $this->config['sitename'] ?>也不会要求您提交敏感信息（如账户密码等）！
                        <br>2）
                        <strong>向 <?php echo $this->config['sitename'] ?>举报可疑的电子邮件</strong>
                        <br><?php echo $this->config['sitename'] ?>决不会要求您通过电子邮件提供登录密码、银行卡卡号或其他敏感信息。若要提供相关信息，必定会引导您返回 <?php echo $this->config['sitename'] ?>网站。 如果您收到了要求您登录或提供用户信息的电子邮件，并怀疑是否假冒了 发卡网的名义发送，请立刻联系我们的客服。
                    </div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
