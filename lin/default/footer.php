<div class="page_init" style="float: left; width: 100%">
    <!--{foot-->
    <link href="/css/ad.css" rel="stylesheet" type="text/css">
    <div class="foot">
        
        <div class="web" style="min-height: 480px;">
            <div class="clearfix">
            </div>
            
            <div class="foot-bottom clearfix" style="color: #a2aeb5; font-size: 12px;">
                <p>免责声明（向陌生人付款,请注意交易风险,否则造成的经济损失自负！）</p>
                <p>
                    请认证核对商品信息，如遇商品： 假卡/诈骗/钓鱼等请务必购买当天22点之前投诉，逾期不支持退款。
                         <a href="report.php?uid=<?php echo $userid ?>&t=1" class="nyroModal" id="A1" style="color:red;font-weight:bold;">举报投诉</a>
                </p>
                <p>本平台仅提供自动发卡服务，并非销售商，不负责商品相关售后问题。</p>
                <p>如产生交易纠纷请与商家自行协商处理，与<span style="font-size: 12px"><?php echo $config_sitename ?></span>平台无关！</p>
                <p>如果您在支付过程中遇到虚假商品或取卡问题,请联系平台客服。 </p>
            </div>
        </div>
    </div>
    <!--foot}-->
</div>


<script>
    $('#A1').nyroModal({ autoSizable: false, resizable: false, windowResize: false, width: 520, height: 420 });

    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?1dc0c0a43c7d255801229e221bfb0cdd";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
