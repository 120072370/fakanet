<?php if(!defined('WY_ROOT')) exit; ?>


<!--<link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/js/jvectormap/jquery-jvectormap-1.2.2.css">
<link rel="stylesheet" href="<?php echo USER_THEME ?>/assets/js/rickshaw/rickshaw.min.css">
-->



<footer class="main">
    <span></span>
    <a href="../statement.htm" target="_blank">免费声明</a><span>|</span>
    <a href="../about.htm" target="_blank">关于我们</a><span>|</span>
    <a href="../settlement.htm" target="_blank">结算模式</a><span>|</span>
    <a href="../faq.htm" target="_blank">常见问题</a><span>|</span>
    <a href="../contact.htm" target="_blank">联系我们</a><span></span>|
     <a href="javascript:void(0)" onclick='showview("report.php?action=search1","投诉查询");'>投诉查询
     </a>
</footer>
</div>
</div>

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
    toastr.info('您有<?php echo $message ?>条站内信，请及时查收！');
    <?php endif; ?>

   
</script>

<script>
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
                var itop = 0;
                if ($(document).scrollTop() > $(window).height()) {
                    itop = $(document).scrollTop() - $(window).height();
                } else {
                    itop = $(document).scrollTop();
                }
                jQuery('#modal-7 .modal-dialog').css("top", itop);
                jQuery('#modal-7 .modal-title').text(title);
                jQuery('#modal-7 .modal-body').html(response);
            }
        });
    }
</script>

<div style="display: none"><?php echo $Config['tongji'] ?></div>
</body>
</html>