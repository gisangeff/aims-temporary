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

      <li class="treeview">
        <a href="#">
          <i class="fa fa-list"></i> <span>Records</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="../athlete/athlete.php"><i class="fa fa-child"></i>Athlete</a></li>
          <li><a href="../athlete/coach.php"><i class="fa fa-male"></i>Coach</a></li>
          <li><a href="../athlete/course.php"><i class="fa fa-road"></i>Course</a></li>
          <li><a href="../athlete/department.php"><i class="fa fa-briefcase"></i>Department</a></li>
        </ul>
      </li>
      <li>
        <a href="../athlete/sport.php">
          <i class="fa fa-soccer-ball-o"></i>
          <span>Sports</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>