<?php if(!defined('WY_ROOT')) exit; ?>


<style>
    .main img {
        width: 100%;
    }
</style>

<div class="col-md-12">
    <div class="panel panel-default panel-shadow" data-collapsed="0">
        <div class="panel-heading">
            <div class="panel-title">绑定微信</div>
        </div>
        <!-- panel body -->
        <div class="panel-body">
            <div class="main" style="text-align: center;">
                <h2 style="padding: 15px 0; color: #008B45; font-size: 16px;">微信扫描二维码关注<?php echo SITENAME ?>平台公众号</h2>
                <img src="<?php echo $ewm;?>" width="250"/>
                <h2 style="text-align: center; padding: 15px 0; color: #008B45; font-size: 16px;">扫描二维码绑定账号，如提示绑定失败，请通过以下步骤绑定。</h2>
                <h2 style="text-align: center; padding: 15px 0; color: #008B45; font-size: 16px;">提示：关注后可通过手机微信管理卡密及订单信息</h2>
                <h2 style="text-align: center; padding: 15px 0; color: #FF0000; font-size: 16px;">第一步：扫描二维码关注我们</h2>
                <h2 style="text-align: center; padding: 15px 0; color: #FF0000; font-size: 16px;">第二步：进入微信公众号</h2>
                <img src="/usr/skyblue/images/wxbind.jpg" />
                <h2 style="text-align: center; padding: 15px 0; color: #FF0000; font-size: 16px;">第三步：绑定平台帐号</h2>
                <img src="/usr/skyblue/images/ka_2.jpg" />
                <h2 style="text-align: center; padding: 15px 0; color: #FF0000; font-size: 16px;"></h2>
                <img src="/usr/skyblue/images/ka_3.jpg" />
                <h2 style="text-align: center; padding: 15px 0; color: #FF0000; font-size: 16px;">第四步：成功绑定，支付成功订单通知以及结算微信通知</h2>
                <img src="/usr/skyblue/images/wq_notfi.jpg" />
            </div>

        </div>

    </div>

</div>
