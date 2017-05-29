<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="stylesheet/login_style.css">

</head>
<body>
<form action="/action_page.php">
  <div class="container">
    <label><b>이름</b></label>
    <input type="text" placeholder="Enter Name" name="uname" required>

    <label><b>비밀번호</b></label>
    <input type="password" placeholder="Enter Password" name="upsw" required>

    <button type="submit">로그인</button>
    <input type="checkbox" checked="checked"> 로그인정보기억
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">취소</button>
    <span class="upsw"> <a href="#"> 비밀번호를 잊으셨습니까?</a></span>
  </div>
</form>
</body>
