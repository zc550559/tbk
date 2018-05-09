<?php if (!defined('THINK_PATH')) exit();?>用户id:<?php echo ($userid); ?>
<br />
<form action="<?php echo U('Job/verify',array('userid'=>$userid));?>" method="post">
<textarea name="keys"></textarea><br />
<input type="submit" />
</form>