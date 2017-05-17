<?php echo htmlspecialchars($_POST['name']); ?>씨 안녕하세요.
<?php echo htmlspecialchars($_POST['year']); ?>세입니다.



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>

<body>
  <?php
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE){
   ?>
   <h3> strpos()는 false 아닌것을 반환했습니다</h3>
  <p> Internet Explorer USING</p>
  <?php
}
else{
  ?>
  <h3>strpos()는 false 반환했습니다</h3>
  <p> Internet Explorer NOT USING</p>
   <php
 }
    ?>
</body>
</html>
