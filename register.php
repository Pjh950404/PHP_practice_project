<?php
    require_once 'dbconnect.php';

    if(isset($_POST['btn-signup'])) {

     $uname = strip_tags($_POST['username']);
     $email = strip_tags($_POST['email']);
     $upass = strip_tags($_POST['password']);

     $uname = $db->real_escape_string($uname);
     $email = $db->real_escape_string($email);
     $upass = $db->real_escape_string($upass);

     $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version

     $check_email = $db->query("SELECT email FROM tbl_users WHERE email='$email'");
     $count=$check_email->num_rows;

     if ($count==0) {

      $query = "INSERT INTO tbl_users(username,email,password) VALUES('$uname','$email','$hashed_password')";

      if ($db->query($query)) {
       $msg = "<div class='alert alert-success'>
          <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 회원가입이 성공적으로 되었습니다. 잠시후 홈화면으로 이동됩니다.
         </div>";

         header( "refresh:5; url=index.php" );
      }else {
       $msg = "<div class='alert alert-danger'>
          <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 회원가입중 오류가 발생하였습니다.
         </div>";
      }

     } else {


      $msg = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 중복된 이메일이 이미 있습니다.
        </div>";
     }

     $db->close();
    }
    ?>
 <!DOCTYPE html>
 <html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Leemy - 회원가입</title>

    <!-- Bootstrap -->
    <link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->

    <!-- W3 CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <?php
      include("header.php");
    ?>
    <div class="signin-form">
        <div class="container">
            <form class="form-signin" method="post" id="register-form">
            <h2 class="form-signin-heading">회원가입</h2><hr/>
            <?php
                if (isset($msg)) {
                    echo $msg;
                }
            ?>

            <div class="form-group">
            <label for="username">이름</label>
            <input type="text" class="form-control" placeholder="이름을 입력하세요" name="username" required  />
            </div>

            <div class="form-group">
            <label for="email">이메일</label>
            <input type="email" class="form-control" placeholder="이메일을 입력하세요" name="email" required  />
            <span id="check-e"></span>
            </div>

            <div class="form-group">
            <label for="password">비밀번호</label>
            <input type="password" class="form-control" placeholder="비밀번호를 입력하세요" name="password" required  />
            </div>

          <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-signup">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; 회원가입
                </button>
                <a href="index.php" class="btn btn-default" style="float:right;">홈화면으로</a>
            </div>
          </form>
        </div>
    </div>
    <?php
        include 'footer.php';
     ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="stylesheet/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
