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
  $column = $function->getData('coach_info', 'coach_id', $id);

  if (isset($_POST['submit'])) {

    $firstname = $_POST['coach-firstname'];
    $middlename = $_POST['coach-middlename'];
    $lastname = $_POST['coach-lastname'];
    $gender = $_POST['coach-gender'];
    $birthdate = $_POST['coach-birthdate'];
    $address = $_POST['coach-address'];
    $status = $_POST['coach-status'];

    $query = "UPDATE coach SET coach_firstname='".$firstname."', coach_middlename='".$middlename."', coach_lastname='".$lastname."', coach_gender='".$gender."', coach_birthdate='".$birthdate."', coach_address='".$address."', coach_status='".$status."' WHERE coach_id=".$id."";
    $function->update($query);
    header('Location: coach.php');

  }

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

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

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
          <small>Edit Information</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Coach</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row"><br><br>
          <div class="col-md-10 col-md-offset-1">
            <form method="post" class="form-horizontal">
              <div class="box box-danger">
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                  <div class="form-group">
                    <div class="col-sm-offset-1 col-sm-11">
                      <h3 class="title">Coach Information</h3>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                      <label class="control-label">First Name</label>
                      <input type="text" name="coach-firstname" value="<?php echo $column['coach_firstname']; ?>" class="form-control" placeholder="First Name">
                    </div>
                    <div class="col-sm-3">
                      <label class="control-label">Middle Name</label>
                      <input type="text" name="coach-middlename" value="<?php echo $column['coach_middlename']; ?>" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="col-sm-3">
                      <label class="control-label">Last Name</label>
                      <input type="text" name="coach-lastname" value="<?php echo $column['coach_lastname']; ?>" class="form-control" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                      <label class="control-label">Gender</label>
                      <select class="form-control" name="coach-gender" style="width: 100%;">
                        <?php
                        $rows = ["Male", "Female"];
                        for ($i=0; $i < count($rows); $i++){ ?>
                          <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$column['coach_gender']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <label class="control-label">Date of Birth</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="coach-birthdate" value="<?php echo $column['coach_birthdate']; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <label class="control-label">Status</label>
                      <select class="form-control" name="coach-status" style="width: 100%;">
                        <?php
                        $rows = ["active", "Inactive"];
                        for ($i=0; $i < count($rows); $i++){ ?>
                          <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$column['coach_status']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                        <?php }; ?>
                      </select>
                    </div>
                    
                  </div>
                  <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-2">
                      <label class="control-label">Address</label>
                      <input type="text" name="coach-address" value="<?php echo $column['coach_address']; ?>" class="form-control" id="inputAddress" placeholder="Address">
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                 <button type="button" class="btn btn-default" onclick="window.history.back();">Cancel</button>
                 <button type="submit" name="submit" class="btn btn-danger pull-right">Save changes</button>
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
