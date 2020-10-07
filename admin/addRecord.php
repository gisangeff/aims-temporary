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
$setID = 0;
date_default_timezone_set('Asia/Manila');

if(isset($_POST['addDepartment'])) {
  $setID = $function->setID("SELECT MAX(dept_code) FROM department");
  $dept_name = $_POST['dept-name'];
  $dept_description = $_POST['dept-description'];
  $dept_status = 'Active';

  $fields = [
    'dept_code'=>$setID,
    'dept_title'=>$dept_name,
    'dept_description'=>$dept_description,
    'dept_status'=>$dept_status
  ];
  $function->insert($fields, 'department');

} elseif (isset($_POST['addCourse'])) {
  $setID = $function->setID("SELECT MAX(course_id) FROM course");
  $course_name = $_POST['course-name'];
  $course_description = $_POST['course-description'];
  $course_dept_code = $_POST['course-dept-code'];
  $course_status = 'Active';

  $fields = [
    'course_id'=>$setID,
    'course_title'=>$course_name,
    'course_description'=>$course_description,
    'dept_code'=>$course_dept_code,
    'course_status'=>$course_status
  ];
  
  $function->insert($fields, 'course');

} elseif (isset($_POST['addSports'])) {
  $setID = $function->setID("SELECT MAX(sport_id) FROM sport");
  $sport_name = $_POST['sports-name'];
  $coach = $_POST['sports-coach-id'];
  $sport_status = 'Active';

  $fields = [
    'sport_id'=>$setID,
    'sport_title'=>$sport_name,
    'coach_id'=>$coach,
    'sport_status'=>$sport_status
  ];
  $function->insert($fields, 'sport');

  //add coach history
  $setCH_ID = $function->setID("SELECT MAX(coachhistory_id) FROM coachhistory");
  $fields = ['coachhistory_id'=>$setCH_ID, 'coach_id'=>$coach, 'sport_id'=>$setID, 'date_coached'=>date("F j, Y, g:i A"), 'date_resigned'=> '', 'coachhistory_status'=>"Active"];
  $function->insert($fields, 'coachhistory');

} elseif (isset($_POST['addUser'])) {
  $setID = $function->setID("SELECT MAX(user_id) FROM user");
  $user_firstname = $_POST['user-firstname'];
  $user_middlename = $_POST['user-middlename'];
  $user_lastname = $_POST['user-lastname'];
  $user_gender =  $_POST['user-gender'];
  $user_birthdate =  $_POST['user-birthdate'];
  $user_address =  $_POST['user-address'];
  $user_username =  $_POST['user-username'];
  $user_password =  $_POST['user-password'];
  $user_date_added = date("F j, Y, g:i A");
  $user_status =  'Active';


  $fields = [
    'user_id'=>$setID,
    'user_firstname'=>$user_firstname,
    'user_middlename'=>$user_middlename,
    'user_lastname'=>$user_lastname,
    'user_gender'=>$user_gender,
    'user_birthdate'=>$user_birthdate,
    'user_address'=>$user_address,
    'user_username'=>$user_username,
    'user_password'=>$user_password,
    'date_added'=>$user_date_added,
    'user_status'=>$user_status
  ];

  $function->insert($fields, 'user');

} elseif (isset($_POST['addCoach'])) {
  $setID = $function->setID("SELECT MAX(coach_id) FROM coach");
  $coach_firstname = $_POST['coach-firstname'];
  $coach_middlename = $_POST['coach-middlename'];
  $coach_lastname = $_POST['coach-lastname'];
  $coach_gender = $_POST['coach-gender'];
  $coach_birthdate = $_POST['coach-birthdate'];
  $coach_address = $_POST['coach-address'];
  $coach_date_added = date("F j, Y, g:i A");
  $coach_status = 'Active';
  $coach_user_id = $_SESSION['user']['user_id'];

  $fields = [
    'coach_id'=>$setID,
    'coach_firstname'=>$coach_firstname,
    'coach_middlename'=>$coach_middlename,
    'coach_lastname'=>$coach_lastname,
    'coach_gender'=>$coach_gender,
    'coach_birthdate'=>$coach_birthdate,
    'coach_address'=>$coach_address,
    'date_added'=>$coach_date_added,
    'coach_status'=>$coach_status,
    'user_id'=>$coach_user_id
  ];

  $function->insert($fields, 'coach');

} elseif (isset($_POST['addAthlete'])) {
  $setID = $function->setID("SELECT MAX(athlete_id) FROM athlete");
  $athlete_firstname = $_POST['athlete-firstname'];
  $athlete_middlename = $_POST['athlete-middlename'];
  $athlete_lastname = $_POST['athlete-lastname'];
  $athlete_gender =  $_POST['athlete-gender'];
  $athlete_birthdate =  $_POST['athlete-birthdate'];
  $athlete_address =  $_POST['athlete-address'];
  $athlete_sports_id =  $_POST['athlete-sports-id'];
  $athlete_course_id =  $_POST['athlete-course-id'];
  $athlete_yearlevel =  $_POST['athlete-yearlevel'];
  $athlete_bloodtype =  $_POST['athlete-bloodtype'];
  $athlete_username =  $_POST['athlete-username'];
  $athlete_password =  $_POST['athlete-password'];
  $athlete_date_added = date("F j, Y, g:i A");
  $athlete_status =  'Active';
  $athlete_user_id = $_SESSION['user']['user_id'];

  $fields = [
    'athlete_id'=>$setID,
    'athlete_firstname'=>$athlete_firstname,
    'athlete_middlename'=>$athlete_middlename,
    'athlete_lastname'=>$athlete_lastname,
    'athlete_gender'=>$athlete_gender,
    'athlete_birthdate'=>$athlete_birthdate,
    'athlete_address'=>$athlete_address,
    'sport_id'=>$athlete_sports_id,
    'course_id'=>$athlete_course_id,
    'athlete_yearlevel'=>$athlete_yearlevel,
    'athlete_bloodtype'=>$athlete_bloodtype,
    'athlete_username'=>$athlete_username,
    'athlete_password'=>$athlete_password,
    'date_added'=>$athlete_date_added,
    'athlete_status'=>$athlete_status,
    'user_id'=>$athlete_user_id
  ];

  $function->insert($fields, 'athlete');

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
          <li class="active">
            <a href="addRecord.php">
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
          Add Records
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
          <li class="active">Add Records</li>

        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">

          <!-- /.col -->
          <div class="col-md-12">
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active">
                  <a href="#athlete" data-toggle="tab">Athlete</a>
                </li>
                <li>
                  <a href="#coach" data-toggle="tab">Coach</a>
                </li>
                <li>
                  <a href="#user" data-toggle="tab">User</a>
                </li>
                <li>
                  <a href="#others" data-toggle="tab">Sports | Course | Department</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="active tab-pane" id="athlete">
                  <form class="form-horizontal" method="post">

                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-11">
                        <h3 class="title">Athlete Information</h3>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">First Name</label>
                        <input type="text" name="athlete-firstname" class="form-control" placeholder="First Name">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Middle Name</label>
                        <input type="text" name="athlete-middlename" class="form-control" placeholder="Middle Name">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="athlete-lastname" class="form-control" placeholder="Last Name">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="athlete-birthdate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                      </div>
                      <div class="col-sm-2">
                        <label class="control-label">Gender</label>
                        <select name="athlete-gender" class="form-control" style="width: 100%;">
                          <option selected="selected">Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <label class="control-label">Year Level</label>
                        <select name="athlete-yearlevel" class="form-control select2" style="width: 100%;">
                          <option selected="selected">1st Year College</option>
                          <option>2nd Year College</option>
                          <option>3rd Year College</option>
                          <option>4th Year College</option>
                          <option>5th Year College</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <label class="control-label">Blood Type</label>
                        <select name="athlete-bloodtype" class="form-control select2" style="width: 100%;">
                          <option selected="selected">A</option>
                          <option>B</option>
                          <option>AB</option>
                          <option>O</option>
                          <option>A+</option>
                          <option>A-</option>
                          <option>B+</option>
                          <option>B-</option>
                          <option>O+</option>
                          <option>O-</option>
                          <option>AB+-</option>
                          <option>AB-</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">Sports</label>
                        <select name="athlete-sports-id" class="form-control select2" style="width: 100%;">
                          <?php
                          $query = "SELECT* FROM sport";
                          $rows = $function->selectAll($query);
                          foreach ($rows as $row): ?>
                            <option value="<?php echo $row['sport_id']; ?>"><?php echo $row['sport_title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Username</label>
                        <input type="text" name="athlete-username" class="form-control" placeholder="Username">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Password</label>
                        <input type="password" name="athlete-password" class="form-control" placeholder="Password">
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
                            <option value="<?php echo $row['course_id']; ?>"><?php echo $row['course_title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label">Address</label>
                        <input type="text" name="athlete-address" class="form-control" id="inputAddress" placeholder="Address">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="addAthlete" class="btn btn-danger">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="coach">
                  <form class="form-horizontal" method="post">

                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-11">
                        <h3 class="title">Coach Information</h3>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">First Name</label>
                        <input type="text" name="coach-firstname" class="form-control" placeholder="First Name">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Middle Name</label>
                        <input type="text" name="coach-middlename" class="form-control" placeholder="Middle Name">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="coach-lastname" class="form-control" placeholder="Last Name">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-2">
                        <label class="control-label">Gender</label>
                        <select class="form-control" name="coach-gender" style="width: 100%;">
                          <option selected="selected">Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="coach-birthdate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                      </div>
                      <div class="col-sm-5">
                        <label class="control-label">Address</label>
                        <input type="text" name="coach-address" class="form-control" id="inputAddress" placeholder="Address">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="addCoach" class="btn btn-danger">Save</button>
                      </div>
                    </div>

                  </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="user">
                  <form class="form-horizontal" method="post">

                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-11">
                        <h3 class="title">User Information</h3>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">First Name</label>
                        <input type="text" name="user-firstname" class="form-control" placeholder="First Name">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Middle Name</label>
                        <input type="text" name="user-middlename" class="form-control" placeholder="Middle Name">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Last Name</label>
                        <input type="text" name="user-lastname" class="form-control" placeholder="Last Name">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">Date of Birth</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" name="user-birthdate" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Username</label>
                        <input type="text" name="user-username" class="form-control" placeholder="Username">
                      </div>
                      <div class="col-sm-3">
                        <label class="control-label">Password</label>
                        <input type="password" name="user-password" class="form-control" placeholder="Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-3">
                        <label class="control-label">Gender</label>
                        <select class="form-control" name="user-gender" style="width: 100%;">
                          <option selected="selected">Male</option>
                          <option>Female</option>
                        </select>
                      </div>
                      <div class="col-sm-6">
                        <label class="control-label">Address</label>
                        <input type="text" name="user-address" class="form-control" id="inputAddress" placeholder="Address">
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="addUser" class="btn btn-danger">Save</button>
                      </div>
                    </div>

                  </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="others">
                  <div class="box box-info box-solid">
                    <div class="box-header with-border">
                      <h3 class="box-title">Sports</h3>
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                      <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <form class="form-horizontal" method="post">
                        <div class="form-group">
                          <div class="col-sm-offset-1 col-sm-11">
                            <h3 class="title">Sports Information</h3>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-8">
                            <label class="control-label">Sports</label>
                            <input type="text" name="sports-name" class="form-control" placeholder="Sports">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-8">
                            <label class="control-label">Coach</label>
                            <select name="sports-coach-id" class="form-control select2" style="width: 100%;">
                             <?php
                             $query = "SELECT * FROM coach";
                             $rows = $function->selectAll($query);
                             foreach ($rows as $row): ?>
                              <option value="<?php echo $row['coach_id']; ?>"><?php  echo $row['coach_firstname'] . ' ' . $row['coach_lastname']; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" name="addSports" class="btn btn-info">Save</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box box-success box-solid">
                  <div class="box-header with-border">
                    <h3 class="box-title">Course</h3>
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <form class="form-horizontal" method="post">
                      <div class="form-group">
                        <div class="col-sm-offset-1 col-sm-11">
                          <h3 class="title">Course Information</h3>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                          <label class="control-label">Course</label>
                          <input type="text" name="course-name" class="form-control" placeholder="Course">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                          <label class="control-label">Description</label>
                          <textarea class="form-control" name="course-description" placeholder="Description"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                         <label class="control-label">Department</label>
                         <select name="course-dept-code" class="form-control select2" style="width: 100%;">
                           <?php
                           $query = "SELECT * FROM department";
                           $rows = $function->selectAll($query);
                           foreach ($rows as $row): ?>
                            <option value="<?php echo $row['dept_code']; ?>"><?php  echo $row['dept_title']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="addCourse" class="btn btn-success">Save</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->

              <div class="box box-danger box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Department</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <div class="col-sm-offset-1 col-sm-11">
                        <h3 class="title">Department Information</h3>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-8">
                        <label class="control-label">Department</label>
                        <input type="text" name="dept-name" class="form-control" placeholder="Department">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-8">
                        <label class="control-label">Description</label>
                        <textarea class="form-control" name="dept-description" placeholder="Description"></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="addDepartment" class="btn btn-danger">Save</button>
                      </div>
                    </div>
                  </form>

                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->


            </div>
            <!-- /.tab-pane -->

          </div>
          <!-- /.tab-content -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
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
