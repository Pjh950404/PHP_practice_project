<?php
    session_start();
    require_once 'dbnect.php';
    $Message = '로그인을 다시 해주시기바랍니다.';
    $alert_script;

    if (isset($_SESSION['userSession'])=="") {
        echo "<script> alert('$Message'); </script>";
    }

    if(isset($_POST['btn-signup'])) {
     $uname = strip_tags($_POST['username']);
     $email = strip_tags($_POST['email']);
     $upass = strip_tags($_POST['password']);

     $uname = $db->real_escape_string($uname);
     $email = $db->real_escape_string($email);
     $upass = $db->real_escape_string($upass);

     $hashed_password = password_hash($upass, PASSWORD_DEFAULT); // this function works only in PHP 5.5 or latest version


     if(isset($_SESSION['userSession']))
     {
        $s_user_id = $_SESSION['userSession'];
        $query = "UPDATE tbl_users SET username='$uname', password='$hashed_password' WHERE user_id='$s_user_id'";
        mysqli_query($db, $query);

        $sessionUpdate = $db->query("SELECT user_id, username, email, password FROM tbl_users WHERE user_id='$s_user_id'");
        $row=$sessionUpdate->fetch_array();

        $_SESSION['userSession_name'] = $row['username'];

        $db->close();
        header("Location: index.php");
     }
    }

    if(isset($_POST['btn-remove']))
    {
        $removeSessionId = $_SESSION['userSession'];

        if($_POST['confirm'] !== 1){
            $alert_script = "<script> alert(\'정말 삭제하시겠습니까?\')</script>";
            $error = true;
        }
        else{
            $error = false;
        }
        /*
        if(isset($_SESSION['userSession']))
        {

            $query = "DELETE FROM tbl_users WHERE user_id='$removeSessionId'";
            mysqli_query($db, $query);
            $db->close();

            session_unset();
            unset($_SESSION['userSession']);

            $msg = "<div class='alert alert-success'>
               <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 삭제가 성공적으로 되었습니다.
              </div>";
        }
        else{
            $msg = "<div class='alert alert-danger'>
               <span class='glyphicon glyphicon-info-sign'></span> &nbsp; 잘못된 접근입니다.
              </div>";
        }
        */
        //header("Location: index.php");
    }

    ?>
<!DOCTYPE html>
 <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Leemy - 회원정보수정</title>

    <link rel="stylesheet" type="text/css" href="/stylesheet/style.css">
    <!-- Bootstrap -->
    <link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- font awesome -->

    <!-- W3 CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
    function confirm_delete(){
        var deleteFlag;
        deleteFlag = return confirm('정말 삭제하시겠습니까?');

        if(deleteFlag){

        }
    }
    </script>

  </head>
  <body>
    <?php
      include("header.php");
    ?>
        <fieldset>
            <legend>회원정보수정</legend>
    <div class="signin-form">
        <div class="container">
            <form class="form-signin" method="post" id="register-form">
            <h2 class="form-signin-heading"></h2><hr />
            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>

            <div class="form-group">
            <label for="email">이메일</label>
            <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['userSession_email']; ?>" readonly  />
            <span id="check-e"></span>
            </div>

            <div class="form-group">
            <label for="username">이름</label>
            <input type="text" class="form-control" placeholder="이름을 입력하세요" name="username" value="<?php echo $_SESSION['userSession_name']; ?>" required  />
            </div>

            <div class="form-group">
            <label for="password">비밀번호</label>
            <input type="password" class="form-control" placeholder="비밀번호를 입력하세요" name="password" value="" required  />
            </div>

          <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-signup">
                <span class="glyphicon glyphicon-log-in"></span> &nbsp; 확인
                </button>

                <button type="submit" class="btn btn-default" style="float:right" name="btn-remove" onclick="return confirm_delete();">
                <span class="glyphicon glyphicon-remove"></span> &nbsp; 회원탈퇴
                </button>



            </div>
        </fieldset>
          </form>

        </div>
    </div>

    <button type="submit" class="btn btn-default" name="btn-test" onclick="return confirm_delete();">
    <span class="glyphicon glyphicon-remove"></span> &nbsp; 테스트버튼
    </button>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="stylesheet/bootstrap/js/bootstrap.min.js"></script>


  </body>
</html>
