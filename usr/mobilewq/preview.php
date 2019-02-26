<?php
if(!defined('WY_ROOT')) exit; 
$t=_G('t','int');
$t=$t==false ? 1 : $t;
?>
<div style="height:1200px">
<script src="http://<?php echo SITEURL ?>/sjs.php?id=<?php echo $_SESSION['login_userkey'] ?>&t=<?php echo $t ?>"></script>
</div>
