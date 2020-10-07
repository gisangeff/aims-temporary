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
  $column = $function->getData('athlete_info', 'athlete_id', $id);

  if (isset($_POST['submit'])) {

    $firstname = $_POST['athlete-firstname'];
    $middlename = $_POST['athlete-middlename'];
    $lastname = $_POST['athlete-lastname'];
    $gender = $_POST['athlete-gender'];
    $birthdate = $_POST['athlete-birthdate'];
    $address = $_POST['athlete-address'];
    $sport_id = $_POST['athlete-sports-id'];
    $course_id = $_POST['athlete-course-id'];
    $athlete_yearlevel = $_POST['athlete-yearlevel'];
    $athlete_bloodtype = $_POST['athlete-bloodtype'];
    $athlete_username = $_POST['athlete-username'];
    $athlete_password = $_POST['athlete-password'];
    $status = $_POST['athlete-status'];

    $query = "UPDATE athlete SET athlete_firstname='".$firstname."', athlete_middlename='".$middlename."', athlete_lastname='".$lastname."', athlete_gender='".$gender."', athlete_birthdate='".$birthdate."', athlete_address='".$address."', sport_id=".$sport_id.", course_id=".$course_id.", athlete_yearlevel='".$athlete_yearlevel."', athlete_bloodtype='".$athlete_bloodtype."', athlete_username='".$athlete_username."', athlete_password='".$athlete_password."' WHERE athlete_id=".$id."";
    $function->update($query);
    header('Location: userProfile.php');

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
  <link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../admin/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">
   <!-- jvectormap -->
   <link rel="stylesheet" href="../admin/bower_components/jvectormap/jquery-jvectormap.css">
   <!-- Date Picker -->
   <link rel="stylesheet" href="../admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

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
        <?php include 'layout/sidebar.php'; ?>
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
              <li class="active"><a href="../admin/athlete.php"><i class="fa fa-child"></i>Athlete</a></li>
              <li><a href="../admin/coach.php"><i class="fa fa-male"></i>Coach</a></li>
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
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Athlete
          <small>Edit Information</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Athlete</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="row"><br>
          <div class="col-md-10 col-md-offset-1">
            <form method="post" class="form-horizontal">
              <div class="box box-danger">
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                 <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-11">
                    <h3 class="title">Athlete Information</h3>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-3">
                    <label class="control-label">First Name</label>
                    <input type="text" name="athlete-firstname" value="<?php echo $column['athlete_firstname']; ?>" class="form-control" placeholder="First Name">
                  </div>
                  <div class="col-sm-3">
                    <label class="control-label">Middle Name</label>
                    <input type="text" name="athlete-middlename" value="<?php echo $column['athlete_middlename']; ?>" class="form-control" placeholder="Middle Name">
                  </div>
                  <div class="col-sm-3">
                    <label class="control-label">Last Name</label>
                    <input type="text" name="athlete-lastname" value="<?php echo $column['athlete_lastname']; ?>" class="form-control" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                 <div class="col-sm-offset-2 col-sm-2">
                  <label class="control-label">Gender</label>
                  <select name="athlete-gender" class="form-control" style="width: 100%;">
                    <?php
                    $rows = ["Male", "Female"];
                    for ($i=0; $i < count($rows); $i++){ ?>
                      <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$column['athlete_gender']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                    <?php }; ?>
                  </select>
                </div>
                <div class="col-sm-2">
                  <label class="control-label">Date of Birth</label>
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" name="athlete-birthdate" value="<?php echo $column['athlete_birthdate']; ?>" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                  </div>
                </div>
                <div class="col-sm-2">
                  <label class="control-label">Blood Type</label>
                  <select name="athlete-bloodtype" class="form-control select2" style="width: 100%;">
                    <?php
                    $rows = ['A', 'B', 'AB', 'O', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                    for ($i=0; $i < count($rows); $i++){ ?>
                      <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$column['athlete_bloodtype']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                    <?php }; ?>
                  </select>
                </div>
                <div class="col-sm-3">
                  <label class="control-label">Year Level</label>
                  <select name="athlete-yearlevel" class="form-control select2" style="width: 100%;">
                    <?php
                    $rows = ["1st Year College", "2nd Year College", "3rd Year College", "4th Year College", "5th Year College"];
                    for ($i=0; $i < count($rows); $i++){ ?>
                      <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$column['athlete_yearlevel']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                    <?php }; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-3">
                  <label class="control-label">Course</label>
                  <select name="athlete-course-id" class="form-control select2" style="width: 100%;">
                   <?php
                   $query = "SELECT * FROM course";
                   $rows = $function->selectAll($query);
                   foreach ($rows as $row): ?>
                    <option value="<?php echo $row['course_id']; ?>" <?php if($row['course_id']==$column['course_id']) echo 'selected="selected"'; ?> ><?php echo $row['course_title']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-3">
                <label class="control-label">Username</label>
                <input type="text" name="athlete-username" value="<?php echo $column['athlete_username']; ?>" class="form-control" placeholder="Username">
              </div>
              <div class="col-sm-3">
                <label class="control-label">Password</label>
                <input type="text" name="athlete-password" value="<?php echo $column['athlete_password']; ?>" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-3">
                <label class="control-label">Sports</label>
                <select name="athlete-sports-id" class="form-control select2" style="width: 100%;">
                 <?php
                 $query = "SELECT * FROM sport";
                 $rows = $function->selectAll($query);
                 foreach ($rows as $row): ?>
                  <option value="<?php echo $row['sport_id']; ?>" <?php if($row['sport_id']==$column['sport_id']) echo 'selected="selected"'; ?> ><?php echo $row['sport_title']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-sm-6">
              <label class="control-label">Address</label>
              <input type="text" name="athlete-address" value="<?php echo $column['athlete_address']; ?>" class="form-control" id="inputAddress" placeholder="Address">
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
<?php include 'layout/footer.php'; ?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../admin/bower_components/moment/min/moment.min.js"></script>
<script src="../admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="../admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../admin/plugins/iCheck/icheck.min.js"></script>
<!-- FastClick -->
<script src="../admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../admin/dist/js/adminlte.min.js"></script>
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
