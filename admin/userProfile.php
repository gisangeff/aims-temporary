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

$id = $_SESSION['user']['user_id'];
$row = $function->getData('user', 'user_id', $id);

if (isset($_POST['submit'])) {

  $firstname = $_POST['firstname'];
  $middlename = $_POST['middlename'];
  $lastname = $_POST['lastname'];
  $gender = $_POST['gender'];
  $birthdate = $_POST['birthdate'];
  $address = $_POST['address'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $status = $_POST['status'];

  $query = "UPDATE user SET user_firstname='".$firstname."', user_middlename='".$middlename."', user_lastname='".$lastname."', user_gender='".$gender."', user_birthdate='".$birthdate."', user_address='".$address."', user_status='".$status."', user_username='".$username."', user_password='".$password."' WHERE user_id=".$id."";

  $function->update($query);
  header('Location: userProfile.php');

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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User Profile
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo BASE_URL; ?>"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">User Profile</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-danger">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="dist/img/user8-128x128.jpg" alt="User profile picture">

                <h3 class="profile-username text-center"><?php echo $row['user_firstname'] . ' ' . $row['user_middlename'] . ' ' . $row['user_lastname']; ?></h3>

                <p class="text-muted text-center">Administrator</p>

                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Username</b> <p class="pull-right"><?php echo $row['user_username']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Password</b> <p class="pull-right"><?php echo $row['user_password']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Status</b> <p class="pull-right"><?php echo $row['user_status']; ?></p>
                  </li>
                </ul>
                <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#modal-default"><b>Edit</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

          </div>
          <!-- /.col -->
          <div class="col-md-9">
           <!-- About Me Box -->
           <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-intersex margin-r-5"></i> Gender</strong>

              <p class="text-muted">
                <?php echo $row['user_gender']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-calendar margin-r-5"></i> Date of Birth</strong>

              <p class="text-muted">
                <?php echo $row['user_birthdate']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted">
                <?php echo $row['user_address']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-calendar-check-o margin-r-5"></i> Date Added</strong>

              <p class="text-muted">
                <?php echo $row['date_added']; ?>
              </p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!-- modal -->
        <div class="modal fade" id="modal-default">
          <div class="modal-dialog modal-lg">
            <form method="post" class="form-horizontal">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Information</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Firstname</label>
                      <div class="col-sm-8">
                        <input type="text" name="firstname" value="<?php echo $row['user_firstname']; ?>" class="form-control input-sm" placeholder="Firstname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Middlename</label>

                      <div class="col-sm-8">
                        <input type="text" name="middlename" value="<?php echo $row['user_middlename']; ?>" class="form-control input-sm" placeholder="Middlename">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Lastname</label>
                      <div class="col-sm-8">
                        <input type="text" name="lastname" value="<?php echo $row['user_lastname']; ?>" class="form-control input-sm" placeholder="Lastname">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Birthdate</label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="birthdate" value="<?php echo $row['user_birthdate']; ?>" class="form-control input-sm" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Gender</label>
                      <div class="col-sm-8">
                        <select name="gender" class="form-control input-sm" style="width: 100%;">
                          <?php
                          $rows = ["Male", "Female"];
                          for ($i=0; $i < count($rows); $i++){ ?>
                            <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$row['user_gender']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                          <?php }; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Username</label>

                      <div class="col-sm-8">
                        <input type="text" name="username" value="<?php echo $row['user_username']; ?>" class="form-control input-sm" placeholder="Username">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Password</label>

                      <div class="col-sm-8">
                        <input type="text" name="password" value="<?php echo $row['user_password']; ?>" class="form-control input-sm" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Address</label>

                      <div class="col-sm-8">
                        <input type="text" name="address" value="<?php echo $row['user_address']; ?>" class="form-control input-sm" placeholder="Address">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-offset-1 col-sm-2 control-label">Status</label>
                      <div class="col-sm-8">
                        <select name="status" class="form-control input-sm" style="width: 100%;">
                          <?php
                          $rows = ["Active", "Inactive"];
                          for ($i=0; $i < count($rows); $i++){ ?>
                            <option value="<?php echo $rows[$i]; ?>" <?php if($rows[$i]==$row['user_status']) echo 'selected="selected"'; ?>><?php echo $rows[$i]; ?></option>
                          <?php }; ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-danger">Save changes</button>
                  </div>
                </div>
                <!-- /.modal-content -->
              </form>

            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->

        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>


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
