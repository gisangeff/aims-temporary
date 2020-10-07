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

$id = $_SESSION['user']['athlete_id'];
$row = $function->getData('athlete_info', 'athlete_id', $id);

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
        <?php include 'layout/sidebar.php'; ?>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>
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
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User Profile
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
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
                <img class="profile-user-img img-responsive img-circle" src="../admin/dist/img/user8-128x128.jpg" alt="User profile picture">
                <h3 class="profile-username text-center"><?php echo $row['athlete_firstname'] . ' ' . $row['athlete_middlename'] . ' ' . $row['athlete_lastname']; ?></h3>
                <p class="text-muted text-center">Athlete</p>
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Username</b> <p class="pull-right"><?php echo $row['athlete_username']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Password</b> <p class="pull-right"><?php echo $row['athlete_password']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Year Level</b> <p class="pull-right"><?php echo $row['athlete_yearlevel']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Sports</b> <p class="pull-right"><?php echo $row['sport_title']; ?></p>
                  </li>
                  <li class="list-group-item">
                    <b>Course</b> <p class="pull-right"><?php echo $row['course_title']; ?></p>
                  </li>
                </ul>
                <a href="editAthlete.php?id=<?php echo $row['athlete_id']; ?>" class="btn btn-danger btn-block"><b>Edit</b></a>
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
                <?php echo $row['athlete_gender']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-calendar margin-r-5"></i> Date of Birth</strong>
              <p class="text-muted">
                <?php echo $row['athlete_birthdate']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-calendar margin-r-5"></i>Blood Type</strong>
              <p class="text-muted">
                <?php echo $row['athlete_bloodtype']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
              <p class="text-muted">
                <?php echo $row['athlete_address']; ?>
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Coach</strong>
              <p class="text-muted">
                <?php echo $row['coach_firstname'] . ' ' . $row['coach_lastname']; ?>
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

      </div>
      <!-- /.row -->
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
