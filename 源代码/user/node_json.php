<?php
//引入配置文件
require_once 'user_check.php';
//include_once 'lib/header.inc.php';
$id = $_GET['id'];
$sql ="SELECT * FROM `ss_node` WHERE `id` = '$id'  ";
$query =  $dbc->query($sql);
$rs = $query->fetch_array();
$server =  $rs['node_server'];
$method = $rs['node_method'];
$pass = $oo->get_pass();
$port = $oo->get_port();
?>
<hr>
服务器IP:<?php echo $server; ?><br>
服务端口:<?php echo $port; ?><br>
代理端口:1080<br>
密&nbsp;&nbsp;&nbsp;&nbsp;码:<?php echo $pass; ?><br>
超时时间:600<br>
加密方式:<?php echo $method; ?><br>
<hr>




