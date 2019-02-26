<?php if(!defined('WY_ROOT')) exit; ?>
<style type="text/css">
    .tip {
        z-index: 999;
        color: #ea4c88;
        text-decoration: none;
        font-size: 14px;
        padding: 15px;
        margin: 20px 0;
        border: 1px solid #e0e1ff;
        border-radius: 5px;
        background: #f5f4ff;
        color: #7b7dea;
        line-height: 24px;
        letter-spacing: 0.2rem;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">登陆日志</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">

                <div class="main">
                    <div class="alert alert-success">只保留显示最近30天的登陆日志.</div>
                    <table class="table table-bordered table-responsive" cellspacing="1">
                        <thead>
                            <tr>
                                <th class="border_right border_bottom">商户编号</th>
                                <th class="border_right border_bottom">商户名称</th>
                                <th class="border_right border_bottom">登陆日期</th>
                                <th class="border_bottom">登陆IP</th>
                            </tr>
                        </thead>
                        <?php if($lists): ?>
                        <?php 
                                  foreach($lists as $key=>$val): 
                        ?>
                        <tr class="lightbox">
                            <td class="border_right border_bottom"><?php echo $val['userid'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['username'] ?></td>
                            <td class="border_right border_bottom"><?php echo $val['logtime'] ?></td>
                            <td class="border_bottom"><a href="http://www.baidu.com/s?wd=<?php echo $val['logip'] ?>&rsv_spt=1&issp=1&rsv_bp=0&ie=utf-8&tn=baiduhome_pg" title="点击查看IP来源" target="_blank"><?php echo $val['logip'] ?></a></td>
                        </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="4" class="bg" style="text-align: left; padding-left: 20px">
                                <div><?php echo $pagelist ?></div>
                            </td>
                        </tr>
                        <?php else: ?>
                        <tr>
                            <td colspan="4"><div class="alert alert-warning">暂无记录</div></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
