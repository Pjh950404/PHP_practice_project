<!DOCTYPE html>
<html lang="en">
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
              <button type="submit" class="btn btn-info" onclick="RegisterUser()">회원가입 하기 <i class="fa fa-check spaceLeft"></i></button>
              <button type="submit" class="btn btn-warning">가입취소 <i class="fa fa-times spaceLeft"></i></button>
            </div>
        </div>

      </article>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="stylesheet/bootstrap/js/bootstrap.min.js"></script>
    <script>
      function RegisterUser(){
        if(document.getElementsById("password").value == document.getElementsById("password2").value){
          var request = new XMLHttpRequest();
          var params = "?id=" + document.getElementsById("id").value +
          "&password=" + document.getElementsById("password").value +
          "&name=" + document.getElementsById("name").value +
          "&phone=" + document.getElementsById("phone").value +
          "&email=" +document.getElementsById("email").value;

          request.open("GET", "config.php" + params, true);
          request.onreadystatechange = function(){
            if(request.readyState == 4){
              if(request.status == 200 || request.status == 0) {
                var str = request.responseText;
                if(str == "1"){
                  alert("Success");
                }
                else {
                  alert("Fail");
                }
              }
            }
          }
          requet.send(null);
        }
        else{
          alert("Password not same");
        }
      }
    </script>

  </body>
</html>
