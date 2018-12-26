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
            查询好友
            <small>Friends query</small>
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
                        <h3 class="box-title">查询朋友</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                        <form role="form" method="post" action="node_search.php">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="cate_name">名字</label>
                                <input  class="form-control" name="node_name" value="<?php echo $rs['node_name'];?>">
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" name="action"  class="btn btn-primary">查询</button>
                        </div>
                        </form>
                  		<?php if(!empty($_POST)){
    								$name = $_POST['node_name'];
  									$method = $_COOKIE['user_name'];
									$sql ="SELECT * FROM `ss_node` WHERE `node_name` = '$method' AND `node_method` = '$name'";
    								$query =  $dbc->query($sql);
  									$str = $query->fetch_array();
  									if($str == '') echo "<script>alert('查询不到');</script>";
  									else 
  									//$str = serialize($query->fetch_array());
									//echo $str;
  									//$str['node_info']+$str['node_order'])
  									//echo "nodename:".strval($str['node_name'])." node_info:".strval($str['node_info'])." node_order". strval($str['node_order']);
  									/*$str = "<h4>"."用户名:".strval($str['node_name'])."</h4><br>"."<h4>"."是否好友（0是）:".strval($str['node_type'])."</h4><br>"
                                      ."<h4>"."备注:".strval($str['node_server'])."</h4><br>"."<h4>"."好友名:".strval($str['node_method'])."</h4><br>"
                                      ."<h4>"."看让票圈（1看）:".strval($str['node_info'])."</h4><br>"."<h4>"."标签:".strval($str['node_status'])."</h4><br>"
                                      ."<h4>"."黑名单（1在）:".strval($str['node_order'])."</h4><br>";
 
									echo html_entity_decode($str, ENT_NOQUOTES);*/
							while ( $str){  
                              $rs=$str;
                        $abcd=$rs['node_method'];
                        $sql ="SELECT * FROM `ss_node` WHERE `node_method` = '$abc' AND `node_name` ='$abcd'";
                        $queryy =  $dbc->query($sql);
                        $rss = $queryy->fetch_array()           
                        ?>
                            <div class="callout callout-info">
                                <h4><?php echo $rs['node_method']; ?></h4>
                              	<h4><?php $a = $rs['node_method'];
                                  		$sql ="SELECT * FROM `complaints_users` WHERE `user_name` = '$a'";
                          				$q =  $dbc->query($sql);
                          				$acf = $q->fetch_array();
                          				if($acf['countl'] >5) echo "该用户被举报超过5次，请注意"; ?></h4>
                                <p> 
									<a class="btn btn-xs bg-purple btn-flat margin" href="#">备注:</a> 
									<a class="btn btn-xs bg-blue btn-flat margin" ><?php echo $rs['node_server']; ?></a><br>
									<a class="btn btn-xs bg-purple btn-flat margin" href="#">标签:</a> 
                                    <a class="btn btn-xs bg-orange btn-flat margin" href="#"><?php echo $rs['node_status']; ?></a><br>
									<a class="btn btn-xs bg-purple btn-flat margin" href="#">名字:</a> 
                                    <a class="btn btn-xs bg-green btn-flat margin" href="#"><?php echo $rs['node_method']; ?></a><br>
                                    
                                    <a class="btn btn-xs bg-blue btn-flat margin" target="_blank" href="<?php if($rs['node_info'] ==1 && $rss['node_order'] ==0) echo 'http://www.baidu.com';else echo '#'; ?>">朋友圈</a><br>
                                    <a class="btn btn-xs bg-yellow btn-flat margin"  href="#">是否处于黑名单<!--你仍然可以在列表中看到他，但是他无法再添加你为好友你也无法看他的--></a>
                                    <a class="btn btn-xs bg-yellow btn-flat margin"   href="#"><?php if($rs['node_order']==1)echo "是";else echo "否"; ?></a><br>
									<a class="btn btn-xs bg-purple btn-flat margin" href="node_edit.php?id=<?php echo "$rs[id]" ?>">编辑好友信息</a> 
									<a class="btn btn-xs bg-purple btn-flat margin" href="node_del.php?id=<?php echo "$rs[id]" ?>">删除好友</a> 									
                                </p>
                            </div>
                        <?php $str='';}}?>
                </div>
            </div><!-- /.box -->
        </div>   <!-- /.row -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>