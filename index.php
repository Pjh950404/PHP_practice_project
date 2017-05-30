<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet/style.css">
  <link rel="stylesheet" href="stylesheet/w3c/w3.css">
  <title>  leemy.me - PortfolioWebSite</title>
</div>
</head>

<body>

  <!-- 상단 네비게이션 부분 -->
  <div class="w3-top">
    <div class="w3-bar w3-white w3-wide w3-padding w3-card-2">
      <a href="/index.php" class="w3-bar-item w3-button"><b>Lee</b> PortfolioWebSite</a>

      <div class="w3-left w3-hide-small">
        <a href="/portfoliopage.php" class="w3-bar-item w3-button">이력사항</a>
        <a href="#about" class="w3-bar-item w3-button">게시판</a>
      </div>
      <div class="w3-right w3-hide-small">
        <a href="javascript:void(0);" class="w3-bar-item w3-button" onclick="document.getElementById('id01').style.display='block'">로그인</a>
        <a href="/join.php" class="w3-bar-item w3-button">회원가입</a>
        <!-- 요기까지 메뉴만 -->
        <!--모달 로그인 창-->
        <div id="id01" class="w3-modal">
          <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
            <form class="w3-container" action="/action_page.php">
              <div class="w3-section">
                <label><b>아이디</b></label>
                <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="아이디를 입력해주세요." name="usrname" required>
                <label><b>비밀번호</b></label>
                <input class="w3-input w3-border" type="text" placeholder="비밀번호를 입력해주세요." name="psw" required>
                <button class="w3-button w3-block w3-green w3-section w3-padding" type="submit">로그인</button>
                <input class="w3-check w3-margin-top" type="checkbox" checked="checked"> 로그인 정보 기억
                <a href="/join.php" type="button" class="w3-right w3-button w3-button">회원가입</a>
              </div>
            </form>

            <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
              <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">취소</button>

              <span class="w3-right w3-padding w3-hide-small"> <a href="#">비밀번호 잊으셨습니까?</a></span>
            </div>

          </div>
        </div>
        <!-- 로그인 모달 -->
    </div>
  </div>
  <!-- 상단 네비게이션 끝 -->


  <!-- 메인 사진 부분 -->
  <header class="w3-display-container w3-content w3-wide" style="max-width:800px;" id="home">
    <img class="w3-image" src="/images/mainimage.jpg" alt="Architecture" width="800px" height="1px">
    <div class="w3-display-middle w3-margin-top w3-center">
      <h1 class="w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>web</b></span> <span class="w3-hide-small w3-text-light-grey">site</span></h1>
    </div>
  </header>

<!-- First Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/android.jpg" alt="Norway" style="width:10%" class="w3-hover-greyscale">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/java.png" alt="Norway" style="width:10%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="images/php.png" alt="Norway" style="width:10%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>

  <!-- Second Photo Grid-->
  <div class="w3-row-padding">
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/android.jpg" alt="Norway" style="width:10%" class="w3-hover-greyscale">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container w3-margin-bottom">
      <img src="images/java.png" alt="Norway" style="width:10%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
    <div class="w3-third w3-container">
      <img src="images/php.png" alt="Norway" style="width:10%" class="w3-hover-opacity">
      <div class="w3-container w3-white">
        <p><b>Lorem Ipsum</b></p>
        <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      </div>
    </div>
  </div>

</body>
</html>
