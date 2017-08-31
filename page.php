<?php
    session_start();
    include_once 'dbconnect.php';
 ?>
<!DOCTYPE html>
<html>
<head>
  <title>leemy.me - 포트폴리오 페이지</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
    include ("header.php");
  ?>
 <div class="container">
  <div class="w3-twothird w3-panel w3-padding-48">
      <div class="w3-container w3-card-2 w3-white">
        <div class="w3-display-container ">
                <br>
  <img src="/images/13446464.jpg" style="width:20%" alt="Avatar">
  <div class="w3-display-bottomleft w3-container w3-text-black">
  </div>
</div>
    <br>
<p><i class="fa fa-address-book-o fa-fw w3-margin-right w3-large w3-text-teal"></i>이민영</p>
<p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i>개발자 지망생</p>
 <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>경기도 안산시</p>
 <p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>m_yg@naver.com</p>
 <p><i class="fa fa-github fa-fw w3-margin-right w3-large w3-text-teal"></i>https://github.com/GAESALGU</p>

        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>학력사항</h2>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>동양미래대학</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2011 - 2016</h6>
          <p>소프트웨어정보과(3년) 졸업</p>
          <hr>
        </div>
        <div class="w3-container">
          <h5 class="w3-opacity"><b>시화공업고등학교</b></h5>
          <h6 class="w3-text-teal"><i class="fa fa-calendar fa-fw w3-margin-right"></i>2009 - 2011</h6>
          <p>컴퓨터응용기계과 졸업</p>
          <hr>
        </div>
      </div>


    </div>
</div>

<?php
    include 'footer.php';
 ?>
</body>

</html>
