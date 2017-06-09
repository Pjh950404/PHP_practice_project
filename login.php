<?php
require_once 'dbconnect.php';



if (isset($_POST['btn-login'])) {

 $email = strip_tags($_POST['email']);
 $password = strip_tags($_POST['password']);

 $email = $DBcon->real_escape_string($email);
 $password = $DBcon->real_escape_string($password);

 $query = $DBcon->query("SELECT user_id, email, password FROM tbl_users WHERE email='$email'");
 $row=$query->fetch_array();

 $count = $query->num_rows; // if email/password are correct returns must be 1 row

 if (password_verify($password, $row['password']) && $count==1) {
  $_SESSION['userSession'] = $row['user_id'];
  header("Location: index.php");
 } else {
  $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
    </div>";
 }
 $DBcon->close();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>leemy - 로그인 화면</title>

    <!-- Bootstrap -->
    <link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- W3 CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></scri.row>.containerpt>
    <![endif]-->
  </head>
  <body>
      <?php
        include ("header.php");
      ?>

  <div class="signin-form">

   <div class="container">


         <form class="form-signin" method="post" id="login-form">

          <h2 class="form-signin-heading">로그인</h2><hr />

          <?php
    if(isset($msg)){
     echo $msg;
    }
    ?>

          <div class="form-group">
          <input type="email" class="form-control" placeholder="Email address" name="email" required />
          <span id="check-e"></span>
          </div>

          <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password" required />
          </div>

        <hr />

          <div class="form-group">
              <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
        <span class="glyphicon glyphicon-log-in"></span> &nbsp; 로그인
     </button>
              <a href="register.php" class="btn btn-default" style="float:right;">회원가입</a>
          </div>
        </form>
      </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="stylesheet/bootstrap/js/bootstrap.min.js"></script>
  </body>
  </html>
