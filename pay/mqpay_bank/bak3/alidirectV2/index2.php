<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>正在跳转付款...</title>

</head>
<body>
    <?php
    require'../Config.php';


    $postdata['price'] = $_POST['price'];
    $postdata['orderCode'] = $_POST['orderCode'];
    $postdata['mchNo'] = $MCHNO;
    $postdata['remarks'] = $_POST['remarks'];
    $postdata['type'] = 1;
    $postdata['ts'] = time() . '000';
    $postdata['notifyUrl'] = $NOTIFYURL;

    ksort($postdata);
    $signstr = '';
    foreach ($postdata as $key => $value) {
        $signstr .= $key . '=' . $value . '&';
    }
    $signstr = substr($signstr, 0, -1);
    $postdata['sign'] = md5($signstr . '&token='.$TOKEN);
    $poststr = '';
    foreach ($postdata as $key => $value) {
        $poststr .= $key . '=' . urlencode($value) . '&';
    }
    $poststr = substr($poststr, 0, -1);
    $url = $PAYURL.'/api/getQrcode?' . $poststr;

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    $data = curl_exec($curl);
    curl_close($curl);

    $ret = json_decode($data, true);

    if($ret["code"] == 0){
         $url = $ret["data"]["payUrl"];
         header($url);
    }else{
        echo $data;
    }

    ?>

</body>
</html>
