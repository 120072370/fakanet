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
                    <form name="edit" method="post" action="?action=editsave&id=<?php echo $id ?>"  class="form-horizontal form-groups-bordered">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">折扣面额</label>
                            <div class="col-sm-4">
                                <input type="text" name="coupon" class="input" value="<?php echo $data['coupon'] ?>" maxlength="50">
                                <select name="ctype">
                                    <option value="1" <?php echo $data['ctype']==1 ? 'selected' : '' ?>>元</option>
                                    <option value="100" <?php echo $data['ctype']==100 ? 'selected' : '' ?>>%</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                (批发的商户请选择“百分比”的折扣面额，单商品的建议选择“元”的面额)
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">有效期</label>
                            <div class="col-sm-4">
                                <input type="text" class="input" name="valid" value="<?php echo $data['valid'] ?>" />
                                    <span style="color: red">天</span>
                            </div>
                          <div class="col-sm-4">
                              <span style="color: #ff00f7">（过期优惠券系统将自动清理)</span>
                              </div>
                        </div>

                          <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商品分类</label>
                            <div class="col-sm-4">
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
                            </div>
                          <div class="col-sm-4">
                              <span style="color: #ff00f7">(选择对应的商品分类进行优惠券的绑定)</span>
                              </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">备注信息</label>
                            <div class="col-sm-4">
                                <textarea name="remark" class="form-control" ><?php echo $data['remark'] ?></textarea>
                            </div>
                          <div class="col-sm-4">
                             
                              </div>
                        </div>
                          <div class="form-group">
                            <div class="col-sm-4">
                                 <input type="submit" class="btn btn-success" value="立即保存" />
                            </div>
                          
                        </div>
                       
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
