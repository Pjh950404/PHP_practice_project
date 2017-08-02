<?php
    session_start();
    include_once 'dbconnect.php';
?>
<?xml version="1.0"?><!DOCTYPE html>
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
  
  <!-- bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- W3 CSS -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

  <div class="container-fluid bg-3 text-center">
    <h3>Some of my Work</h3><br>
    <div class="row">
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br>

  <div class="container-fluid bg-3 text-center">
    <div class="row">
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
      <div class="col-sm-3">
        <p>Some text..</p>
        <img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image">
      </div>
    </div>
  </div><br><br>
  <!-- footer -->
  <?php
    include ("footer.php");
  ?>

</body>
</html>
