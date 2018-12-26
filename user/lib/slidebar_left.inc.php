<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo get_gravatar($user_email);?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>欢迎, <?php echo $_COOKIE[user_name];?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> 在线</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li >
                    <a href="node.php">
                        <i class="fa fa-sitemap"></i> <span>好友列表</span>
                    </a>
                </li>

                <li >
                    <a href="node_add.php">
                        <i class="fa fa-plus"></i> <span>添加好友</span>
                    </a>
                </li>
              	<li >
                    <a href="node_search.php">
                        <i class="fa fa-search"></i> <span>查询好友</span>
                    </a>
                </li>
              <li >
                    <a href="node_complaint.php">
                        <i class="fa fa-exclamation"></i> <span>投诉好友</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
