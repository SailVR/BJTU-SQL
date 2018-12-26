<?php
//引入配置文件
require_once 'user_check.php';
$id = $_GET['id'];
$sql = "SELECT * FROM `ss_node` WHERE id = '$id' ";
$query = $dbc->query($sql);
$rs = $query->fetch_array();
    $node_id       = $rs['node_id'];
    $node_name     = $rs['node_name'];
    $node_type     = $rs['node_type'];
    $node_server   = $rs['node_server'];
    $node_method   = $rs['node_method'];
    $node_info     = $rs['node_info'];
    $node_status   = $rs['node_status'];
    $node_order    = 1
    $n = new node($node_id);
    $query = $n->update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
	if($query){
        echo ' <script>alert("更新成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
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
?>
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
