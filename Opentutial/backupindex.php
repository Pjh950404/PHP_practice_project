<?php
  $conn = mysqli_connect("localhost", "root", "dkgodgod1");
  mysqli_select_db($conn, "opentutorial");
  $result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link rel="stylesheet" type="text/css" href="/style.css">
  <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="target">
    <header>
    <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="생활코딩">
        <h1><a href="/index.php">JavaScript</a></h1>
  </header>
    <nav>
        <ol>
    <?php
    while( $row = mysqli_fetch_assoc($result)){
      echo '<li><a href="/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
    }

    ?>
        </ ol>
    </nav>
  <div id="control">
    <input type="button" value="white" onclick="document.getElementById('target').className='white'"/>
    <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
    <a href="/write.php">쓰기</a>
  </div>
  <article>

  <?php
  if(empty($_GET['id']) === false ) {
      $sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
      echo '<p>'.htmlspecialchars($row['name']).'</p>';
      echo strip_tags($row['description'], '<a><h1><h2><h3><h4><h5><ul><ol><li>');
  }
  ?>
  </article>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
