<div class="well">
    <!--{foot-->
    
    <div class="foot-bottom clearfix" style="color: #a2aeb5; font-size: 12px;">
        <p>免责声明（向陌生人付款,请注意交易风险,否则造成的经济损失自负！）</p>
        <p>
            请认真核对商品信息，如遇商品： 假卡/诈骗/钓鱼等请务必购买当天22点之前投诉，逾期不支持退款。
                         <a href="javascript:void(0)" onclick="showAjaxModal('report.php?action=mobile&uid=<?php echo $userid ?>&t=1','举报投诉')"  style="color:red;font-weight:bold;">举报投诉</a>
        </p>
        <p>本平台仅提供自动发卡服务，并非销售商，不负责商品相关售后问题。</p>
        <p>如产生交易纠纷请与商家自行协商处理，与<span style="font-size: 12px"><?php echo $config_sitename ?></span>平台无关！</p>
        <p>如果您在支付过程中遇到虚假商品或取卡问题,请联系平台客服。 </p>
        <p><a href="/index.htm" target="_blank">@2018 WeiQi-微奇发卡 版权所有</a></p>
    </div>
</div>

<script src="/atest/assets/js/gsap/main-gsap.js"></script>
<script src="/atest/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="/atest/assets/js/bootstrap.js"></script>
<script src="/atest/assets/js/joinable.js"></script>
<script src="/atest/assets/js/resizeable.js"></script>
<script src="/atest/assets/js/neon-api.js"></script>
<script src="/atest/assets/js/neon-chat.js"></script>
<script src="/atest/assets/js/neon-custom.js"></script>
<script src="/atest/assets/js/neon-demo.js"></script>

<script src="/atest/assets/js/selectboxit/jquery.selectBoxIt.min.js"></script>

<div class="modal fade" id="modal-1" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>

            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="javascript:location.reload();" data-dismiss="modal">取消验证</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-7" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    Content is loading...
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showAjaxModal(url, title) {
        jQuery('#modal-7').modal('show', { backdrop: 'static' });
        $.ajax({
            url: url,
            success: function (response) {
                var itop = $(document).scrollTop();
                //if (ismobile() == "ios") {
                //    jQuery('#modal-7 .modal-dialog').css("top", 0);
                //} else {
                //    jQuery('#modal-7 .modal-dialog').css("top", itop);
                //}
                $("html,body").animate({ scrollTop: 0 }, 300);
                jQuery('#modal-7 .modal-title').html(title);
                jQuery('#modal-7 .modal-body').html(response);
            }
        });
    }
    function ismobile() {
        var u = navigator.userAgent; var ua = navigator.userAgent.toLowerCase(); var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Adr') > -1; //android终端 
        var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端 
        if (isiOS) return "ios";
        else if (isAndroid) return "android";
        else return "no";
    }

    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?1dc0c0a43c7d255801229e221bfb0cdd";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
