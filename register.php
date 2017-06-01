<?php
  session_start();

  if(isset($_SESSION['id'])){
    header("Location: index.php");
  }

  require_once 'dbconnect.php';

  if(isset($_POST['signup'])){
    $uname = strip_tags($_POST['name']);
    $email = strip_tags($_POST['email']]);
    $upass = strip_tags($_POST['password']);

    $uname = $conn->real_escape_string($uname);
    $email = $conn->real_escape_string($email);
    $upass = $conn->real_escape_string($upass);

    $hashed_password = password_hash($upass, PASSWORD_DEFAULT);

    $check_email=$conn->query("SELECT email FROM tbl_users WHERE email='$email'");
    $count=$check_email->num_rows;

     if ($count==0) {
       $query = "INSERT INTO tbl_users(username, email, password) VALUES('$uname, $email, $hashed_password')"

       if($conn->query($query)){
         $msg = "<div class='alert alert-success'>
         <span class='glyphicon hlyphicon-info-sign'></span> successfully registered !
         </div>";
       }else{
         $msg = "<div class='alert alert-danger'>
   <span class='glyphicon glyphicon-info-sign'></span>  error while registering !
  </div>";
       }
  }else{
    $msg = "<div class='alert alert-danger'>
   <span class='glyphicon glyphicon-info-sign'></span> sorry email already taken !
  </div>";
  }

  $conn->close();
 ?>
<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
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
      include ("header.php");
    ?>
      <article class="container">
        <div class="page-header">
          <h1>회원가입 <small>Sign up</small></h1>
        </div>
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
              <label for="InputId">아이디</label>
              <input type="text" class="form-control" id="id" placeholder="아이디">
            </div>

            <div class="form-group">
              <label for="InputPassword1">비밀번호</label>
              <input type="password" class="form-control" id="password" placeholder="비밀번호">
            </div>

            <div class="form-group">
              <label for="InputPassword2">비밀번호 확인</label>
              <input type="password" class="form-control" id="password2" placeholder="비밀번호 확인">
              <p class="help-block">비밀번호 확인을 위해 다시 한번 입력 해 주세요</p>
            </div>
            <div class="form-group">
              <label for="username">이름</label>
              <input type="text" class="form-control" id="name" placeholder="이름을 입력해 주세요">
            </div>

			<div class="form-group">
              <label for="InputEmail">전화 번호</label>
              <input type="text" class="form-control" id="phone" placeholder="전화 번호를 입력해 주세요">
            </div>

            <div class="form-group">
              <label for="InputEmail">이메일 주소</label>
              <input type="email" class="form-control" id="email" placeholder="이메일 주소를 입력해 주세요">
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-info" name="signup">회원가입 하기 <i class="fa fa-check spaceLeft"></i></button>
              <button type="submit" class="btn btn-warning">가입취소 <i class="fa fa-times spaceLeft"></i></button>
            </div>
        </div>

      </article>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="stylesheet/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
