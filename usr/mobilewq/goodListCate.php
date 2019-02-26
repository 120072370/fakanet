<?php if(!defined('WY_ROOT')) exit; ?>

<?php if($data): ?>
<form name="add" method="post" action="?action=editcatesave&id=<?php echo $id ?>">
    <table class="table table-bordered table-responsive">
        <tr>
            <td width="90" class="bold right">当前商品分类:</td>
            <td>
                <select disabled>
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
            </td>
        </tr>

        <tr>
            <td class="bold right">选择新分类:</td>
            <td>
                <select name="cateid">
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
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <input type="submit" class="btn btn-success" value="保存设置" /></td>
        </tr>
    </table>
</form>
<?php endif; ?>