<?php if(!defined('WY_ROOT')) exit;?>
<div class="row">
    <div class="col-md-12">
        <form name='report' action='http://<?php echo _S('HTTP_HOST') ?>/lin/report.php?action=postadd&t=<?php echo $t ?>' method='post' 
            class="form-horizontal form-groups-bordered">
            <input type="hidden" name="userid" value="<?php echo $userid ?>" />
            <?php if($t): ?>
            <div class="sb">
                <input type="hidden" name="report_url" value="<?php echo _S('HTTP_REFERER') ?>" />

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">订单号</label>
                    <div class="col-sm-5">
                        <input type="text" name="report_orderid" class="form-control" />
                        <p><span style="color:red">请填写购买商品的订单号,否则无法为您处理投诉（仅限7天内的订单）</span></p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">举报原因</label>
                    <div class="col-sm-5">
                        <select name="report_type" class="form-control">
                            <option value="">--请选择--</option>
                            <option value="无效卡密">无效卡密</option>
                            <option value="虚假商品">虚假商品</option>
                            <option value="非法商品">非法商品</option>
                            <option value="侵权商品">侵权商品</option>
                            <option value="不能购买">不能购买</option>
                            <option value="恐怖色情">恐怖色情</option>
                            <option value="其他投诉">其他投诉</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">联系方式</label>
                    <div class="col-sm-5">
                        <input type="text" name="report_contact" class="form-control" />
                        <p>（QQ，Email）<span style="color:red">建议填写QQ,否则无法为您处理投诉</span></p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">补充说明</label>
                    <div class="col-sm-5">
                        <textarea name="remark" id="Textarea1" class="form-control" rows="3"></textarea>
                    </div>
                </div>


                <div class="form-group">
                    <div class="alert alert-info">如果你看到含有色情，暴力，反动或任何不健康的内容，请直接举报！</div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="submit" name="submit" class="btn btn-success" value="提 交" />
                    </div>
                    <!--  <td><a class="nyroModal stjbtn" href="http://<?php echo $config['siteurl'] ?>/lin/report.php?action=search" target="_blank">举报结果查询</a></td>-->

                </div>
                <p class="alert alert-success" id="result2" style="display:none;"><?php echo $result ?></p>
            </div>
            <?php else: ?>
            <div id="main1">
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">举报原因</label>
                    <div class="col-sm-5">
                        <select name="report_type" class="form-control">
                            <option value="">--请选择--</option>
                            <option value="无效卡密">无效卡密</option>
                            <option value="虚假商品">虚假商品</option>
                            <option value="非法商品">非法商品</option>
                            <option value="侵权商品">侵权商品</option>
                            <option value="不能购买">不能购买</option>
                            <option value="恐怖色情">恐怖色情</option>
                            <option value="其他投诉">其他投诉</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">举报网址</label>
                    <div class="col-sm-5">
                        <?php echo _S('HTTP_REFERER') ?><input type="hidden" name="report_url" value="<?php echo _S('HTTP_REFERER') ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">联系方式</label>
                    <div class="col-sm-5">
                        <input type="text" name="report_contact" class="form-control" />
                        <em>(QQ，Email，手机)</em>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">补充说明</label>
                    <div class="col-sm-5">
                        <textarea name="remark" id="Textarea2" class="form-control" rows="2"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="alert alert-info">如果你看到含有色情，暴力，反动或任何不健康的内容，请直接举报！</div>
                </div>
                <div class="form-group">
                    <div class="col-sm-5">
                        <input type="submit" name="submit" class="btn btn-success" value="提 交" />
                    </div>
                    <!--  <td><a class="nyroModal stjbtn" href="http://<?php echo $config['siteurl'] ?>/lin/report.php?action=search" target="_blank">举报结果查询</a></td>-->

                    <p class="alert alert-success" id="result2" style="display: none;"><?php echo $result ?></p>
                </div>
            </div>
            <?php endif; ?>
        </form>
    </div>


</div>

<script>
    $(function () {
        $('[name=report]').submit(function (envent) {
            envent.preventDefault();
            $("#result2").hide();
            $("#result2").html("");

            var report_type = $('[name=report_type]').val();
            if (report_type == '') {
                alert('请选择举报原因！');
                $('[name=report_type]').focus();
                return false;
            }
            var report_orderid = $('[name=report_orderid]').val();
            if (report_orderid == '') {
                alert('请填写订单号！');
                $('[name=report_orderid]').focus();
                return false;
            }
            var contact = $('[name=report_contact]').val();
            if (contact == '') {
                alert('请填写联系方式，凭填写的联系方式查询处理结果！');
                $('[name=report_contact]').focus();
                return false;
            }

            var form = $(this);
            $.ajax({
                url: form.attr("action"),
                type: 'post',
                data: form.serialize(),
                //dataType: "text",
                success: function (data) {
                    $("#result2").show();
                    $("#result2").html(data);
                }
            });
            return false;
        })
    })
</script>
