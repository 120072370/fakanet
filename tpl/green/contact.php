<?php if(!defined('WY_ROOT')) exit; ?>


<div id="dowebok">
    <div class="section section6">
        <div class="title"><img src="/new2/title4.png" alt="联系我们" width="523" height="70"></div>
        <div class="lx_box" data-wow-duration="1.6s" data-wow-delay="0.2s">
            <img src="/new2/ewm.png" alt="二维码" width="250" height="250" style="float:left; margin-right:40px;">
            <p><i class="fa fa-qq"></i><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->config['qq'] ?>&site=qq&menu=yes" style="display: inline"><b style="font-size:30px; font-weight:bold; color:#0acffe"><?php echo $this->config['qq'] ?></b></a></p>
            <p><i class="fa fa-phone"></i> <b style="font-size:20px;"><?php echo $this->config['tel'] ?></b></p>
            <p><i class="fa fa-mail-reply"></i> <?php echo $this->config['servicemail'] ?></p>
        </div>
</div>

    
    
   <!--<br>公司名称：邯郸市复兴区纹纳网络科技有限公司-->


<script src="/new2/main.js"></script>
<script>
    $(function(){
        $('#dowebok').fullpage({
            scrollingSpeed:300,
            loopBottom:true,
            anchors: ['page1', 'page2', 'page3', 'page4','page5','page6'],
            menu: '#menu',
            resize:false,
            scrollBar: true,
            afterRender:function(){
                wow = new WOW({
                    animateClass: 'animated',
                });
                wow.init();
            }
        });
    });
</script>





