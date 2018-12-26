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
?>
<!-- Right side column. Contains the navbar AND content of the page -->
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            投诉好友
            <small>Complaints of friends</small>
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
                        <h3 class="box-title">投诉朋友</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" action="node_complaint.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_name">名字</label>
                                <input  class="form-control" name="node_name">
                            </div>
							
							<div class="form-group">
                                <label for="cate_name">投诉原因</label>
                                <input  class="form-control" name="node_complaint">
                            </div>
							
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action"  class="btn btn-primary">投诉</button>
                        </div>
						
                        </form>
                  		<?php if(!empty($_POST)){
    								$name = $_POST['node_name'];
  									$complaint = $_POST['node_complaint'];
  									$method = $_COOKIE['user_name'];
									$sql ="SELECT * FROM `ss_node` WHERE `node_name` = '$name' AND `node_method` = '$method'";
    								$query =  $dbc->query($sql);
  									$str = $query->fetch_array();
  									if($str == '') echo "<script>alert('该用户不是你的好友');</script>";
  									else {echo "<script>alert('投诉成功，请等待结果');</script>";
      								$sql1 ="INSERT INTO `complaints` (`node_name`,`node_complaint`) VALUES ('$name','$complaint')";
    								$query = $dbc->query($sql1);
  }
							} ?>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>