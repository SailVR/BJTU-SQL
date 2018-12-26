<?php
//引入配置文件
require_once 'user_check.php';
require_once '../lib/class/node.class.php';
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
if(!empty($_POST)){
    $node_name     = $_POST['node_name'];
    $node_type     = 1;
    $node_server   = $_POST['node_server'];
    $node_method   = $_COOKIE['user_name'];
    $node_info     = $_POST['node_info'];
    $node_status   = $_POST['node_status'];
    $node_order    = 0;
    $n = new node(0);
    $query = $n->add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
	if($query){
        echo ' <script>alert("提交申请成功!")</script> ';
    }
  /*
    $sql = "SELECT * FROM `ss_node` WHERE node_name = '+Request.Cookies('user_name')+' AND node_method = '$node_method' ";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
if($rs&&$rs['node_order']==1)
	{
	echo ' <script>alert("但是对方已将您加入黑名单")</script> ';
	$n = new node($id);
	$query = $n->del();
}
   if($rs&&$rs['node_order']!=1){
    $node_id       = $rs['node_id'];
    $node_name     = $rs['node_name'];
    $node_type     = 0;
    $node_server   = $rs['node_server'];
    $node_method   = $rs['node_method'];
    $node_info     = $rs['node_info'];
    $node_status   = $rs['node_status'];
    $node_order    = 0;
    $n = new node($node_id);
    $query = $n->update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
	$node_method   = $_POST['node_method'];
    $sql = "SELECT * FROM `ss_node` WHERE node_name = '$node_method' AND node_method = '+Request.Cookies('user_name')+' ";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
    $node_id       = $rs['node_id'];
    $node_name     = $rs['node_name'];
    $node_type     = 0;
    $node_server   = $rs['node_server'];
    $node_method   = $rs['node_method'];
    $node_info     = $rs['node_info'];
    $node_status   = $rs['node_status'];
    $node_order    = 0;
    $n = new node($node_id);
    $query = $n->update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    if($query){
        echo " <script>window.location='node.php';</script> " ;
		}
	}*/
}
?>
<!-- Right side column. Contains the navbar AND content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            好友列表
            <small>Friends List</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">添加朋友</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" action="node_add.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_name">名字</label>
                                <input  class="form-control" name="node_name" value="<?php echo $rs['node_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">备注</label>
                                <input  class="form-control" name="node_server" value="<?php echo $rs['node_server'];?>" >
                            </div>
							
                            <div class="form-group">
                                <label for="cate_title">是否同意看朋友圈，0（不允许）/1</label>
                                <input  class="form-control" name="node_info" value="<?php echo $rs['node_info'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">标签</label>
                                <input   class="form-control" name="node_status"  value="<?php echo $rs['node_status'];?>" >
                            </div>

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="add" class="btn btn-primary">添加</button>
                        </div>
                        </form>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
