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
                    <form name="safe" method="post" action="?action=save&id=<?php echo $id ?>">
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <td width="90" class="right">分类名称:</td>
                                <td>
                                    <input type="text" name="catename" class="input" value="<?php echo $data['catename'] ?>" maxlength="50">
                                    <span class="red">*</span></td>
                            </tr>

                            <tr>
                                <td class="right">分类排序:</td>
                                <td>
                                    <input type="text" name="sortid" class="input" value="<?php echo $data['sortid'] ?>" maxlength="5">
                                    <span>数字越小越靠前</span></td>
                            </tr>
                            <tr>
                                <td class="right">页面风格:</td>
                                <td>
                                    <select name="theme">
                                        <option value="" <?php echo $data['theme']=='' || $data['theme']=='default' ? 'selected' : '' ?>>系统默认</option>
                                        <?php foreach($tplList as $key=>$val): ?>
                                        <option value="<?php echo $key ?>" <?php echo $data['theme']==$key ? 'selected' : '' ?>><?php echo $val ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <span class="red">设置购买页面风格样式，在商品分类独立链接中有效！</span></td>
                            </tr>

                            <tr>
                                <td colspan="2"><strong>分类额外信息</strong></td>
                            </tr>

                            <tr>
                                <td class="right">商户名称:</td>
                                <td>
                                    <input type="text" name="sitename" class="input" value="<?php echo $data['sitename'] ?>" maxlength="50">
                                    <span>(若为空，商品出售页面则显示商户信息中的站点名称)</span></td>
                            </tr>

                            <tr>
                                <td class="right">商户网址:</td>
                                <td>
                                    <input type="text" name="siteurl" class="input" value="<?php echo $data['siteurl'] ?>" maxlength="50">
                                    <span>(若为空，商品出售页面则显示商户信息中的站点网址)</span></td>
                            </tr>

                            <tr>
                                <td class="right">商户&nbsp;&nbsp;QQ:</td>
                                <td>
                                    <input type="text" name="qq" class="input" value="<?php echo $data['qq'] ?>" maxlength="12">
                                    <span>(若为空，商品出售页面则显示商户信息中的联系QQ)</span></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" class="btn btn-success" value="保存设置" /></td>
                            </tr>
                        </table>
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
