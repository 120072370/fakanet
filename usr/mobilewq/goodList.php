<?php if(!defined('WY_ROOT')) exit; ?>

<style>
    td.astyle a {
        color: #000;
    }

        td.astyle a.red {
            color: red;
        }

        td.astyle a.green {
            color: green;
        }

    select {
        color: #000;
    }



    .search_btn {
        display: inline-block;
        border-radius: 16px;
        width: 120px;
        height: 32px;
        line-height: 32px;
        color: #fff;
        background: #7b7dea;
        font-size: 14px;
        border: 1px solid #7b7dea;
    }

    .search_input {
        width: 15%;
        height: 30px;
        border: 1px solid #eee;
        padding: 0 10px;
        letter-spacing: 1px;
        border-radius: 2px;
    }
    .nopadding {
        padding:0;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default panel-shadow" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">商品管理</div>
            </div>
            <!-- panel body -->
            <div class="panel-body">
                <div class="main">

                    <?php if(_G('add_suc')): ?><div id="tipMsg" class="actived">商品添加成功</div><?php endif; ?>
                    <?php if(_G('add_err')): ?><div id="tipMsg" class="errmsg">商品添加失败</div><?php endif; ?>
                    <?php if(_G('edit_suc')): ?><div id="tipMsg" class="actived">商品修改保存成功</div><?php endif; ?>
                    <?php if(_G('edit_err')): ?><div id="tipMsg" class="errmsg">商品修改保存失败</div><?php endif; ?>
                    <script>setTimeout(hideMsg, 2600)</script>
                    <div class="col-md-12">
                        <form name="search" method="get" action="">
                            <div class="alert alert-minimal">
                                <select name="is_config" class="form-control">
                                    <option value="" <?php echo $is_config=='' ? 'selected' : '' ?>>--卡价值--</option>
                                    <option value="c1" <?php echo $is_config=='c1' ? 'selected' : '' ?>>单独配置</option>
                                    <option value="c0" <?php echo $is_config=='c0' ? 'selected' : '' ?>>全局配置</option>
                                </select>&nbsp;
					<select name="is_state" class="form-control">
                        <option value="" <?php echo $is_state=='' ? 'selected' : '' ?>>--链接--</option>
                        <option value="s1" <?php echo $is_state=='s1' ? 'selected' : '' ?>>无链接</option>
                        <option value="s0" <?php echo $is_state=='s0' ? 'selected' : '' ?>>有链接</option>
                    </select>&nbsp;
					<select name="cateid" class="form-control">
                        <option value="">--商品分类--</option>
                        <?php 
                        if($goodCate): 
                            foreach($goodCate as $key=>$val):
                                if($val['userid']==$_SESSION['login_userid']):
                        ?>
                        <option value="<?php echo $val['id'] ?>" <?php echo $cateid==$val['id'] ? 'selected' : '' ?>><?php echo $val['catename'] ?></option>
                        <?php
                                endif;
                            endforeach;
                        endif;
                        ?>
                    </select>&nbsp;
                                <div class="input-group">
                                    <input type="text" class="form-control" name="goodname"  value="<?php echo $goodname ?>" maxlength="30" placeholder="请输入商品名称" />
                                    <input type="hidden" name="do" value="search">
                                    <div class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-icon icon-left form-control" value="">
                                            查询
                        <i class="entypo-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <form name="cate" method="post" action="?action=saveset">

                        <?php if($lists): ?>
                        <?php 
                                  foreach($lists as $key=>$val): 
                        ?>
                        <div class="col-md-12 nopadding" id="record_<?php echo $val['id'] ?>">

                            <blockquote class="blockquote-default">
                                <p>
                                    <strong>商品名称:</strong>
                                    <span style="line-height: 121%;"><a href="javascript:void(0)" 
                                        onclick="showview('?action=link&id=<?php echo $val['linkid'] ?>&goodid=<?php echo $val['id'] ?>','获取商品[<?php echo $val['goodname'] ?>]链接')"><?php echo $val['goodname'] ?></a>
                                        <?php echo $val['is_api'] ? '<span style="color:red;vertical-align:super;font-size:9px">API</span>' : '' ?></span>
                                </p>
                                <!-- <p>
                                     <?php if($val['is_link_state']): ?>
						    <a href="javascript:void(0)" onclick="if(confirm('是否要开启该商品的独立页面？'))Boxy.load('?action=link&id=<?php echo $val['linkid'] ?>&goodid=<?php echo $val['id'] ?>',{title:'获取商品[<?php echo $val['goodname'] ?>]链接'})" title="<?php echo $val['goodname'] ?>">
						<?php else: ?>
<a href="../lin/?id=<?php echo $val['linkid'] ?>" target="_blank" title="<?php echo $val['goodname'] ?>"><?php endif; ?><?php echo strlen($val['goodname'])>16 ? subString($val['goodname'],0,16).'...' : $val['goodname'] ?></a>
                                        
                                </p> -->
                                <p><strong>商品价格:</strong><?php echo $val['price'] ?></p>
                                <p><strong>库存卡:</strong><?php echo $val['kucunGoods'] ?>张 <a href="goodInvent.php?goodid=<?php echo $val['id'] ?>" class="btn btn-link btn-xs">查看</a></p>
                                <p><strong>已卖出:</strong><?php echo $val['sellGoods'] ?>张 <a href="goodSell.php?goodid=<?php echo $val['id'] ?>" class="btn btn-link btn-xs">查看</a></p>
                                <p>
                                    <strong>商品管理:</strong>
                                    <?php if($val['is_state']==1): ?>
                                    <a href="?action=verify&id=<?php echo $val['id'] ?>&t=0" title="点击下架"  class="btn btn-success btn-xs">上架中</a>&nbsp;
							<?php elseif($val['is_state']==2): ?>
                                    <a href="javascript:;" title="" class="btn btn-red btn-xs">审核中</a>&nbsp;
							<?php elseif($val['is_state']==3): ?>
                                    <a href="javascript:;" title="" class="btn btn-red btn-xs">审核未通过</a>&nbsp;
							<?php else: ?>
                                    <a href="?action=verify&id=<?php echo $val['id'] ?>&t=1" title="点击上架" class="btn btn-red btn-xs">已下架</a>&nbsp;
							<?php endif; ?>
                                </p>
                                <p>

                                    <a  href="javascript:void(0)" class="btn btn-blue btn-xs" onclick="showview('?action=link&id=<?php echo $val['linkid'] ?>&goodid=<?php echo $val['id'] ?>','获取商品[<?php echo $val['goodname'] ?>]链接')">链接</a>&nbsp;

							
							
						
							
							<a href="?action=edit&id=<?php echo $val['id'] ?>" class="btn btn-success btn-xs" >编辑</a>&nbsp;
                                   
							<a href="javascript:void(0)" onclick="showview('?action=editcate&id=<?php echo $val['id'] ?>','修改商品分类')" class="btn btn-gold btn-xs" >移</a>

                                    <a href="javascript:void(0)" onclick="delData(<?php echo $val['id'] ?>)"  class="btn btn-white btn-xs">
                                        <img src="weiqi/images/ico_del.gif" title="移除商品" align="absmiddle" /></a>&nbsp;
                                </p>
                                <p>
                                    	<a href="goods.php?goodid=<?php echo $val['id'] ?>" class="btn btn-blue btn-xs" >加卡</a>&nbsp;
                                    <a href="rates.php?goodid=<?php echo $val['id'] ?>"<?php echo $val['is_config_rates'] ? ' class="btn btn-blue btn-xs" ' : 'class="btn btn-white btn-xs" ' ?>>卡价值</a>&nbsp;
                                </p>
                            </blockquote>
                        </div>

                        <?php endforeach; ?>
                        <div class="col-md-12">
                            <div class="dataTables_paginate paging_bootstrap"><?php echo $pagelist ?></div>
                        </div>

                        <div class="col-md-12">
                            <a href="?action=add" class="btn btn-red  btn-icon icon-left">添加商品 <i class="entypo-plus"></i>
                            </a>
                        </div>
                        <?php else: ?>
                        <div class="col-md-12">
                            <div class="alert alert-warning">暂无商品</div>
                        </div>
                        <?php endif; ?>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var addNew = function () {
        $('#addNewCate').toggle();
    }

    var delData = function (id) {
						<?php if(!$_SESSION['login_user_safe_key']): ?>
        userSafeVerify(1); return false;
						<?php endif ?>
        if (confirm('是否要删除此商品？')) {
            $.get('goodList.php', { action: 'del', id: id }, function (data) {
                if (data == 'ok') {
                    $('#record_' + id).fadeOut();
                } else {
                    alert(data);
                }
            })
        }
    }

</script>
