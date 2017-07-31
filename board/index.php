<?php
	require_once("../dbconnect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Leemy.me - 게시판</title>
	<link rel="stylesheet" href="../stylesheet/normalize.css" />
	<link rel="stylesheet" href="../stylesheet/board.css" />

	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- W3 CSS -->
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<?php
		include "../header.php";
	 ?>


	<article class="boardArticle">
		<h3>자유게시판</h3>
		<div class="center-block">
		<div id="boardList">
			<table>
				<caption class="readHide">게시판</caption>
				<thead>
					<tr>
						<th scope="col" class="no">번호</th>
						<th scope="col" class="title">제목</th>
						<th scope="col" class="author">작성자</th>
						<th scope="col" class="date">작성일</th>
						<th scope="col" class="hit">조회</th>
					</tr>
				</thead>
				<tbody>
						<?php
							$sql = 'select * from board_free order by b_no desc';
							$result = $DBcon->query($sql);
							while($row = $result->fetch_assoc())
							{
								$datetime = explode(' ', $row['b_date']);
								$date = $datetime[0];
								$time = $datetime[1];
								if($date == Date('Y-m-d'))
									$row['b_date'] = $time;
								else
									$row['b_date'] = $date;
						?>
					<tr>
						<td class="no"><?php echo $row['b_no']?></td>
						<td class="title">
							<a href="./view.php?bno=<?php echo $row['b_no']?>"><?php echo $row['b_title']?></a>
						</td>
						<td class="author"><?php echo $row['b_id']?></td>
						<td class="date"><?php echo $row['b_date']?></td>
						<td class="hit"><?php echo $row['b_hit']?></td>
					</tr>
						<?php
							}
						?>
				</tbody>
			</table>
			<div class="btnSet">
				<a href="./write.php" class="btnWrite btn">글쓰기</a>
			</div>
		</div>
	</div>
	</article>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="stylesheet/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
