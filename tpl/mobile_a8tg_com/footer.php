<!--底部的开始-->

</div>
 <footer class="ft-bar-v2 mt20">
     <div class="ft-user">
         <span class="ft-login fl">
              <a href="index.htm">返回首页</a>
             <a href="login.htm">登录</a><a href="register.htm">注册</a></span>
         <!-- <span class="ft-top fr"><i class="icon-hualv icon-top121121"></i></span>-->

     </div>
     <div class="ft-logo">
         <p>
             <img src="/images/logo.png" style="width: 50%; margin: 3px auto;" /></p>
     

     </div>
     <div class="ft-copyright">
         <nav class="ft-nav clearfix">
             <a href="index.htm">首页</a>
             <a href="statement.htm">免责申明</a>
             <a href="about.htm">关于我们</a>
             <a href="orderquery.htm">订单查询</a>
         </nav>
         <p class="copyright">
             &copy;版权所有 &copy <?php echo date('Y') ?> <?php echo $this->config['copyright'] ?><br>
             <a href="#">投诉邮箱：<?php echo $this->config['servicemail'] ?></a> <a href="#">联系方式：<?php echo $this->config['address'] ?></a>
         </p>
     </div>
 </footer>
 <script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script>
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?1dc0c0a43c7d255801229e221bfb0cdd";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</body>
</html>