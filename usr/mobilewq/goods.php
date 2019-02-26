<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    input[type=checkbox] {
        vertical-align: middle;
    }
</style>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">添加卡密</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if(_G('add_suc')): ?><div id="tipMsg" class="actived">卡密添加成功</div><?php endif; ?>
                    <?php if(_G('add_err')): ?><div id="tipMsg" class="errmsg">卡密添加失败</div><?php endif; ?>
                    <?php if(_G('add_err_1')): ?><div id="tipMsg" class="errmsg">仅支持TXT格式的文件上传</div><?php endif; ?>
                    <?php if(_G('add_err_2')): ?><div id="tipMsg" class="errmsg">上传的文件最大支持100kB</div><?php endif; ?>
                    <?php if(_G('add_err_3')): ?><div id="tipMsg" class="errmsg">上传出现意外错误，请稍候重试...</div><?php endif; ?>
                    <?php if(_G('add_err_4')): ?><div id="tipMsg" class="errmsg">输入框添加卡密最多500张(500行)</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>
                    <form name="cate" method="post" onsubmit="return checkform()" enctype="multipart/form-data" action="?action=add" class="form-horizontal form-groups-bordered">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商品名称</label>
                            <div class="col-sm-4">
                                <select name="goodid" class="form-control">
                                    <option value="">请选择商品</option>
                                    <?php 
                                    if($goodList):
                                        foreach($goodList as $key=>$val):
                                            if($val['userid']==$_SESSION['login_userid']):
                                    ?>
                                    <option value="<?php echo $val['id'] ?>" <?php echo $val['id']==$goodid ? 'selected' : '' ?>><?php echo $val['goodname'] ?></option>
                                    <?php
                                            endif;
                                        endforeach;
                                    endif;
                                    ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-sm-4">
                                <div class="alert alert-info">卡密格式：卡号+空格+密码，一行一张卡，如：A1B2C3D4F5E8 9876543210</div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">添加方式</label>
                            <div class="col-sm-4">
                                <input type="radio" name="importfrom" value="1" onclick="selecttype(1)" id="r1" />
                                <label for="r1">使用TXT文件导入</label>
                                &nbsp;&nbsp;
							<input type="radio" name="importfrom" value="2" onclick="selecttype(2)" id="r2" checked />
                                <label for="r2">使用输入框添加</label>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">卡密内容</label>
                            <div class="col-sm-4">
                                <div id="addtype_r1" style="display: none">
                                    <input type="file" name="f" class="input"  accept="*">
                                    <div class="blue">注意：上传的TXT文件最大100kb字节</div>
                                </div>

                            </div>
                            <div class="col-sm-4">

                                <div id="addtype_r2">
                                    <textarea name="content" style="border: 1px solid #ccc" class="form-control" rows="23"></textarea>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">注意事项</label>
                            <div class="col-sm-4">
                               <div class="alert alert-info">输入框添加卡密最多一次添加500张(500行)，TXT文件上传最多支持100kb。</div>
                            </div>
                          
                        </div>
                         <div class="form-group">
                            <div class="col-sm-4">
                                <div class="checkbox checkbox-replace color-blue">
                               <input type="checkbox" name="is_check_repeat" id="is_check_repeat" value="1">
                                    <label for="is_check_repeat"><span class="bold" style="color: #770000">检查重复的卡密(选中后表示重复的卡密将不会加入库存中)</span> </label>
                                    </div>
                            </div>
                          
                        </div>
                         <div class="form-group">
                            <div class="col-sm-4">
                              <input type="submit" class="btn btn-success" value="添加卡密" />
                            </div>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var selecttype = function (t) {
        if (t == 1) {
            $('#addtype_r1').css({ 'display': 'block' });
            $('#addtype_r2').css({ 'display': 'none' });
        } else {
            $('#addtype_r2').css({ 'display': 'block' });
            $('#addtype_r1').css({ 'display': 'none' });
        }
    }

    var checkform = function () {
        var goodid = $('[name=goodid]').val();
        if (goodid == '') {
            alert('请选择商品名称');
            $('[name=goodid]').focus();
            return false;
        }
        var msg = true;
        $('[type=radio]').each(function () {
            if ($(this).prop('checked')) {
                var id = $(this).attr('id');
                if (id == 'r1') {
                    var file = $('[name=filefrom]').val();
                    if (file == '') {
                        alert('请选择要上传的TXT文件！');
                        $('[name=filefrom]').focus();
                        msg = false;
                    }
                } else if (id == 'r2') {
                    var text = $.trim($('[name=content]').val());
                    if (text == '') {
                        alert('请填写卡密内容！');
                        $('[name=content]').focus();
                        msg = false;
                    }
                }
            }
        })
        return msg;
    }
</script>
