<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .input {
        height: 32px;
        border: 1px solid #e0e1ff;
        padding: 0 10px;
        letter-spacing: 1px;
        vertical-align: middle;
    }

    select {
         height: 32px;
        border: 1px solid #e0e1ff;
        padding: 0 10px;
        letter-spacing: 1px;
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">编辑优惠券</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if($data): ?>
                    <form name="edit" method="post" action="?action=editsave&id=<?php echo $id ?>">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td class="right">折扣面额:</td>
                                <td>
                                    <input type="text" name="coupon" class="input" value="<?php echo $data['coupon'] ?>" maxlength="50">
                                    <select name="ctype">
                                        <option value="1" <?php echo $data['ctype']==1 ? 'selected' : '' ?>>元</option>
                                        <option value="100" <?php echo $data['ctype']==100 ? 'selected' : '' ?>>%</option>
                                    </select>
                                    <span>(批发的商户请选择“百分比”的折扣面额，单商品的建议选择“元”的面额)</span></td>
                            </tr>

                            <tr>
                                <td class="right">有效期:</td>
                                <td>
                                    <input type="text" class="input" name="valid" value="<?php echo $data['valid'] ?>" />
                                    <span style="color: red">天</span>
                                    <span>（过期优惠券系统将自动清理)</span></td>
                            </tr>

                            <tr>
                                <td width="60" class="right">商品分类:</td>
                                <td>
                                    <select name="cateid">
                                        <option value="0" <?php echo $data['cateid']==0 ? 'selected' : '' ?>>全部</option>
                                        <?php 
                              if($goodCate): 
                                  foreach($goodCate as $key=>$val):
                                      if($val['userid']==$_SESSION['login_userid']):
                                        ?>
                                        <option value="<?php echo $val['id'] ?>" <?php echo $val['id']==$data['cateid'] ? 'selected' : '' ?>><?php echo $val['catename'] ?></option>
                                        <?php
                                      endif;
                                  endforeach;
                              endif;
                                        ?>
                                    </select>
                                    <span>(选择对应的商品分类进行优惠券的绑定)</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">备注信息:</td>
                                <td>
                                    <textarea name="remark" cols="50" rows="5"><?php echo $data['remark'] ?></textarea></td>
                            </tr>


                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="立即保存" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <script>
        $('[type=submit]').click(function () {
            var coupon = $.trim($('[name=coupon]').val());
            if (coupon == '') {
                alert('折扣面额不能为空！');
                $('[name=coupon]').focus();
                return false;
            }

            var valid = $.trim($('[name=valid]').val());
            if (valid == '' || valid <= 0 || isNaN(quantity)) {
                alert('有效期格式错误！');
                $('[name=valid]').focus();
                return false;
            }
        })
    </script>
</div>
