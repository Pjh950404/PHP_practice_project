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
    <title>Leemy - 회원가입</title>
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
  </body>
</html>
