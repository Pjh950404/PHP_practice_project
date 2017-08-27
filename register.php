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
          <span class='glyphiccon glyphicon-info-sign'></span> &nbsp; 회원가입중 오류가 발생하였습니다.
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
    <div class="signin-form container">
        <inpu class="container">
            <form class="form-signin" method="post" id="register-form">
            <h2 class="form-signin-heading">회원가입</h2><hr/>
            <?php
                if (isset($msg)) {
                    echo $msg;
                }
            ?>

            <div class="form-group">
            <label for="username">이름</label> <div id="nameChecker"></div>
            <input type="text" class="form-control" placeholder="이름을 입력하세요" name="username" id="username" required  />
            </div>

            <div class="form-group">
            <label for="email">이메일</label> <div id="emailChecker"></div>
            <input type="email" class="form-control" placeholder="이메일을 입력하세요" name="email" id="email" required  />
            </div>

            <div class="form-group">
            <label for="password">비밀번호</label> <div id="passwordChecker"></div>
            <input type="password" class="form-control" placeholder="비밀번호를 입력하세요" name="password" id="password" required  />
            </div>

            <hr />

            <div class="form-group">
                <button type="submit" class="btn btn-default" name="btn-signup" id="registerBtn" disabled>
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
     
     <script>
        var emailCheck = false;
        var nameCheck = false;
        var passwordCheck = false;

        $(document).ready(function(){

        $('#email').keyup(function(){
            if ( $('#email').val().length > 0) {
                var email = $(this).val();
                // ajax 실행
                $.ajax(
                    {
                        type : 'POST',
                        url : 'userexists.php',
                        data:
                    {
                        email: email
                    },
                    success : function(result) 
                    {
                        console.log(result);
                        if (result == "Ok") 
                        {
                            $("#emailChecker")
                            .css('color', 'green')
                            .removeClass('alert alert-danger')
                            .addClass('alert alert-success')
                            //.toggleclass(alert alert-danger, alert alert-success)
                            .html("사용이 가능한 아이디 입니다.");

                            emailCheck = true;
                            checkFunction();
                        } 
                        else if(result == "Regular")
                        {
                            $("#emailChecker")
                            .css('color', 'green')
                            .removeClass('alert alert-danger')
                            .removeClass('alert alert-success')
                            .addClass('alert alert-danger')
                            //.toggleclass(alert alert-danger, alert alert-success)
                            .html("이메일 형식이 올바르지 않습니다.");

                            emailCheck = false;
                            checkFunction();
                        }
                        else if(result == "NOk")
                        {                        
                            $("#emailChecker")
                            .css('color', 'red')
                            .removeClass('alert alert-success')
                            .addClass('alert alert-danger')
                            //.toggleclass(alert alert-success, alert alert-danger)
                            .html("이미 사용중인 아이디 입니다.");

                            emailCheck = false;
                            checkFunction();
                        }
                        else{
                            $("#emailChecker")
                            .css('color', 'red')
                            .removeClass('alert alert-success')
                            .addClass('alert alert-danger')
                            //.toggleclass(alert alert-success, alert alert-danger)
                            .html("알수없는 에러 입니다. 다시 시도하십시오.");

                            emailCheck = false;
                            checkFunction();
                        }
                    }
                }); // end ajax
            }
        }); // end keyup

        $('#username').keyup(function(){
            var check = /^[가-힣]{2,15}|[a-zA-Z]{2,15}\s[a-zA-Z]{2,15}$/;
            var getName = $('#username').val();

            if(check.test(getName)){
                $("#nameChecker")
                .css('color', 'green')
                .removeClass('alert alert-danger')
                .addClass('alert alert-success')
                .html("사용이 가능한 이름 입니다.");
                
                nameCheck = true;
                checkFunction();
            }

            else{
                $("#nameChecker")
                .css('color', 'red')
                .removeClass('alert alert-success')
                .addClass('alert alert-danger')
                .html("한글과 영문 대소문자만 가능합니다.");
                
                nameCheck = false;
                checkFunction();
            }
        });

        $('#password').keyup(function(){
            var check = /^(?=.*[a-zA-Z])(?=.*[0-9]).{6,16}$/;
            var getPassword = $('#password').val();

            if(check.test(getPassword)){
                $("#passwordChecker")
                .css('color', 'green')
                .removeClass('alert alert-danger')
                .addClass('alert alert-success')
                .html("사용이 가능한 비밀번호 입니다.");

                passwordCheck = true;
                checkFunction();
            }
            else{
                $("#passwordChecker")
                .css('color', 'red')
                .removeClass('alert alert-success')
                .addClass('alert alert-danger')
                .html("비밀번호는 문자, 숫자, 특수문자의 조합으로 입력해주세요.");

                passwordCheck = false;
                checkFunction();
            }
        });
    });

    function checkFunction() {
        if(emailCheck == true && passwordCheck == true && nameCheck == true){
            $("#registerBtn")
            .attr("disabled", false);
        }

        else{
            $("#registerBtn")
            .attr("disabled", true);
        } 
    }
     </script>
  </body>
</html>