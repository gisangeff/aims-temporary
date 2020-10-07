<?php

function __autoload($class) {
  require_once "../application/$class.php";
}

$function = new functions();
date_default_timezone_set('Asia/Manila');

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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-soccer-ball-o"></i> Sports Development Office
            <small class="pull-right">Date: <?php echo date("F j, Y, g:i A"); ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-12 invoice-col">
          <b>ID:</b> <?php echo $row['coach_id'] ;?><br>
          <b>Name:</b> <?php echo $row['coach_firstname'] . ' ' . $row['coach_middlename']. ' ' . $row['coach_lastname']; ?><br>
          <b>Gender:</b> <?php echo $row['coach_gender'] ;?><br>
          <b>Date of Birth:</b> <?php echo $row['coach_birthdate'] ;?><br>
          <b>Address:</b> <?php echo $row['coach_address'] ;?><br>
          <b>Date Added:</b> <?php echo $row['date_added'] ;?><br>
          <b>Status:</b> <?php echo $row['coach_status'] ;?><br>
          <b>Encoded by:</b> <?php echo $row['user_firstname'] . ' ' . $row['user_lastname'] ;?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <div class="row no-print">
      <div class="col-xs-12">
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
            <i class="fa fa-close"> Close</i>
          </button>
          <a href="printAthlete.php" target="_blank" class="btn btn-primary">
            <i class="fa fa-print"></i> Print</a>
          </div>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- ./wrapper -->
  </body>
  </html>
