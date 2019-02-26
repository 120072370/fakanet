<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .disc {
        border: 1px solid #999;
        width: 50px;
    }



    .table_style_2 td {
        color: #000;
    }

    td.right {
        text-align: right;
        color: #000;
    }

    td span {
        color: #666;
    }

    td select {
        color: #000;
    }


    .red {
        color: red;
    }

    .right {
        vertical-align: middle;
    }
</style>
<div class="row">

    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">修改商品信息</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if($data): ?>
                    <form name="add" method="post" class="form-horizontal" action="?action=editsave&id=<?php echo $id ?>">
                        <table class="table table-bordered table-responsive table_style_2">
                            <tr>
                                <td class="right col-md-2">商品分类:</td>
                                <td>
                                    <div class="col-md-4">
                                        <select name="cateid" class="form-control ">
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
                                    <span class="red">*</span>
                                </td>
                            </tr>

                            <tr class="hiderow">
                                <td class="right">页面风格:</td>
                                <td>
                                    <div class="col-md-4">
                                        <select name="theme" class="form-control ">
                                            <option value="" <?php echo $data['theme']=='' || $data['theme']=='default' ? 'selected' : '' ?>>系统默认</option>
                                            <?php foreach($tplList as $key=>$val): ?>
                                            <option value="<?php echo $key ?>" <?php echo $data['theme']==$key ? 'selected' : '' ?>><?php echo $val ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="label label-info">设置购买页面风格样式，在商品独立链接中有效！</div>

                                </td>
                            </tr>

                            <tr>
                                <td class="right  control-label">商品排序:</td>
                                <td>
                                    <div class="col-md-2">
                                        <input type="text" name="sortid" class="form-control" value="<?php echo $data['sortid'] ?>" maxlength="5">
                                    </div>
                                    <span class="label label-info control-label">数字越小越靠前</span></td>
                            </tr>

                            <tr>
                                <td class="right">商品名称:</td>
                                <td>
                                    <div class="col-md-4">
                                        <input type="text" name="goodname" class="form-control" value="<?php echo $data['goodname'] ?>" maxlength="50">
                                    </div>
                                    <span>最多25个汉字(50个字符)</span></td>
                            </tr>

                            <tr>
                                <td class="right">销售价格:</td>
                                <td>
                                    <div class="col-md-2">
                                        <input type="text" name="price" class="form-control"  value="<?php echo $data['price'] ?>" maxlength="5">
                                    </div>
                                    <span class="red">元 *</span> <span>(商品对外出售的价格即零售价格)</span>

                                </td>
                            </tr>

                            <tr>
                                <td class="right">批发优惠:</td>
                                <td>
                                    <div class="col-md-2">
                                        <input type="radio" name="is_discount" onclick="$('tr#is_discount_desc').show();" value="1" <?php echo $data['is_discount']==1 ? 'checked' : '' ?> id="is_discount_1"><label for="is_discount_1">使用</label>&nbsp;
							<input type="radio" name="is_discount" onclick="$('tr#is_discount_desc').hide();" value="0" <?php echo $data['is_discount']==0 ? 'checked' : '' ?> id="is_discount_2"><label for="is_discount_2">不使用</label>
                                    </div>
                                    <span>(是否设置批发购买时使用优惠价格)</span>
                                </td>
                            </tr>

                            <tr id="is_discount_desc" style="display:<?php echo $data['is_discount']==1 ? '' : 'none' ?>">
                                <td class="right">优惠信息：
                                </td>
                                <td>
                                    <div class="col-md-5">
                                        <table class="table table-bordered ">
                                            <tr>
                                                <td></td>
                                                <td>购买数量</td>
                                                <td>优惠价格</td>
                                            </tr>
                                            <?php
                              if($goodDiscount):
                                  foreach($goodDiscount as $key=>$val):
                                      if($val['goodid']==$id):
                                            ?>
                                            <tr>
                                                <td>
                                                    <button type="button" class="btn btn-red btn-icon icon-left btn-xs" onclick="del_discount(this)">
                                                        移除
						<i class="entypo-cancel"></i>
                                                    </button>
                                                </td>
                                                <td>大于
                                                <input type="text" name="dis_quantity[]" class="disc" value="<?php echo $val['dis_quantity'] ?>" />
                                                    张</td>
                                                <td>
                                                    <input type="text" class="disc" name="dis_price[]" value="<?php echo $val['dis_price'] ?>" />
                                                    元</td>
                                            </tr>
                                            <?php
                                      endif;
                                  endforeach;
                              endif;
                                            ?>
                                            <tr id="add_button">
                                                <td colspan="3" style="text-align: center">
                                                    <input type="button" class="btn btn-success" onclick="add_discount()" value="添加优惠" /></td>
                                            </tr>
                                        </table>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">成本价格:</td>
                                <td>
                                    <div class="col-md-2">
                                        <input type="text" name="cbprice" class="form-control"  value="<?php echo $data['cbprice'] ?>" maxlength="5">
                                    </div>
                                    <span class="red">元</span> <span>(商品进货价,可以不填,填写有利于商户系统的利润统计分析)</span></td>
                            </tr>

                            <tr>
                                <td class="right">库存预警:</td>
                                <td>
                                    <div class="col-md-2">
                                        <input type="number" name="invent_report" class="form-control"  value="<?php echo $data['invent_report'] ?>" maxlength="5">
                                    </div>
                                    张 
						<input type="checkbox" name="is_message" value="1" id="is_message" <?php echo $data['is_message'] ? 'checked' : '' ?>><label for="is_message" class="red">站内短信</label>
                                    <input type="checkbox" name="is_email" value="1" id="is_email" <?php echo $data['is_email'] ? 'checked' : '' ?>><label for="is_email" class="red">发件邮件</label>
                                    <span>(为0表示不做报警,设置后<span style="color: #000">请确保邮箱正确</span>，否则无法接收邮件。)</span></td>
                            </tr>

                            <tr class="hiderow">
                                <td class="right">限购数量:</td>
                                <td>
                                    <div class="col-md-2">
                                        <input type="number" name="limit_quantity" class="form-control"  value="<?php echo $data['limit_quantity'] ?>" maxlength="5">
                                    </div>
                                    张 			
						<span>(为0表示购买数量可填写,大于0表示购买数量限制为设置的数值)</span></td>
                            </tr>

                            <tr class="hiderow">
                                <td class="right">最少购买数量:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="number" name="min_quantity" class="form-control" min="1" value="<?php echo $data['min_quantity'] ?>" maxlength="5">
                                    </div>
                                    张 			
                                <span>(为1表示购买数量可填写,大于1表示限定最少的购买数量)</span></td>
                            </tr>

                            <tr>
                                <td class="right">优 惠 券:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_coupon" value="1" <?php echo $data['is_coupon']==1 ? 'checked' : '' ?> id="is_coupon_1"><label for="is_coupon_1">支持</label>&nbsp;
							<input type="radio" name="is_coupon" value="0" <?php echo $data['is_coupon']==0 ? 'checked' : '' ?> id="is_coupon_2"><label for="is_coupon_2">不支持</label>
                                    </div>
                                    <span>(是否支持优惠券)</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">访问密码:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_mima" value="0" id="is_mima_1" <?php echo $data['mima']=='' ? 'checked' : '' ?>><label for="is_mima_1">关闭</label>&nbsp;
							<input type="radio" name="is_mima" value="1" id="is_mima_2" <?php echo $data['mima']!='' ? 'checked' : '' ?> ><label for="is_mima_2">开启</label>
                                    </div>
                                    <span>(开启后，商品购买页面将提示输入设置的密码才能继续访问)</span>
                                </td>
                            </tr>

                            <tr style="<?php if($data['mima']==""){?>display: none;<?php }?>" id="tr_mima">
                                <td class="right">设置密码:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="password" name="mima" class="form-control">
                                    </div>
                                    <span>(留空则不修改)</span></td>
                            </tr>

                            <tr>
                                <td class="right">支付方式:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_display" value="0" id="is_display_1" <?php echo $data['is_display']==3 ? 'checked' : '' ?>><label for="is_display_1">默认</label>&nbsp;
							<!--<input type="radio" name="is_display" value="1" id="is_display_2" <?php echo $data['is_display']==3 ? 'checked' : '' ?>><label for="is_display_2">支付宝</label>&nbsp;
							<input type="radio" name="is_display" value="2" id="is_display_3" <?php echo $data['is_display']==5 ? 'checked' : '' ?>><label for="is_display_3">微信</label>
							<span>(默认是指根据您开启的支付方式来决定，此项设置仅在商品独立链接中有效！)</span>-->
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">首显付款:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_paytype" value="0" id="is_paytype_1" <?php echo $data['is_paytype']==3 ? 'checked' : '' ?>><label for="is_paytype_1">默认</label>&nbsp;
							<!--<input type="radio" name="is_paytype" value="1" id="is_paytype_2" <?php echo $data['is_paytype']==3 ? 'checked' : '' ?>><label for="is_paytype_2">支付宝</label>&nbsp;
							<input type="radio" name="is_paytype" value="2" id="is_paytype_3" <?php echo $data['is_paytype']==5 ? 'checked' : '' ?>><label for="is_paytype_3">微信</label>
							<span>(设置购买页面首先显示的支付方式)</span>-->
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">库存显示:</td>
                                <td>
                                    <div class="col-md-4">
                                        <input type="radio" name="is_invent" value="0" id="is_invent_0" <?php echo $data['is_invent']==0 ? 'checked' : '' ?>><label for="is_invent_0">默认</label>&nbsp;
						    <input type="radio" name="is_invent" value="1" id="is_invent_1" <?php echo $data['is_invent']==1 ? 'checked' : '' ?>><label for="is_invent_1">显示库存数量</label>&nbsp;
							<input type="radio" name="is_invent" value="2" id="is_invent_2" <?php echo $data['is_invent']==2 ? 'checked' : '' ?>><label for="is_invent_2">显示库存范围</label>
                                    </div>
                                    <span>(设置会在商品独立链接中有效，默认将使用商户信息中的设置)</span>
                                </td>
                            </tr>

                            <tr class="hiderow">
                                <td class="right">邮件通知:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_send_mail" value="0" id="is_send_mail_0" <?php echo $data['is_send_mail']==0 ? 'checked' : '' ?>  ><label for="is_send_mail_0">关闭</label>&nbsp;
						    <input type="radio" name="is_send_mail" value="1" id="is_send_mail_1" <?php echo $data['is_send_mail']==1 ? 'checked' : '' ?>   disabled><label for="is_send_mail_1">开启</label>
                                    </div>
                                    <span>(本站已关闭邮件通知，建议到信息修改中开启微信通知)</span>
                                </td>
                            </tr>

                            <tr class="hiderow" style="display: none">
                                <td class="right">短信通知:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_send_sms" value="0" id="is_send_sms_0" <?php echo $data['is_send_sms']==0 ? 'checked' : '' ?>><label for="is_send_sms_0">关闭</label>&nbsp;
						    <input type="radio" name="is_send_sms" value="1" id="is_send_sms_1" <?php echo $data['is_send_sms']==1 ? 'checked' : '' ?>><label for="is_send_sms_1">开启</label>
                                    </div>
                                    <span>(开启后，成功售卡将会发送短信通知)</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">商品链接:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_join_main_link" value="0" id="is_join_main_link_0" <?php echo $data['is_join_main_link']==0 ? 'checked' : '' ?>><label for="is_join_main_link_0">关闭</label>&nbsp;
						    <input type="radio" name="is_join_main_link" value="1" id="is_join_main_link_1" <?php echo $data['is_join_main_link']==1 ? 'checked' : '' ?>><label for="is_join_main_link_1">开启</label>
                                    </div>
                                    <span class="red">(开启后，该商品链接不显示在总链接中)</span>
                                </td>
                            </tr>

                            <tr class="hiderow">
                                <td class="right">取卡密码:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_pwdforsearch" value="0" id="is_pwdforsearch_0" <?php echo $data['is_pwdforsearch']==0 ? 'checked' : '' ?>><label for="is_pwdforsearch_0">关闭</label>&nbsp;
						    <input type="radio" name="is_pwdforsearch" value="1" id="is_pwdforsearch_1" <?php echo $data['is_pwdforsearch']==1 ? 'checked' : '' ?>><label for="is_pwdforsearch_1">必填</label>&nbsp;
						    <input type="radio" name="is_pwdforsearch" value="2" id="is_pwdforsearch_2" <?php echo $data['is_pwdforsearch']==2 ? 'checked' : '' ?>><label for="is_pwdforsearch_2">选填</label>
                                    </div>
                                    <span>(开启后，购买页面会提示买家填写取卡密码)</span>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">商品类型:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="radio" name="is_api" value="0" id="is_api_1" readonly="readonly" disabled <?php echo $data['is_api']==0 ? 'checked' : '' ?> onclick="javascript:$('#api_return_url').hide()"><label for="is_api_1">在线售卡</label>
                                        &nbsp;
							<input type="radio" name="is_api" value="1" id="is_api_2" readonly="readonly" disabled <?php echo $data['is_api']==1 ? 'checked' : '' ?> onclick="javascript:$('#api_return_url').show()"><label for="is_api_2">在线充值</label>
                                    </div>
                                    <span>(<span class="red">设置后不能修改！</span>在线充值需要API接口)</span>
                                </td>
                            </tr>

                            <!--<tr id="api_return_url" style="<?php echo $data['is_api']==1 ? '' : 'display:none' ?>">
						    <td class="right">通知地址:</td>
							<td><input type="form-control" class="form-control" name="api_return_url" value="<?php echo $data['api_return_url'] ?>"> <span><span class="red">以'http://'开头</span>(api通知地址，不可带任何参数)</span></td>
						</tr>-->

                            <tr class="hiderow">
                                <td class="right">客户信息:</td>
                                <td>
                                    <div class="col-md-3">
                                        <select name="is_contact_limit" class="form-control">
                                            <option value="99"<?php echo $data['is_contact_limit']==99 ? ' selected' : '' ?>>默认</option>
                                            <option value="0"<?php echo $data['is_contact_limit']==0 ? ' selected' : '' ?>>任意字符</option>
                                            <option value="1"<?php echo $data['is_contact_limit']==1 ? ' selected' : '' ?>>必须为数字</option>
                                            <option value="2"<?php echo $data['is_contact_limit']==2 ? ' selected' : '' ?>>必须为字母</option>
                                            <option value="3"<?php echo $data['is_contact_limit']==3 ? ' selected' : '' ?>>必须为字母和数字</option>
                                            <option value="4"<?php echo $data['is_contact_limit']==4 ? ' selected' : '' ?>>字母或数字、下划线</option>
                                            <option value="5"<?php echo $data['is_contact_limit']==5 ? ' selected' : '' ?>>必须为中文</option>
                                            <option value="6"<?php echo $data['is_contact_limit']==6 ? ' selected' : '' ?>>邮箱账号</option>
                                            <option value="7"<?php echo $data['is_contact_limit']==7 ? ' selected' : '' ?>>手机号码</option>
                                        </select>
                                    </div>
                                    <span style="color: red">客户下单时输入的联系方式或充值账号格式限制！</span>
                                </td>
                            </tr>

                            <!--<tr><td colspan="2" style="height:12px;text-align:left;background-color:#ffffff;border:0px solid #66cccc;border-radius:3px">&nbsp;<a href="javascript:void(0)" class="green bold" id="dhrow">显示隐藏功能</a></td></tr>
						-->

                            <tr>
                                <td colspan="2" height="30">&nbsp;<strong>商品额外信息</strong></td>
                            </tr>


                            <tr>
                                <td class="right">商户名称:</td>
                                <td>
                                    <div class="col-md-4">
                                        <input type="text" name="sitename" class="form-control" maxlength="50" value="<?php echo $data['sitename'] ?>">
                                    </div>
                                    <span>(若为空，商品出售页面则显示商户信息中的站点名称)</span></td>
                            </tr>

                            <tr>
                                <td class="right">商户描述:</td>
                                <td>
                                    <link rel="stylesheet" type="text/css" href="/static/css/default.css" />
                                    <script src="/static/js/kindeditor-min.js" type="text/javascript" charset="utf-8"></script>
                                    <script src="/static/js/zh-CN.js" type="text/javascript" charset="utf-8"></script>
                                    <input type="hidden" name="is_display_remark" value="1" id="is_display_remark_1">
                                    <script type="text/javascript">
                                        var editor;
                                        KindEditor.ready(function(K) {
                                            editor = K.create('textarea[name="remark"]', {
                                                resizeType : 1,
                                                allowPreviewEmoticons : false,
                                                allowImageUpload : false,
                                                items : [
                                                    'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                                                    'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                                                    'insertunorderedlist']
                                            });
                                        });
                                    </script>
                                    <div class="col-md-8">
                                        <textarea name="remark" style="width: 700px; height: 200px; visibility: hidden;"><?php echo $data['remark'] ?></textarea>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="right">商户网址:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="text" name="siteurl" class="form-control" maxlength="50" value="<?php echo $data['siteurl'] ?>">
                                    </div>
                                    <span>(若为空，商品出售页面则显示商户信息中的站点网址)</span></td>
                            </tr>

                            <tr>
                                <td class="right">商户 Q Q:</td>
                                <td>
                                    <div class="col-md-3">
                                        <input type="text" name="qq" class="form-control" maxlength="12" value="<?php echo $data['qq'] ?>">
                                    </div>
                                    <span>(若为空，商品出售页面则显示商户信息中的联系QQ)</span></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" />
                                    <input type="hidden" name="fromurl" value="<?php echo $fromurl ?>">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        //短信通知
					<?php
                              $smsprice=$wddb->getOne('select smsprice from '.DB_PREFIX.'config');	
                    ?>
        var smsprice=<?php echo $smsprice;?>;
        jQuery("#is_send_sms_1").on('click',function () {
            var the=jQuery(this);
            if (the.prop('checked') && jQuery("[name='price']").val()<smsprice) {
                alert('商品售价低于短信通知费用，不能开启');
                jQuery("#is_send_sms_0").prop("checked",true);
            }
        });
        jQuery("[name='is_mima']").on('click',function () {
            var the=jQuery(this);
            if(jQuery("[name='is_mima']:checked").val()==1){
                jQuery("#tr_mima").show();
            }else{
                jQuery("#tr_mima").hide();
            }
        });
        $(function(){
            $('a#dhrow').click(function(){
                if($('.hiderow').is(':visible')){
                    $('.hiderow').fadeOut();
                } else {
                    $('.hiderow').fadeIn();
                    //$('.hiderow').css({'background-color':'#ffffb0'});
                }
            })
        })

        $('[type=submit]').click(function(){
            var goodname=$.trim($('[name=goodname]').val());
            if(goodname==''){
                alert('商品名称不能为空！');
                $('[name=goodname]').focus();
                return false;
            }

            if($('#is_discount_desc table tr').length >2){
                var isbo = true;
                $('[name^=dis_quantity]').each(function(){
                    var num = $(this).val();
                    var price = $(this).parent().parent().children().eq(2).find("[name^=dis_price]").val();
                    if(num<=1 &&  price<0.1){
                        isbo = false;
                    }
                })
                if(!isbo){
                    alert("批发数量小于1时候，不允许销售小于0.1元的商品！")
                    return false;
                }
            }

            //var price=$.trim($('[name=price]').val());
            //if(price<0.1){
            //    alert('不允许销售小于0.1元的商品！');
            //    $('[name=price]').focus();
            //    return false;
            //}
           

            var sortid=$.trim($('[name=sortid]').val());
            if(sortid=='' || isNaN(sortid)){
                alert('分类排序不能为空，格式为整数值！');
                $('[name=sortid]').focus();
                return false;
            }

            var is_api=0;
            $('[name=is_api]').each(function(){
                if($(this).is(':checked')){
                    is_api=$(this).val();
                }
            })
						
            if(is_api==1){
                var api_return_url=$.trim($('[name=api_return_url]').val());
                if(api_return_url==''){
                    alert('API通知地址不能为空！');
                    $('[name=api_return_url]').focus();
                    return false;
                }
                var reg=/^http:\/\/([0-9a-z.:]+)([\/]+)(.*)$/;
                if(!reg.test(api_return_url)){
                    alert('URL格式不正确，API通知地址必须以 http:// 开头！');
                    $('[name=api_return_url]').focus();
                    return false;
                }
            }
        })

        var add_discount=function(){
            if($('tr#is_discount_desc table tr').length>=12){
                alert('最多添加10个优惠区间');
                return false;
            }
            $('tr#add_button').before('<tr><td> <button type="button" class="btn btn-red btn-icon icon-left btn-xs" onclick="del_discount(this)">移除<i class="entypo-cancel"></i> </button></td><td>大于 <input type="text" name="dis_quantity[]" class="disc" value="" /> 张</td><td><input type="text" class="disc" name="dis_price[]" value="" /> 元</td></tr>');
        }

        var del_discount=function(id){
            $(id).parent().parent().remove();
        }
    </script>
    <?php endif; ?>
</div>
