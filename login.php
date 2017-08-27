<?php
session_start();
require_once 'dbconnect.php';

if (isset($_SESSION['userSession'])!="") {
    header("Location: index.php");

    exit;
}

if (isset($_POST['btn-login'])) {
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $email = $db->real_escape_string($email);
    $password = $db->real_escape_string($password);

    $_SESSION['realPassword'] = $password;

    $query = $db->query("SELECT user_id, username, email, password FROM tbl_users WHERE email='$email'");
    $row=$query->fetch_array();

    $count = $query->num_rows; // if email/password are correct returns must be 1 row

 if (password_verify($password, $row['password']) && $count==1) {
     $_SESSION['userSession'] = $row['user_id'];
     $_SESSION['userSession_name'] = $row['username'];
     $_SESSION['userSession_email'] = $row['email'];

     header("Location: index.php");

 } else {
     $msg = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 이메일 또는 비밀번호가 틀립니다.
    </div>";
 }
    $db->close();
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

  </head>
  <body>
      <?php
        include("header.php");
      ?>
      <br><br>
  <div class="signin-form">
   <div class="container">
         <form class="form-signin" method="post" id="login-form">
          <h2 class="form-signin-heading">로그인</h2><hr />
          <?php
    if (isset($msg)) {
        echo $msg;
    }
    ?>
          <div class="form-group">
          <label for="email">이메일</label> 
          <input type="email" class="form-control" placeholder="Email address" id="email" name="email" required />
          
         <br>
          
          <label for="username">패스워드</label>
          <input type="password" class="form-control" placeholder="Password" name="password" required />

        
        <!--
          <label for="checkbox" class="checkbox"></label>
          <input type="checkbox" value="remember-me"> 로그인정보저장
        -->

          </div>

        <hr />
        
          <div class="form-group">
              <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; 로그인 </button>
              <a href="register.php" class="btn btn-default" style="float:right;">회원가입</a>
          </div>
        </form>
      </div>
  </div>

  <?php
    include("footer.php");
  ?>
<script>

    function loginToastFunction()
    {
        var x = document.getElmentById("snackbar")
        x.className = "show";
        setTimeout(function(){x.className = x.className.replace("show", "");}, 3000);
    }

  </script>

  </body>
  </html>