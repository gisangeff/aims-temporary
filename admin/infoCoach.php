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

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $row = $function->getData('coach_info', 'coach_id', $id);

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AIMS | Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
   <!-- Morris chart -->
   <link rel="stylesheet" href="bower_components/morris.js/morris.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap wysihtml5 - text editor -->
   <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

   <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 </head>
 <body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">

    <?php include 'pages/layout/header.php'; ?>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <?php include 'pages/layout/sidebar-userPanel.php'; ?>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
          <li>
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
          <li class="active treeview">
            <a href="#">
              <i class="fa fa-list"></i> <span>Records</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../admin/athlete.php"><i class="fa fa-child"></i>Athlete</a></li>
              <li class="active"><a href="../admin/coach.php"><i class="fa fa-male"></i>Coach</a></li>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Coach
          <small>Coach Information</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Coach</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row"><br>
          <div class="col-md-8 col-md-offset-2">
            <form method="post" class="form-horizontal">
              <div class="box box-danger">
                <div class="box-header with-border">
                  <i class="fa fa-info"></i>
                  <h3 class="box-title">Coach Information</h3>
                </div>
                <div class="box-body">
                  <dl class="dl-horizontal">
                   <dt>ID:</dt>
                   <dd><?php echo $row['coach_id']; ?></dd>
                   <dt>Name:</dt>
                   <dd><?php echo $row['coach_firstname'] . ' ' . $row['coach_middlename'] . ' ' . $row['coach_lastname']; ?></dd>
                   <dt>Gender:</dt>
                   <dd><?php echo $row['coach_gender']; ?></dd>
                   <dt>Date of Birth:</dt>
                   <dd><?php echo $row['coach_birthdate']; ?></dd>
                   <dt>Address:</dt>
                   <dd><?php echo $row['coach_address']; ?></dd>
                   <dt>Date Registered:</dt>
                   <dd><?php echo $row['date_added']; ?></dd>
                   <dt>Status:</dt>
                   <dd><?php echo $row['coach_status']; ?></dd>
                   <dt>Encoded by:</dt>
                   <dd><?php echo $row['user_firstname'] . ' ' . $row['user_lastname']; ?></dd>
                 </dl>
               </div>
               <!-- /.box-body -->

               <div class="box-footer">
                 <button type="button" class="btn btn-default" onclick="window.history.back();">Back</button>
                 <button type="submit" name="submit" class="btn btn-danger pull-right" formaction="printCoach.php?id=<?php echo $row['coach_id']; ?>" formtarget="_blank">Print</button>
               </div>
             </div>
             <!-- /.box -->
           </form>
         </div>
       </div>
       <!-- /.row -->
     </section>
     <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->

   <?php include 'pages/layout/footer.php'; ?>

 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- Select2 -->
 <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
 <!-- InputMask -->
 <script src="plugins/input-mask/jquery.inputmask.js"></script>
 <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
 <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
 <!-- date-range-picker -->
 <script src="bower_components/moment/min/moment.min.js"></script>
 <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
 <!-- bootstrap datepicker -->
 <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <!-- bootstrap color picker -->
 <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
 <!-- bootstrap time picker -->
 <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
 <!-- SlimScroll -->
 <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- iCheck 1.0.1 -->
 <script src="plugins/iCheck/icheck.min.js"></script>
 <!-- FastClick -->
 <script src="bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="dist/js/demo.js"></script>
 <!-- Page script -->
 <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()
  })
</script>

</body>
</html>
