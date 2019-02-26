<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    .disc {
        border: 1px solid #999;
        width: 50px;
    }

    #is_discount_desc table td {
        padding: 0;
    }

  
    .hiderow {
        display: none;
    }

    a:hover {
        color: black;
    }
</style>
<div class="row">

    <div class="col-xs-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">添加新商品</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="with-table">
                    <form name="add" method="post" action="?action=addsave" class="form-horizontal form-groups-bordered">
                        <input type="hidden" name="ptfc" value="0">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商品分类</label>
                            <div class="col-sm-4">
                                <select name="cateid" class="form-control">
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
                            </div>
                            <div class="col-sm-4">
                                如无商品分类请先添加,否则无法添加商品
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">页面风格</label>
                            <div class="col-sm-4">
                                <select name="theme" class="form-control">
                                    <option value="default">系统默认</option>
                                    <?php foreach($tplList as $key=>$val): ?>
                                    <option value="<?php echo $key ?>"><?php echo $val ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="col-sm-4">
                                <span>设置购买页面风格样式，在商品独立链接中有效！</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商品排序</label>
                            <div class="col-sm-4">
                                <input type="text" name="sortid" class="form-control" value="100" maxlength="5">
                            </div>
                            <div class="col-sm-4">
                                <span>数字越小越靠前</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商品名称</label>
                            <div class="col-sm-4">
                                <input type="text" name="goodname" class="form-control" maxlength="50">
                            </div>
                            <div class="col-sm-4">
                                <span>最多25个汉字(50个字符)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">销售价格</label>
                            <div class="col-sm-4">
                                <input type="text" id="price" name="price" class="form-control" value="1.00" maxlength="5">
                            </div>
                            <div class="col-sm-4">
                                <span class="red">元 *</span><span>（商品对外出售的价格即零售价格)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">批发优惠</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_discount" onclick="$('#is_discount_desc').show();" value="1" id="is_discount_1"><label for="is_discount_1">使用</label>&nbsp;&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_discount" onclick="$('#is_discount_desc').hide();" value="0" id="is_discount_2" checked><label for="is_discount_2">不使用</label>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <span>(是否设置批发购买时使用优惠价格)</span>
                            </div>
                        </div>
                        <div class="form-group" id="is_discount_desc" style="display: none">
                            <label for="field-1" class="col-sm-3 control-label">优惠信息</label>
                            <div class="col-sm-4">
                                <table class="table table-bordered ">
                                    <tr>
                                        <td></td>
                                        <td>购买数量</td>
                                        <td>优惠价格</td>
                                    </tr>
                                    <tr id="add_button">
                                        <td colspan="3" style="text-align: center">
                                            <input type="button" class="btn btn-success" onclick="add_discount()" value="添加优惠" /></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">成本价格</label>
                            <div class="col-sm-4">
                                <input type="text" name="cbprice" class="form-control" value="0.00" maxlength="5">
                            </div>
                            <div class="col-sm-4">
                                <span class="red">元</span>
                                <span>(商品进货价,可以不填,填写有利于商户系统的利润统计分析)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">库存预警（张）</label>
                            <div class="col-sm-4">
                                <input type="number" name="invent_report" class="form-control col-sm-2" value="0" maxlength="5" placeholder="张">张
                                <input type="checkbox" name="is_message" value="1" id="is_message"><label for="is_message" class="red">站内短信</label>
                                <input type="checkbox" name="is_email" value="1" id="is_email"><label for="is_email" class="red">发件邮件</label>
                            </div>
                            <div class="col-sm-4">
                                <span>(为0表示不做报警,设置后<span style="color: #000">请确保邮箱正确</span>，否则无法接收邮件。)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">限购数量（张）</label>
                            <div class="col-sm-4">
                                <input type="number" name="limit_quantity" class="form-control" value="0" maxlength="5">
                            </div>
                            <div class="col-sm-4">
                                <span>(为0表示购买数量可填写,大于0表示购买数量限制为设置的数值)</span>
                            </div>
                        </div>

                          <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">最少购买数量（张）</label>
                            <div class="col-sm-4">
                                <input type="number" name="min_quantity" class="form-control" min="1" value="1" maxlength="5">
                            </div>
                            <div class="col-sm-4">
                                <span>(为1表示购买数量可填写,大于1表示限定最少的购买数量)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">优 惠 券</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_coupon" value="1" id="is_coupon_1"><label for="is_coupon_1">支持</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_coupon" value="0" id="is_coupon_2" checked><label for="is_coupon_2">不支持</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span>(是否支持优惠券)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">密码开关</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_mima" value="0" id="is_mima_1" checked><label for="is_mima_1">关闭</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_mima" value="1" id="is_mima_2"><label for="is_mima_2">开启</label>
                                </div>

                            </div>
                            <div class="col-sm-4">
                                <span>(开启后，商品购买页面将提示输入设置的密码才能继续访问)</span>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;" id="tr_mima">
                            <label for="field-1" class="col-sm-3 control-label">设置密码</label>
                            <div class="col-sm-4">

                                <input type="password" name="mima" class="form-control">
                            </div>
                            <div class="col-sm-4">
                                <span>(设置密码：（密码长度在6-20位）)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">支付方式</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_dispay" value="0" id="is_dispay_1" checked><label for="is_dispay_1">默认</label>&nbsp;
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span>(默认是指根据您开启的支付方式来决定，此项设置仅在商品独立链接中有效！)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">首显付款</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_paytype" value="0" id="is_paytype_1" checked><label for="is_paytype_1">默认</label>&nbsp;
                                    	<!--	<input type="radio" name="is_paytype" value="1" id="is_paytype_2"><label for="is_paytype_2">网银</label>&nbsp;
							<input type="radio" name="is_paytype" value="2" id="is_paytype_3"><label for="is_paytype_3">充值卡</label>-->
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span>(设置购买页面首先显示的支付方式)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">库存显示</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_invent" value="0" id="is_invent_0" checked><label for="is_invent_0">默认</label>&nbsp;
                                    	
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_invent" value="1" id="is_invent_1"><label for="is_invent_1">显示库存数量</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_invent" value="2" id="is_invent_2"><label for="is_invent_2">显示库存范围</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span>(设置会在商品独立链接中有效，默认将使用商户信息中的设置)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">邮件通知</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_send_mail" value="0" id="is_send_mail_0" checked><label for="is_send_mail_0">关闭</label>&nbsp;
						   
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_send_mail" disabled value="1" id="is_send_mail_1"><label for="is_send_mail_1">开启</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                 <span>(本站已关闭邮件通知，建议到信息修改中开启微信通知)</span>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="field-1" class="col-sm-3 control-label">短信通知</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_send_sms" value="0" id="is_send_sms_0" checked><label for="is_send_sms_0">关闭</label>&nbsp;
						  
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_send_sms" value="1" id="is_send_sms_1"><label for="is_send_sms_1">开启</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span>(开启后，成功售卡将会发送短信通知)</span>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="field-1" class="col-sm-3 control-label">商品链接</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_join_main_link" value="0" id="is_join_main_link_0" checked><label for="is_join_main_link_0">关闭</label>&nbsp;
						  
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_join_main_link" value="1" id="is_join_main_link_1"><label for="is_join_main_link_1">开启</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">(开启后，该商品链接不显示在总链接中)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">取卡密码</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_pwdforsearch" value="0" id="is_pwdforsearch_0" checked><label for="is_pwdforsearch_0">关闭</label>&nbsp;
						   
						    
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_pwdforsearch" value="1" id="is_pwdforsearch_1"><label for="is_pwdforsearch_1">必填</label>&nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_pwdforsearch" value="2" id="is_pwdforsearch_2"><label for="is_pwdforsearch_2">选填</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span>(开启后，购买页面会提示买家填写取卡密码)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">客户信息</label>
                            <div class="col-sm-4">
                                <select name="is_contact_limit" class="form-control">
                                    <option value="99" selected>默认</option>
                                    <option value="0">任意字符</option>
                                    <option value="1">必须为数字</option>
                                    <option value="2">必须为字母</option>
                                    <option value="3">必须为字母和数字</option>
                                    <option value="4">字母或数字、下划线</option>
                                    <option value="5">必须为中文</option>
                                    <option value="6">邮箱账号</option>
                                    <option value="7">手机号码</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span style="color: red">客户下单时输入的联系方式或充值账号格式限制！</span>
                            </div>
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="field-1" class="col-sm-3 control-label">商品推销</label>
                            <div class="col-sm-4">
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_tg" value="0" id="is_tg_2" checked><label for="is_tg_2">关闭</label>
                                    &nbsp;
                                </div>
                                <div class="radio radio-replace color-blue">
                                    <input type="radio" name="is_tg" value="1" id="is_tg_1"><label for="is_tg_1">开启</label>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <span style="color: red">开启这个功能后可以通过推广会员为您推广商品！</span>
                            </div>
                        </div>
                        <div class="form-group" style="display: none;">
                            <label for="field-1" class="col-sm-3 control-label">会员分成</label>
                            <div class="col-sm-4">
                                <input type="text" name="tghyfc" class="form-control" value="0">
                            </div>
                            <div class="col-sm-4">
                                <span style="color: red">分成输入数字比例，系统按百分百计算例如:1</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <div class="alert alert-info">商品额外信息</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户名称</label>
                            <div class="col-sm-4">
                                <input type="text" name="sitename" class="form-control" maxlength="50">
                            </div>
                            <div class="col-sm-4">
                                <span style="color: red">(若为空，商品出售页面则显示商户信息中的站点名称)</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商品描述</label>
                            <div class="col-sm-4">
                                <textarea name="remark" class="form-control"></textarea>
                            </div>
                             <div class="col-sm-4">
                                <span>若要使用高级文本编辑，请到PC端。</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户网址</label>
                            <div class="col-sm-4">
                                <input type="text" onkeyup='this.value=this.value.replace(/http:\/\//gi,"")' name="siteurl" class="form-control" maxlength="50">
                            </div>
                            <div class="col-sm-4">
                                <span>(不要带http://，若为空，商品出售页面则显示商户信息中的站点网址)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户 Q Q:</label>
                            <div class="col-sm-4">
                                <input type="text" name="qq" class="form-control" maxlength="12">
                            </div>
                            <div class="col-sm-4">
                                <span>(若为空，商品出售页面则显示商户信息中的联系QQ)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-success" value="保存设置" />
                            </div>
                        </div>
                        <!--  <tr>
						<td class="right">商品类型:</td>
						<td>
						    <input type="radio" name="is_api" value="0" id="is_api_1" checked onclick="javascript:$('#api_return_url').hide()"><label for="is_api_1">在线售卡</label>
							&nbsp;
							<input type="radio" name="is_api" value="1" id="is_api_2" onclick="javascript:$('#api_return_url').show()"><label for="is_api_2">在线充值</label>
							<span>(<span class="red">设置后不能修改！</span>在线充值需要API接口)</span>
                        </td>
						</tr>

						<!--<tr id="api_return_url" style="display:none">
						    <td class="right">通知地址:</td>
							<td><input type="form-control" class="form-control" name="api_return_url"> <span><span class="red">以'http://'开头</span>(api通知地址，不可带任何参数)</span></td>
						</tr>-->

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        //开启推广
        jQuery(document).ready(function($){ 
            try{
                $("#is_tg_1").on('click',function () {
                    var the=$(this);
                    if (the.prop('checked') && $("#price").val()<10) {
                        the.prop('checked',false);
                        $("#is_tg_2").prop('checked',true);
                        alert("本平台推广商品售价必须高于10元，推广分成比例1以上");
                    }else if (the.prop('checked')){
                        $("#tr_tghyfc").show();
                    }
                });
                $("#is_tg_2").on('click',function () {
                    var the=$(this);
                    if (the.prop('checked')){
                        $("#tr_tghyfc").hide();
                    }
                });
            }catch(e){}
        });
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

            var price=$.trim($('[name=price]').val());
            if(price<0.1){
                alert('不允许销售小于0.1元的商品！');
                $('[name=price]').focus();
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
            if($('#is_discount_desc table tr').length>=12){
                alert('最多添加10个优惠区间');
                return false;
            }
           
            $('tr#add_button').before('<tr><td> <button type="button" class="btn btn-red btn-icon icon-left btn-xs" onclick="del_discount(this)">移除<i class="entypo-cancel"></i></button></td><td>大于 <input type="text" name="dis_quantity[]" class="disc" value="" /> 张</td><td><input type="text" class="disc" name="dis_price[]" value="" /> 元</td></tr>');
        }

        var del_discount=function(id){
            $(id).parent().parent().remove();
        }
       
    </script>
</div>
