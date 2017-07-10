<?php

    include_once 'dbconnect.php';
 ?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, inital-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <br>
<!-- 상단 네비게이션 부분 -->
<div class="w3-top">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
    <a href="/index.php" class="w3-bar-item w3-button"><b>Lee</b> PortfolioWebSite</a>

    <div class="w3-left w3-hide-small">
      <a href="/portfoliopage.php" class="w3-bar-item w3-button">이력사항</a>
      <a href="#about" class="w3-bar-item w3-button">게시판</a>
    </div>
    <div class="w3-right w3-hide-small">
        <?php
          if(!isset($_SESSION['userSession'])){

              echo'<a href="login.php" class="w3-bar-item w3-button">로그인</a>';
              echo'<a href="register.php" class="w3-bar-item w3-button">회원가입</a>';
          }
          else{
              //echo $userRow[''];
              echo'<a href="memberRead.php" class="w3-bar-item w3-button">회원정보보기</a>';
              echo'<a href="memberinfo.php" class="w3-bar-item w3-button">회원정보수정</a>';
              echo'<a href="logout.php?logout" class="w3-bar-item w3-button">로그아웃</a>';
          }
         ?>
      <!-- 요기까지 메뉴만 -->

      <!--모달 로그인 창-->
      <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
          <form class="w3-container" action="/action_page.php">
            <div class="w3-section">
              <label><b>아이디</b></label>
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="이메일을 입력하세요." name="email" required>
              <label><b>비밀번호</b></label>
              <input class="w3-input w3-border" type="password" placeholder="비밀번호를 입력해주세요." name="password" required>
              <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">로그인</button>
              <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> 로그인 정보 기억
            </div>
          </form>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">취소</button>

            <!-- <span class="w3-right w3-padding w3-hide-small"> <a href="#">비밀번호 잊으셨습니까?</a></span> -->
          </div>

        </div>
      </div>
    </div>
      <!-- 로그인 모달 -->
  </div>
</div>
</body>
</html>
