<?php if(!defined('WY_ROOT')) exit; ?>
<style>
    td.right {
        color: #000;
    }

    td span {
        color: #666;
    }

    .table_style_2 td {
        padding: 4px 0;
    }
</style>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">编辑分类</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">
                    <?php if($data): ?>
                    <form name="safe" method="post" action="?action=save&id=<?php echo $id ?>" class="form-horizontal form-groups-bordered">

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">分类名称</label>
                            <div class="col-sm-4">
                                <input type="text" name="catename" class="form-control" value="<?php echo $data['catename'] ?>" maxlength="50">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">分类排序</label>
                            <div class="col-sm-4">
                                <input type="text" name="sortid" class="form-control" value="<?php echo $data['sortid'] ?>" maxlength="5">
                            </div>
                            <div class="col-sm-4">
                                <span>数字越小越靠前</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">页面风格</label>
                            <div class="col-sm-4">
                                <select name="theme" class="form-control">
                                    <option value="" <?php echo $data['theme']=='' || $data['theme']=='default' ? 'selected' : '' ?>>系统默认</option>
                                    <?php foreach($tplList as $key=>$val): ?>
                                    <option value="<?php echo $key ?>" <?php echo $data['theme']==$key ? 'selected' : '' ?>><?php echo $val ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <span class="red">设置购买页面风格样式，在商品分类独立链接中有效！</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">
                                <strong>分类额外信息</strong>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户名称</label>
                            <div class="col-sm-4">
                                <input type="text" name="sitename" class="form-control" value="<?php echo $data['sitename'] ?>" maxlength="50">
                            </div>
                            <div class="col-sm-4">
                                <span>(若为空，商品出售页面则显示商户信息中的站点网址)</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户网址</label>
                            <div class="col-sm-4">
                                 <input type="text" name="siteurl" class="form-control" value="<?php echo $data['siteurl'] ?>" maxlength="50">
                            </div>
                            <div class="col-sm-4">
                                <span>(若为空，商品出售页面则显示商户信息中的站点网址)</span>
                            </div>
                        </div>
                         <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label">商户&nbsp;&nbsp;QQ:</label>
                            <div class="col-sm-4">
                               <input type="text" name="qq" class="form-control" value="<?php echo $data['qq'] ?>" maxlength="12">
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
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('[type=submit]').click(function () {
            var catename = $.trim($('[name=catename]').val());
            if (catename == '') {
                alert('分类名称不能为空！');
                $('[name=catename]').focus();
                return false;
            }

            var sortid = $.trim($('[name=sortid]').val());
            if (sortid == '' || isNaN(sortid)) {
                alert('分类排序不能为空，格式为整数值！');
                $('[name=sortid]').focus();
                return false;
            }
        })
    </script>
    <?php endif; ?>
</div>
