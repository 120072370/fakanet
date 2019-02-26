<?php if(!defined('WY_ROOT')) exit; ?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">商家百科</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <table class="table table-bordered table-responsive" cellspacing="1">
                        <thead>
                            <tr>
                                <th class="border_right border_bottom">标题</th>
                                <th class="border_bottom">时间</th>
                            </tr>
                        </thead>
                        <?php
                        if($lists):
                            foreach($lists as $key=>$val): 
                        ?>
                        <tr>
                            <td class="border_right border_bottom" style="text-align: left; padding-left: 10px"><a href="../view.htm?id=<?php echo $val['id'] ?>" target="_blank" style="color:#<?php echo $val['is_color'] ?><?php echo $val['is_bold']!='' ? ';font-weight:bold' : '' ?>" title="<?php echo $val['title'] ?>"><?php echo $val['title'] ?></a></td>
                            <td class="border_bottom" style="color: #666"><?php echo $val['addtime'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="bg" colspan="2" height="20" style="padding-left: 10px"><?php echo $pagelist ?></td>
                        </tr>
                        <?php endif; ?>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
    var notice = new Array(<?php echo $is_popup ?>);
    var user_set_popup = $.cookie('user_set_popup_<?php echo $_SESSION['login_userid'] ?>');
    if (notice.length > 0 && user_set_popup != '1') {
        Boxy.load('?action=view&t=1&id=' + notice[0], { title: '商家百科' });
    }

    var cnt = 0;
    function nt(t) {
        if (t == 'next') {
            if (cnt == notice.length - 1) {
                alert('已经是最后一条了');
            } else {
                cnt += 1;
                getNotice(notice[cnt]);
            }
        } else {
            if (cnt == 0) {
                alert('没有上一条了');
            } else {
                cnt -= 1;
                getNotice(notice[cnt]);
            }
        }
    }

    function getNotice(id) {
        var nowtitle = '';
        $.getJSON("index.php", { action: 'view', t: 2, id: id },
            function (data) {
                nowtitle = $("body").find("#newstitle");
                if (data.titlecolor == '') {
                    nowtitle.css("color", "#000");
                } else {
                    nowtitle.css("color", data.titlecolor);
                }
                nowtitle.html(data.title);
                $("body").find("#newscontent").html(data.content);
                $("body").find("#newsdate").html(data.addtime);
            });
    }
    function userSetPopup() {
        $.cookie('user_set_popup_<?php echo $_SESSION['login_userid'] ?>', '1', { expires: 1 });
                        //alert('设置成功！');
                        $('.close').click();
                    }
</script>
