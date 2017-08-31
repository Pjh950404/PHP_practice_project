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
  <link rel="stylesheet" href="./css/bootstrap_custom.css">
</head>
<body>
  <?php
    include ("header.php");
  ?>
  <hedaer>
  <!-- 헤더 추가 할것. -->
  
  </hedaer>
  

  <div id="portfolio" class="container-fluid text-center bg-grey">
    <h2>포트폴리오</h2><br>
    <h4>아래는 포트폴리오 현황 입니다.</h4>
    <div class="row text-center slideanim">
      <div class="col-sm-4">
        <div id="myCarousel" class="carousel slide" data="carousel">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <a href="./portfolio.php/#PHP"><img src=/images/board.PNG style="width:100%; height: 370px;" class="container" alt="PHP1" width="400" height="300"></a>
                <div class="carousel-caption">
                <h3 ><a href="./portfolio.php/#PHP"><strong>PHP</strong></a></h3>
                <p><a href="./portfolio.php/#PHP">포트폴리오 웹사이트</a></p>
                </div>
            </div>

            <div class="item">
              <a href="./portfolio.php/#PHP"><img src="/images/INDEXPAGE.PNG" style="width:100%; height: 370px;" class="container" alt="PHP2" ></a>
              <div class="carousel-caption">
              <h3><a href="./portfolio.php/#PHP"><strong>PHP</strong></a></h3>
            <p><a href="./portfolio.php/#PHP">포트폴리오 웹사이트</a></p>
              </div>
            </div>

            <div class="item">
              <a href="./portfolio.php/#PHP"><img src="/images/register.PNG" style="width:100%; height: 370px;" class="container" alt="PHP3" width="400" height="300"></a>
              <div class="carousel-caption">
              <h3><a href="./portfolio.php/#PHP"><strong>PHP</strong></a></h3>
            <p><a href="./portfolio.php/#PHP">포트폴리오 웹사이트</a></p>
              </div>
            </div>
            
          </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
      </div>


      <div class="col-sm-4">
      <div id="myCarouse2" class="carousel slide" data="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarouse2" data-slide-to="0" class="active"></li>
          <li data-target="#myCarouse2" data-slide-to="1"></li>
          <li data-target="#myCarouse2" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <a href="./portfolio.php/#Android"><img src=/images/show1.jpg  class="container" alt="PHP1" width="400" height="300"></a>
              <div class="carousel-caption">
                <h3><a href="./portfolio.php/#Android"><strong>Android</strong></a></h3>
                <p><a href="./portfolio.php/#Android">음식 저장 어플</a></p>
              </div>
          </div>

          <div class="item">
            <a href="./portfolio.php/#Android"><img src="/images/show2.jpg" class="container" alt="PHP2" width="400" height="300"></a>
            <div class="carousel-caption">
            <h3><a href="./portfolio.php/#Android"><strong>Android</strong></a></h3>
            <p><a href="./portfolio.php/#Android">음식 저장 어플</a></p>
            </div>
          </div>

          <div class="item">
            <a href="./portfolio.php/#Android"><img src="/images/show3.jpg" class="container" alt="PHP3" width="400" height="300"></a>
            <div class="carousel-caption">
            <h3><a href="./portfolio.php/#Android"><strong>Android</strong></a></h3>
            <p><a href="./portfolio.php/#Android">음식 저장 어플</a></p>
            </div>
          </div>


          <a class="left carousel-control" href="#myCarouse2" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarouse2" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>


    <div class="col-sm-4">
    <div id="myCarouse3" class="carousel slide" data="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarouse3" data-slide-to="0" class="active"></li>
        <li data-target="#myCarouse3" data-slide-to="1"></li>
        <li data-target="#myCarouse3" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <a href="./portfolio.php/#Etc"><img src=/images/show1.jpg  class="container" alt="PHP1" width="400" height="300"></a>
            <div class="carousel-caption">
              <h3><a href="./portfolio.php/#Etc"><strong>그 외</strong></a></h3>
              <p><a href="./portfolio.php/#Etc">그 외 프로그램 제작</a></p>
            </div>
        </div>

        <div class="item">
          <a href="./portfolio.php/#Etc"><img src="/images/show2.jpg" class="container" alt="PHP2" width="400" height="300"></a>
          <div class="carousel-caption">
          <h3><a href="./portfolio.php/#Etc"><strong>그 외</strong></a></h3>
          <p><a href="./portfolio.php/#Etc">그 외 프로그램 제작</a></p>
          </div>
        </div>

        <div class="item">
          <a href="./portfolio.php/#Etc"><img src="/images/show3.jpg" class="container" alt="PHP3" width="400" height="300"></a>
          <div class="carousel-caption">
          <h3><a href="./portfolio.php/#Etc"><strong>그 외</strong></a></h3>
          <p><a href="./portfolio.php/#Etc">그 외 프로그램 제작</a></p>
          </div>
        </div>


      </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarouse3" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarouse3" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
  </div>
</div>
<br>
  <!-- footer -->

  <?php
    include ("footer.php");
  ?>

</body>
</html>
