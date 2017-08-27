<?php
	session_start();
	require_once("../dbconnect.php");
	$bNo = $_GET['bno'];

	if (!isset($_SESSION['userSession'])) {
?>
		<script>
			alert('로그인 후 사용해주세요.');
			location.replace('../login.php');
		</script>
<?php
	}

	if(!empty($bNo) && empty($_COOKIE['board_free_' . $bNo])) {
		$sql = 'update board_free set b_hit = b_hit + 1 where b_no = ' . $bNo;
		$result = $db->query($sql);
		if(empty($result)) {
			?>
			<script>
				alert('오류가 발생했습니다.');
				history.back();
			</script>
			<?php
		} else {
			setcookie('board_free_' . $bNo, TRUE, time() + (60 * 60 * 24), '/');
		}
	}

	$sql = 'select b_title, b_content, b_date, b_hit, b_id from board_free where b_no = ' . $bNo;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Leemy.me - 게시판보기</title>

	<link rel="stylesheet" href="../css/board.css" />
	
</head>
<body>
	<?php
		include '../header.php';
	?>


	<article class="boardArticle container">
		<h3>자유게시판</h3>
	<div class="container">
	<div class="col-lg-12" id="Comments">
		<div class="form-horizontal" style="padding-top: 25px;">
			<div class="form-group">
				<label for="bId" class="col-sm-2 control-label">제목</label>
				<div class="col-sm-10">
				<span> <?php echo $row['b_title']; ?> </span>
				</div>
			</div>

			<div class="form-group">
				<label for="bId" class="col-sm-2 control-label">작성자</label>
				<div class="col-sm-10">
				<span> <?php echo $row['b_id']; ?> </span>
				</div>
			</div>

			<div class="form-group">
				<label for="emailID" class="col-sm-2 control-label">작성일</label>
				<div class="col-sm-10">
					<span><?php echo $row['b_date']; ?></span>
				</div>
			</div>

			 <div class="form-group">
				<label for="emailID" class="col-sm-2 control-label">조회</label>
				<div class="col-sm-10">
					<span> <?php echo $row['b_hit']; ?> </span>
				</div>
			</div>

			<div class="form-group">
				<label for="comments" class="col-sm-2 control-label">내용</label>
				<div class="col-sm-10">
					<textarea style="height:500px; width: 800px" readonly><?php echo $row['b_content']; ?></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center">
		<?php
			if($row['b_id'] == $_SESSION['userSession_email']){
		?>
			<a href="./write.php?bno=<?php echo $bNo?>" class="btn btn-success">수정</a>
			<a href="./delete.php?bno=<?php echo $bNo?>" class="btn btn-danger">삭제</a>
			<a href="./" class="btn btn-primary">목록</a>
		<?php
			}
			else
			{
		?>
			<a href="./" class="btn btn-primary">목록</a>
		<?php
			}
		?>
	</div>

	
	<?php
		require_once('./comment.php');
	?>
	</div>
</div>
</article>
<br>
	<?php include '../footer.php' ?>
</body>
</html>