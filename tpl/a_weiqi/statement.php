    

<?php if(!defined('WY_ROOT')) exit; ?>
<div class="wwmain">
    <div class="wwcolumntit">
        <div class="wwcrumbs">
            <a href="index.htm">首页</a>>
                	<a class="cur" href="javascript:;">免责声明</a>
        </div>
        <h3>免责声明</h3>
    </div>
    <div class="wwmembercosle">
        <a class="wwmemberright" href="javascript:;"></a>
        <a class="wwmemberleft" href="javascript:;"></a>
        <div class="wwmemberdiv">
            <ul class="clearfix">

                <li><a href="about.htm" rel="_menu7">公司简介</a></li>

                <li><a href="course.htm" rel="_menu8">发展历程</a></li>

                <li><a href="statement.htm" rel="_menu9">免责声明</a></li>

                <li><a href="useful.htm" rel="_menu10">企业资质</a></li>

                <li><a href="settlement.htm" rel="_menu11">费率及结算</a></li>

                <li><a href="contact.htm" rel="_menu12">联系我们</a></li>
                      <li><a href="faq.htm" rel="_menu13">常见问题</a></li>
            </ul>
            <script>
                $("#_topChannel2").addClass("cur");
            </script>
            <script>
                $("a[rel='_menu9']").addClass("cur");
            </script>
        </div>
    </div>

    <div class="aboutbox">
        <div class="companyIntroduction">
            <p>
                <span style="FONT-SIZE: 16px; line-height: 32px;line-height:38px;">
                   <?php echo $this->config['sitename'] ?>提醒您：在交易购买前请您务必仔细阅读并透彻理解本声明。
            您可以选择不使用本平台商户提供的商品及服务，如果您选择使用，您的使用行为将被视为对本声明全部内容的认可。
              使用本平台的商户必须严格遵守国家相关法律法规及注册协议,任何通过使用<?php echo $this->config['sitename'] ?>发布的商品，不反映和代表<?php echo $this->config['sitename'] ?>的任何意见或主张及行为，也不表示<?php echo $this->config['sitename'] ?>同意或支持该等商品的任何内容、主张或立场。
                <?php echo $this->config['sitename'] ?>仅提供商品发布以及兑换帮助的服务，以及商户发布商品的合法性，真实性进行监管，对于商户发布的商品的容之、准确性、真实性、适用性、安全性还需要您在购买之前慎辨别和选择，如果在您购买付款后3个工资日内没有及时与我们的客服进行联系，造成的损失将由您自行承担！
                  除与<?php echo $this->config['sitename'] ?>有另行书面约定的服务外，商户应该对使用<?php echo $this->config['sitename'] ?>发布商品的结果自行承担风险，一切因发布商品产生的交易纠纷及可能遭致的侵权及其他损失，<?php echo $this->config['sitename'] ?>对其概不负责，亦不承担任何法律责任，<?php echo $this->config['sitename'] ?>仅做中介调节或协商处理。
                    对于平台商户销售的商品不做任何形式的保证：不保证您购买的商品结果满足您的要求，不保证购买的服务不中断等。因网络状况、通讯线路、电力故障、第三方网站等任何原因而导致您不能正常使用，<?php echo $this->config['sitename'] ?>网不承担任何法律责任。
                      如果<?php echo $this->config['sitename'] ?>商户发布的商品侵犯了您的权益，请您在第一时间与我们联系。</span></p>
            <br />
        </div>
    </div>
</div>