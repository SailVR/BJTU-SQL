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
        <!-- START PROGRESS BARS -->
        <div class="row">
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-th-list"></i>
                        <h3 class="box-title">好友</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-warning">
                            <h4>注意!</h4>
                            <p></p>
                        </div><?php
						$abc=$_COOKIE['user_name'];
                        $sql ="SELECT * FROM `ss_node` WHERE `node_type` = '0' AND `node_name` ='$abc' ORDER BY node_order ";//node_type = 0 表示双方都是好友。=1表示请求添加为好友
                        $query =  $dbc->query($sql);
                        while ( $rs = $query->fetch_array()){  
                        $abcd=$rs['node_method'];
                        $sql ="SELECT * FROM `ss_node` WHERE `node_method` = '$abc' AND `node_name` ='$abcd'";
                        $queryy =  $dbc->query($sql);
                        $rss = $queryy->fetch_array()           
                        ?>
                            <div class="callout callout-info">
                                <h4><?php echo $rs['node_method'];
                                  ?></h4>
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
									<a class="btn btn-xs bg-purple btn-flat margin" href="node_del.php?id=<?php echo "$rs[id]" ?>">删除</a>
                                    <a class="btn btn-xs bg-purple btn-flat margin" href="node_complaint.php?id=<?php echo "$rs[id]" ?>">投诉</a> 
                                </p>
                            </div>
                        <?php }?>
                    </div><!-- /.box-body -->


                </div><!-- /.box -->
            </div><!-- /.col (left) -->

            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box-header">
                        <i class="fa fa-code"></i>
                        <h3 class="box-title">请求添加好友</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="callout callout-warning">
                            <h4>注意!</h4>
                            <p></p>
                        </div><?php
						$abc=$_COOKIE['user_name'];
                        $sql ="SELECT * FROM `ss_node` WHERE `node_type` = '1' AND `node_name` = '$abc' ORDER BY node_order ";
                        $query =  $dbc->query($sql);
                        while ( $rs = $query->fetch_array()){
                            ?>
                            <div class="callout callout-info">
                                <h4><?php echo $rs['node_method']; ?></h4>
                                <p> 
									<a class="btn btn-xs bg-purple btn-flat margin" href="#">名字:</a> 
                                    <a class="btn btn-xs bg-green btn-flat margin" href="#"><?php echo $rs['node_method']; ?></a>
                                    <a class="btn btn-xs bg-yellow btn-flat margin" target="_blank"  href="node111.php?id=<?php echo "$rs[id]" ?>">同意</a>
									<a class="btn btn-xs bg-purple btn-flat margin" href="node_del.php?id=<?php echo "$rs[id]" ?>">拒绝</a> 
                                </p>
                            </div>
                        <?php }?>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col (right) -->
             
        </div><!-- /.row -->
        <!-- END PROGRESS BARS -->
    </section><!-- /.content -->
</aside><!-- /.right-side -->
<?php include_once 'lib/footer.inc.php'; ?>
</body>
</html>
