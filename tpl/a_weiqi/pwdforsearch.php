<?php if(!defined('WY_ROOT')) exit; ?>
<link href="tpl/weiqi/content/webcss/query.css" rel="stylesheet" type="text/css" />
<div class="page_init">
<div class="InNews1">
    <div class="web" style="min-height: 550px;">
        <h4><?php echo $msg ?></h4>
        <div class="clearfix"></div>
        <ul>
            <li>
                <form action="<?php echo $url ?>" method="post" name="pw" onsubmit="return checkForm()">
                    <p class="searchp">
                        
                        <input id="queryvalue" name="pwd" type="text" value="" placeholder="请输入查询密码" class="searchinput" maxlength="28">
                        <button class="searchinput_button" onclick="if ($('[name=pw]').find($('[name=pwd]')).val()) {
                                        s.submit();
                                    } else {
                                        $('[name=pw]').find($('[name=pwd]')).focus();
                                        alert('请填写查询密码！');
                                    }">
                            查询</button>
                    </p>
                </form>
            </li>
        </ul>
    </div>
</div>
    </div>

<script>
    function checkForm() {
        var pwd = $.trim($('[name=pwd]').val());
        var reg = /^([0-9a-zA-Z]+){6,20}$/;
        if (pwd == '' || !reg.test(pwd)) {
            $('[name=pwd]').focus();
            alert('请填写查询密码！长度为6-20个数字、字母或组合！');
            return false;
        }
    }
</script>
