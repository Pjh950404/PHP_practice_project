<!DOCTYPE html>
<html lang="en">
<head>
  <title>Leemy - 포트폴리오 페이지</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
    include_once './header.php';
?>

<div class="container">
  <h2>포트폴리오 현황</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#PHP">PHP</a></li>
    <li><a data-toggle="tab" href="#Android">Android</a></li>
    <li><a data-toggle="tab" href="#Etc">Etc..</a></li>
  </ul>

  <div class="tab-content">
    <div id="PHP" class="tab-pane fade in active">
      <h3>포트폴리오 웹사이트</h3>
      <p><설명></p>
      <p>현재 웹사이트는 포트폴리오 웹사이트를 제작과 php를 공부를 이유로 만들었습니다., 사용한 언어로는 html, javascript와 php를 기본적으로 사용하였습니다. 사용한 프레임워크는 jquery, ajax를 사용하였습니다. css는 주로 bootstrap 사용해 꾸몄습니다.</p>
      <p>1. 회원가입</p>
      <p>이름, 이메일, 비밀번호 폼에 유효성검사를 합니다. jquery를 사용하여 유효성검사를 사용자가 키보드로 입력할 떄마다 진행하게 됩니다. 이메일 입력폼의 경우 ajax를 사용하여 현재 입력값과 DB에 있는 아이디와 동일한것이 있는지 입력마다 검사합니다. 이름, 이메일, 비밀번호을 바르게 입력하였다면 회원가입버튼이 활성화가 되어 가입이 가능해집니다.</p>
      <p>2. 로그인</p>
      <p>로그인에 성공하면 타이틀에 해당 아이디의 이름이 출력되며 세션을 사용하였습니다. </p>
      <p>3. 게시판</p>
      <p>페이징하여 한 뷰에 15개의 게시글 만을 보여줍니다. 페이저 번호를 선택하여 해당 페이지로 이동이 가능합니다. 1 ~ 10 페이저가 넘어가면 다음버튼을 누를 경우 11 ~ 20페이저 번호가 보이게 하였습니다. </p>
      <p>로그인을 한 사용자만 게시판이 이용이 가능하게 하였습니다. 조회수는 쿠키를 사용하여 하루가 지나야만 게시글을 클릭할경우 조회수가 카운트되게 하였습니다. 제목, 내용, 작성자를 입력해 검색이 가능하게 하였습니다. 현재 세션과 글의 작성자를 비교하여 맞는지 확인하고 글의 수정과 삭제를 가능하게 하였습니다.</p>
      <p>댓글을 사용자가 작성이 가능하고 수정과 삭제가 가능하게 하였습니다.</p>
      <p>사용자가 파일을 첨부하여 게시글을 작성가능하게 하였습니다. 1개의 파일만 등록이 가능합니다.</p>
    </div>

    <div id="Android" class="tab-pane fade">
      <h3>음식 다이어리 어플리케이션</h3>
      <p><설명></p>
      <p>액티비티 생명주기와 인텐트, 리스트뷰, 쉐어드프리퍼런스, 애니메이션을 써서 만든 간단한 음식일정어플 입니다.</p>
      <p>오늘 먹었던 음식이나 나중에 먹을 음식을 저장하여 리스트뷰로 볼 수 있으며, 음식의 사진이나 먹을 시간과 카테고리등이 저장이 가능하며, 해당 데이터를 쉐어드프리퍼런스에 저장하여 앱이 종료되어도 리스트뷰로 출력합니다.</p>
    </div>

    <div id="Etc" class="tab-pane fade">
      <h3>자바 콘솔게임</h3>
      <p><설명></p>
      <p>Java 익히기위해 제작한 간단한 자바 콘솔게임 입니다.</p>
    </div>

  </div>
</div>

</body>
</html>