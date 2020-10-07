<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <?php include 'sidebar-userPanel.php'; ?>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="active">
        <a href="index.php">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="../admin/addRecord.php">
          <i class="fa fa-file-text"></i>
          <span>Add Records</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-list"></i> <span>Records</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../admin/athlete.php"><i class="fa fa-child"></i>Athlete</a></li>
          <li><a href="../admin/coach.php"><i class="fa fa-male"></i>Coach</a></li>
          <li><a href="../admin/user.php"><i class="fa fa-user"></i>User</a></li>
          <li><a href="../admin/course.php"><i class="fa fa-road"></i>Course</a></li>
          <li><a href="../admin/department.php"><i class="fa fa-briefcase"></i>Department</a></li>
        </ul>
      </li>
      <li>
        <a href="../admin/sport.php">
          <i class="fa fa-soccer-ball-o"></i>
          <span>Sports</span>
        </a>
      </li>
      <li>
        <a href="../admin/history.php">
          <i class="fa fa-history"></i>
          <span>History</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>