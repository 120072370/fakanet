<?php if(!defined('WY_ROOT')) exit; ?>



<style>
    .foot_menu {
        display: block;
        width: 100%;
        background: #fff;
        position: -webkit-sticky;
        position: sticky;
        z-index: 1001;
        bottom: 0;
        text-align: right;
    }
</style>



<footer class="main">
    <p>@2018 WeiQi-微奇发卡平台</p>
    <a href="../statement.htm" target="_blank">免费声明</a><span>|</span>
    <a href="../settlement.htm" target="_blank">结算模式</a><span>|</span>
     <a href="javascript:void(0)" onclick='javascript:showview("report.php?action=search1","投诉查询");'>
         投诉查询
     </a>
</footer>


</div>
</div>
<?php if(!$info_user):?>
<div class="foot_menu navbar-header">
    <div class="btn-group left">
        <a href="orders.php?fdate=&tdate=&t=t3&channelid=&is_api=&st=st1&kw=&do=search" class="btn btn-default btn-sm">最近卖出</a>
        <a href="goodlist.php" class="btn btn-red  btn-sm">商品管理</a>
        <a href="message.php" class="btn btn-gold btn-sm">站内信息</a>
        <a href="/usr" class="btn btn-success btn-sm">返回主页</a>
        <a href="#" id="toppage" class="btn btn-blue btn-sm">
            <i class="entypo-up-thin"></i>
        </a>
    </div>
</div>
<?php endif; ?>

<div class="modal fade" id="modal-7" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">公告提示</h4>
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

<!-- Bottom Scripts -->
<script src="<?php echo USER_THEME ?>/assets/js/gsap/main-gsap.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/bootstrap.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/joinable.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/resizeable.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/neon-api.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/rickshaw/vendor/d3.v3.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/rickshaw/rickshaw.min.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/raphael-min.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/morris.min.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/toastr.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/neon-chat.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/neon-custom.js"></script>
<script src="<?php echo USER_THEME ?>/assets/js/neon-demo.js"></script>

<script src="<?php echo USER_THEME ?>/js/common.js"></script>


<script>
                <?php if($message):?>
    toastr.info('您有<strong><?php echo $message ?></strong>条站内信，请及时查收！');
    <?php endif; ?>
</script>

<script>
    $(function () {

        $("#toppage").click(function () {
            $("html,body").animate({ scrollTop: 0 }, 500);
        });
        autoNav();
    });

    //解决底部自动导航的问题  
    function autoNav() {
        //获取内容的高度  
        var bodyHeight = $("body").height();
        //获取底部导航的高度  
        var navHeight = $(".navbar").height();
        //获取显示屏的高度  
        var iHeight = document.documentElement.clientHeight || document.body.clientHeight;
        //如果内容的高度大于（窗口的高度 - 导航的高度）,z则需要添加一个div，设置其高度  
        if (bodyHeight > (iHeight - navHeight)) {
            $("body").append('<div style="height: ' + navHeight + 'px"></div>');
        }
    }
    /*
    $(function(){
        checkInbox();
    })
    
    var checkInbox=function(){
        $.get('index.php',{action:'checkInbox'},function(data){
            if(data==0){
                setTimeout(checkInbox,20000);
            } else {
                $('#message').css({'color':'red','font-weight':'bold'});
                $('#message').text(data);
            }
        })
    }*/

    var userSafeVerify = function (t) {
        showview('userSafe.php?action=verifyCode&wyt=1&t=' + t, '请验证安全码后继续操作');
    }

    function showview(url, title) {
        $('#modal-7').modal('show', { backdrop: 'static' });
        $.ajax({
            url: url,
            success: function (response) {

                var itop = $(document).scrollTop();
                //if ($(document).scrollTop() > $(window).height()) {
                //    itop = $(document).scrollTop() - $(window).height();
                //} else {
                //    itop = $(document).scrollTop();
                //}
                if (ismobile() == "ios") {
                    jQuery('#modal-7 .modal-dialog').css("top", 0);
                } else {
                    jQuery('#modal-7 .modal-dialog').css("top", itop);
                }

                jQuery('#modal-7 .modal-title').text(title);
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
</script>

<div style="display: none"><?php echo $Config['tongji'] ?></div>
</body>
</html>