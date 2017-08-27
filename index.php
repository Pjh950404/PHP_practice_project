<?php
    session_start();
    include_once 'dbconnect.php';
?>

<head>
  <title>  leemy.me -
    <?php
    if(!isset($_SESSION['userSession'])){
        echo "손";
    }

    else{
        echo $_SESSION['userSession_name'];
        
    }

    ?>님 반갑습니다. </title>
    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, inital-scale=1">

</head>

<body>
  <?php
    include ("header.php");
  ?>
  <!-- 메인 사진 부분 -->
  <div class="jumbotron">
    <div class="container text-center">
      <h1>My Portfolio</h1>
      <p>Some text that represents "Me"...</p>
    </div>
  </div>

  <div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>Portfolio</h2><br>
    <h4>What we have created</h4>
    <div class="row text-center slideanim">
      <div class="col-sm-4">
        <div class="thumbnail">
          <!-- <img src=/images/show1.jpg alt="show1" width="400" height="300"> -->
          <br>
          <p><strong>PHP</strong></p>
          <p>My PHP Portfolio</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <!--<img src=/images/show2.jpg alt="show2" width="400" height="300"> -->
          <br>
          <p><strong>Android</strong></p>
          <p>My Android Portfolio</p>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="thumbnail">
          <!-- <img src=/images/show3.jpg alt="show3" width="400" height="300"> -->
      </br>
          <p><strong>Java</strong></p>
          <p>My Java Portfolio</p>
        </div>
      </div>
    </div><br>
  <!-- footer -->
  <?php
    include ("footer.php");
  ?>

</body>
</html>
