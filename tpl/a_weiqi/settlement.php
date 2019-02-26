<?php if(!defined('WY_ROOT')) exit; ?>
<div class="wwmain">
    <div class="wwcolumntit">
        <div class="wwcrumbs">
            <a href="index.htm">首页</a>>
                	<a class="cur" href="javascript:;">免责声明</a>
        </div>
        <h3>费率及结算</h3>
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
                $("a[rel='_menu11']").addClass("cur");
            </script>
        </div>
    </div>

    <div class="aboutbox">
        <div class="companyIntroduction">
            <table class="tabledata" cellpadding="0" cellspacing="0" border="1" style="text-align: center;">
                <thead>
                    <tr style="background: #00AFF3;">
                        <td>结算模式</td>
                        <td>结算时间</td>
                        <td>手续费</td>
                        <td>结算标准</td>
                        <td>备注说明</td>
                    </tr>
                </thead>

                <tr style="background: #fff;">
                    <td class="border_right">自动结算</td>
                    <td class="border_right">当日22:00</td>
                    <td class="border_right">0</td>
                    <td class="border_right">满500元</td>
                    <td>满500元即可自动结算，无需申请</td>
                </tr>

                <tr style="background: #fff;">
                    <td class="border_right border-top">申请结算</td>
                    <td class="border_right border-top">当日</td>
                    <td class="border_right border-top">0</td>
                    <td class="border_right border-top">≥50元</td>
                    <td class="border-top">满50元即可提交结算申请，当日22:00-00:00统一结算。</td>
                </tr>
                <tr class="even">
                    <td class="border_right border-top">申请小额结算</td>
                    <td class="border_right border-top">当日</td>
                    <td class="border_right border-top">3%</td>
                    <td class="border_right border-top">满20元 / 日结</td>
                    <td class="border-top">需申请，适合资金量小的商户，转账手续费按结算金额3%收取。</td>
                </tr>
            </table>
            <p style="padding: 5px 0 0;">
                <strong style="color: #0248a3;">关于自动结算：</strong>
                审核通过的商户将在当日22:00-00:00进行结算，商户无投诉信息，则当日可到账，具体规则请查看平台公告
            </p>
            <p style="padding: 5px 0 10px;">
                <strong style="color: #0248a3;">结算收款提示：</strong>推荐使用微信收款，可即时到账，切勿使用信用卡收款，避免结算失败！
            </p>
            <br />
        </div>
    </div>
</div>
<style>
    .tabledata {
        width: 99%;
        margin: 10px 0px 15px 0px;
        border: 1px solid #ccc;
        border-collapse: collapse;
    }

        .tabledata thead tr {
            background: #00AFF3;
        }

            .tabledata thead tr td {
                color: #ffffff;
            }

        .tabledata thead td {
            border: 1px solid #ccc;
            font-size: 14px;
            font-weight: 700;
            text-align: center;
            background: url(../images/titbg.png) repeat-x;
            height: 48px;
            line-height: 48px;
        }

        .tabledata tbody td {
            border: 1px solid #ccc;
            height: 48px;
            line-height: 48px;
            text-align: center;
            font-size: 14px;
        }
</style>
