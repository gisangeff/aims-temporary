<?php
require '../application/config/constant.php';
session_start();

if (!isset($_SESSION['is_logged_in'])) {
  header('Location: ' . BASE_URL);
}

function __autoload($class) {
  require_once "../application/$class.php";
}

$function = new functions();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AIMS | Athlete</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>
 <body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">
    <?php include 'layout/header.php'; ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php  include 'layout/sidebar.php'; ?>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>Records</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../athlete/athlete.php"><i class="fa fa-child"></i>Athlete</a></li>
              <li><a href="../athlete/coach.php"><i class="fa fa-male"></i>Coach</a></li>
              <li class="active"><a href="../athlete/course.php"><i class="fa fa-road"></i>Course</a></li>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Course
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Course</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Courses</h3>
                <div class="box-tools">
                  <form method="post">
                    <div class="input-group input-group-sm" style="width: 250px;">
                      <input type="text" name="input-search" class="form-control pull-right" placeholder="Search">
                      <div class="input-group-btn">
                        <button type="submit" name="search" class="btn btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Department</th>
                    <th class="text-center">Action</th>
                  </tr>

                  <?php
                  if (isset($_POST['input-search'])) {
                    $input_search = $_POST['input-search'];
                    $query = "SELECT * FROM course_info WHERE course_title LIKE '%" . $input_search . "%' AND course_status='Active'";
                  } else {
                    $query = "SELECT * FROM course_info WHERE course_status='Active'";
                  }

                  $rows = $function->selectAll($query);
                  foreach ($rows as $row): ?>
                    <tr>
                      <td><?php echo $row['course_id']; ?></td>
                      <td><?php echo $row['course_title']; ?></td>
                      <td><?php echo $row['course_description']; ?></td>
                      <td><?php echo $row['dept_title']; ?></td>
                      <td class="text-center">
                       <button class="btn btn-info btn-xs" disabled=""><i class="fa fa-pencil fa-fw"></i></button>
                       <button class="btn btn-success btn-xs" disabled=""><i class="fa fa-pencil fa-fw"></i></button>
                       <button class="btn btn-danger btn-xs" disabled=""><i class="fa fa-trash fa-fw"></i></button>  
                     </td>
                   </tr>
                 <?php endforeach; ?>
               </table>
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
       </div>
     </section>
     <!-- /.content -->
   </div>
   <?php include 'layout/footer.php'; ?>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="../admin/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
</body>
</html>
