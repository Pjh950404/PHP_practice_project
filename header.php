<?php
    include_once 'dbconnect.php';

    include_once("analyticstracking.php");
 ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    
    <!-- W3 CSS -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/index.php">Leemy</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="/page.php">학력사항</a></li>
            <li><a href="/board/index.php">자유게시판</a></li>
            <li><a href="/portfolio.php">포트폴리오</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
             <?php
                if(!isset($_SESSION['userSession'])){
                    echo '<li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> 로그인</a></li>';
                    echo '<li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> 회원가입</a></li>';
                }
                else
                {
                    echo '<li><a href="/memberRead.php"><span class="glyphicon glyphicon-user"></span> 회원정보 보기</a></li>';
                    echo '<li><a href="/memberupdate.php"><span class="glyphicon glyphicon-edit"></span> 회원정보 수정</a></li>';
                    echo '<li><a href="/logout.php?logout"><span class="glyphicon glyphicon-log-out"></span> 로그아웃</a></li>';
                }
             ?>
          </ul>
        </div>
      </div>
    </nav>


</body>
</html>
