<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .input {
        /*width: 60px;*/
    }

    table.table_style_2 {
        border: 1px solid #eee;
    }

        table.table_style_2 td {
            padding: 0;
            height: 40px;
            padding: 8px 15px;
        }

            table.table_style_2 td:nth-child(1) {
                width: 10%;
                background: #f5f4ff;
                font-weight: bold;
                border-right: 1px solid #eee;
            }

            table.table_style_2 td:nth-child(2) {
                text-align: left;
            }

            table.table_style_2 td:nth-child(3) {
                width: 40%;
                background: #fdfdfd;
                text-align: left;
                color: #999;
            }

    .table_style_2 td {
        padding: 3px;
    }
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
    <div class="col-md-8">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">生成优惠券</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <form name="add" id="add" method="post" action="?action=addsave">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td class="right">折扣面额:</td>
                                <td>
                                    <input type="text" name="coupon" class="input" value="1" maxlength="50" style="width: 10%;">
                                    <select name="ctype" style="width: 100px;">
                                        <option value="1">元</option>
                                        <option value="100">%</option>
                                    </select>
                                </td>
                                <td><span>(批发的商户请选择“百分比”的折扣面额，单商品的建议选择“元”的面额)</span></td>
                            </tr>

                            <tr>
                                <td class="right">生成数量:</td>
                                <td>
                                    <input type="text" name="quantity" class="input" value="1" maxlength="5" >
                                    <span style="color: green">张</span> </td>
                                <td><span style="color: #ff00f7">(最多一次生成200张)</span></td>
                            </tr>

                            <tr>
                                <td class="right">有效期:</td>
                                <td>
                                    <select name="valid">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="60">60</option>
                                        <option value="100">100</option>
                                    </select>
                                    <span style="color: red">天</span>
                                </td>
                                <td><span>（过期优惠券系统将自动清理)</span></td>
                            </tr>

                            <tr>
                                <td  class="right">商品分类:</td>
                                <td>
                                    <select name="cateid">
                                        <option value="0">全部</option>
                                        <?php 
                                        if($goodCate): 
                                            foreach($goodCate as $key=>$val):
                                                if($val['userid']==$_SESSION['login_userid']):
                                        ?>
                                        <option value="<?php echo $val['id'] ?>"><?php echo $val['catename'] ?></option>
                                        <?php
                                                endif;
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </td>
                                <td><span>(选择对应的商品分类进行优惠券的绑定)</span></td>
                            </tr>

                            <tr>
                                <td class="right">备注信息:</td>
                                <td colspan="2">
                                    <textarea name="remark" cols="50" rows="5" style="width: 90%;"></textarea></td>
                            </tr>

                            <tr>
                                <td class="right"></td>
                                <td>
                                    <input type="checkbox" name="is_export" value="1" id="is_export">
                                    <label for="is_export">添加完成后导出优惠券到文本TXT</label>
                                </td>
                                <td></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="立即生成" /></td>
                                <td></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('[type=submit]').click(function () {
            var coupon = $.trim($('[name=coupon]').val());
            if (coupon == '') {
                alert('折扣面额不能为空！');
                $('[name=coupon]').focus();
                return false;
            }

            var quantity = $.trim($('[name=quantity]').val());
            if (quantity == '' || quantity <= 0 || isNaN(quantity) || quantity > 200) {
                alert('生成数量一次最多200张！');
                $('[name=quantity]').focus();
                return false;
            }

            $('[type=submit]').val('正在生成...');
            $('[type=submit]').attr({ 'disabled': true });
            if ($('#is_export').attr('checked')) {
                $('[type=submit]').val('已生成');
            }
            $('#add').submit();
        })
    </script>
</div>
