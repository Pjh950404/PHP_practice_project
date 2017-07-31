<?php
	require_once("../dbconnect.php");
	$bno = $_GET['bno'];

	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bno;
	$result = $DBcon->query($sql);
	$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Leemy.me - 게시판</title>
	<link rel="stylesheet" href="../stylesheet/normalize.css" />
	<link rel="stylesheet" href="../stylesheet/board.css" />
	<!-- Bootstrap -->
	<link href="stylesheet/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- W3 CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></scri.row>.containerpt>
	<![endif]-->
</head>
<body>
	<?php
		include '../header.php';
	 ?>
	 <br>
	<article class="boardArticle">
		<h3>자유게시판 글쓰기</h3>
		   <div class="container">
		<div id="boardView">
			<h3 id="boardTitle"><?php echo $row['b_title']?></h3>
			<div id="boardInfo">
				<span id="boardID">작성자: <?php echo $row['b_id']?></span>
				<span id="boardDate">작성일: <?php echo $row['b_date']?></span>
				<span id="boardHit">조회: <?php echo $row['b_hit']?></span>
			</div>
			<div id="boardContent"><?php echo $row['b_content']?></div>
			<div class="btnSet">
				<a href="./write.php?bno=<?php echo $bno?>">수정</a>
				<a href="./delete.php?bno=<?php echo $bno?>">삭제</a>
				<a href="./">목록</a>
			</div>
		</div>
	</div>
	</article>

</body>
</html>
