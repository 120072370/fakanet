<?php 
ini_set('date.timezone','Asia/Shanghai');

$orderid = $_REQUEST['res_orderid'];
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>订单查询</title>

    <link rel="stylesheet" href="/css/centermenu/centermenu.css">
    <script src="/css/jquery.js"></script>
    <script src="/css/centermenu/toast.js"></script>
    <script src="/css/centermenu/centermenu.js"></script>
    <style>
        .animated li:first-child {
            color:red;
        }
    </style>
</head>
<body>
    <br />
    <div align="center">
        <a style="padding:10px 30px; border-radius: 15px;background-color:#FE6714; color:white;  font-size:16px;" href="/orderquery.htm?orderid=<?php echo $orderid;?>" >查看订单</a>
    </div>
    <script>
        window.onload = function () {
            centermenu7();
        }
        function centermenu7() {
            $('body').centermenu({
                animateIn: 'fadeInDownBig-hastrans',
                animateOut: 'fadeOutDownBig-hastrans',
                hasLineBorder: true,
                duration: 600,
                source: ['已支付完成', '支付未完成'],
                liWidth: 280,
                liHeight: 60,
                click: function (ret) {
                    if (ret.text == "已支付完成")
                        location.href = "/orderquery.htm?orderid=<?php echo $orderid ?>";
                    else {
                        location.href = "/orderquery.htm?orderid=<?php echo $orderid ?>";
                    }
                }
            });
        }
    </script>
</body>
</html>
