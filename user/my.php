<?php
//引入配置文件
require_once 'user_check.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $site_name;?></title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';
if($oo->get_transfer()<1000000)
{
    $transfers=0;}else{ $transfers = $oo->get_transfer();

}
//计算流量并保留2位小数
$transfers = $transfers/$tomb;
$transfers = round($transfers,2);
$all_transfer = $oo->get_transfer_enable()/$togb;
$all_transfer = round($all_transfer,2);
$unused_transfer =  $oo->unused_transfer()/$togb;
$unused_transfer = round($unused_transfer,2);
//最后在线时间
$unix_time = $oo->get_last_unix_time();
?>
<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side" style = "background:url('http://hjl.fly-me.cn:81/bg.png')">
    
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
