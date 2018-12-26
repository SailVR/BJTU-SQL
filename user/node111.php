<?php
//引入配置文件
require_once 'user_check.php';
require_once '../lib/class/node.class.php';
?>
<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
    <title><?php echo $site_name;?></title>
    <?php include_once 'lib/header.inc.php'; ?>
</head>
<body class="skin-blue">
<?php include_once 'lib/nav.inc.php';
include_once 'lib/slidebar_left.inc.php';

//更新
if(!empty($_POST)){
    $node_name     = $_COOKIE['user_name'];
    $node_type     = 0;
    $node_server   = $_POST['node_server'];
    $node_method   = $_POST['node_method'];
    $node_info     = $_POST['node_info'];
    $node_status   = $_POST['node_status'];
    $node_order    = $_POST['node_order'];
    $n = new node(0);
    $query = $n->add($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    if($query){
        echo ' <script>alert("添加成功!")</script> ';
        echo " <script>window.location='node.php';</script> " ;
    }
}

if(!empty($_GET)){
    //获取id
    $id = $_GET['id'];
    $sql = "SELECT * FROM `ss_node` WHERE id = '$id' ";
    $query = $dbc->query($sql);
    $rs = $query->fetch_array();
    $node_id       = $rs['node_id'];
    $node_name     = $rs['node_name'];
    $node_type     = 0;
    $node_server   = $rs['node_server'];
    $node_method   = $rs['node_method'];
    $node_info     = $rs['node_info'];
    $node_status   = $rs['node_status'];
    $node_order    = $rs['node_order'];
    $n = new node($node_id);
    $query = $n->update($node_name,$node_type,$node_server,$node_method,$node_info,$node_status,$node_order);
    $n = new node(0);
    $query = $n->add($node_method,$node_type,$node_server,$node_name,$node_info,$node_status,$node_order);
}
?>
<!-- Right side column. Contains the navbar and content of the page -->
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
                        <h3 class="box-title">编辑好友信息</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="node_edit.php">
                        <div class="box-body">

                            <div class="form-group" style="display:none" >
                                <label for="cate_title" >ID</label>
                                <input  class="form-control" name="node_id" value="<?php echo $id;?>"  >
                            </div>

                            <div class="form-group" style="display:none">
                                <label for="cate_title">我的名字</label>
                                <input  class="form-control" name="node_name" value="<?php echo $rs['node_name'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">备注</label>
                                <input  class="form-control" name="node_server" value="<?php echo $rs['node_server'];?>" >
                            </div>

                            <div class="form-group" style="display:none">
                                <label for="cate_order">分类(0或者1)</label>
                                <input   class="form-control" name="node_type"  value="0" >
                            </div>
							
                                <div class="form-group" style="display:none">
                                <label for="cate_method">他的名字</label>
                                <input  class="form-control" name="node_method" value="<?php echo $rs['node_method'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_title">是否同意看朋友圈，0（不允许）/1</label>
                                <input  class="form-control" name="node_info" value="<?php echo $rs['node_info'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">标签</label>
                                <input   class="form-control" name="node_status"  value="<?php echo $rs['node_status'];?>" >
                            </div>

                            <div class="form-group">
                                <label for="cate_order">是否加入黑名单 0为不加入，1为加入</label>
                                <input   class="form-control" name="node_order"  value="<?php echo $rs['node_order'];?>" >
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action" value="edit" class="btn btn-primary">修改</button>
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
