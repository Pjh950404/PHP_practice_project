<?php
	session_start();
	require_once("../dbconnect.php");

	//항상 변수 선언
	$bPassword = $_POST['bPassword'];
	$bTitle = $_POST['bTitle'];
	$bContent = $_POST['bContent'];

	// 파일 업로드 
	$target_dir = "../uploads/";
	$target_basename = basename($_FILES["fileToUpload"]["name"]);
	$target_file = $target_dir . $target_basename;
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$fileSize = $_FILES["fileToUpload"]["size"];

	$fileDBUpdateFlag = false;
	
	//$_POST['bno']이 있을 때만 $bno 선언. 수정 등
	if(isset($_POST['bno'])) {
		$bNo = $_POST['bno'];

		$fileDBUpdateFlag = true;
	}

	//bno이 없다면(글 쓰기라면) 변수 선언
	if(empty($bNo)) {
		$bID = $_POST['bID'];
		$date = date('Y-m-d H:i:s');

		$fileDBUpdateFlag = false;
	}

	if (file_exists($target_file)) 
	{
		$target_basename = date("YmdHis").$target_basename;
		$target_file = $target_dir . $target_basename;
		echo "바뀐 베이스 네 ->". $target_basename;
	}

//글 수정
if(isset($bNo)) {
	//수정 할 글의 비밀번호가 입력된 비밀번호와 맞는지 체크
	$sql = 'select count(b_password) as cnt from board_free where b_password=password("' . $bPassword . '") and b_no = ' . $bNo;
	$result = $db->query($sql);
	$row = $result->fetch_assoc();

	$fileSql = 'select from tbl_files where BOARD_NO = '.$bNo;
	$fileResult = $db->query($sql);

	if($fileResult){
		$fileDBUpdateFlag = false;
	}
	

	//비밀번호가 맞다면 업데이트 쿼리 작성
	if($row['cnt']) {
		$sql = 'update board_free set b_title="' . $bTitle . '", b_content="' . $bContent . '" where b_no = ' . $bNo;

		$sql2 = 'update tbl_files set FILE_SIZE="'. $fileSize.'", FILE_NAME="'. $target_basename. '", FILE_PATH="'. $target_file . '", FILE_TYPE = "'. $imageFileType. '"  where BOARD_NO = '. $bNo;
		$fileResult = $db->query($sql2);
		//FILE_ID, BOARD_NO, FILE_SIZE, FILE_NAME, FILE_PATH, FILE_TYPE
		$msgState = '수정';
		
	//틀리다면 메시지 출력 후 이전화면으로
	} else {
		$msg = '올바른 접근이 아닙니다.';
	?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
	<?php
		exit;
	}

//글 등록
} else {
	$sql = 'insert into board_free (b_no, b_title, b_content, b_date, b_hit, b_id, b_password) values(null, "' . $bTitle . '", "' . $bContent . '", "' . $date . '", 0, "' . $bID . '", password("' . $bPassword . '"))';
	
	$msgState = '등록';
}

//메시지가 없다면 (오류가 없다면)
if(empty($msg)) {
	$result = $db->query($sql);

	//쿼리가 정상 실행 됐다면,
	if($result) {
		$msg = '정상적으로 글이 ' . $msgState . '되었습니다.';
		if(empty($bNo)) {
			$bNo = $db->insert_id;
		}
		$replaceURL = './view.php?bno=' . $bNo;
	} else {
		$msg = '글을 ' . $msgState . '하지 못했습니다.';
?>
		<script>
			alert("<?php echo $msg?>");
			history.back();
		</script>
<?php
		exit;
	}
}

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
   echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

/* 파일형식 제한
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
}

else 
{
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	{
		if(!$fileDBUpdateFlag) // 파일 DB에 넣음.
		{
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
			$sql2 = 'insert into tbl_files(FILE_ID, BOARD_NO, FILE_SIZE, FILE_NAME, FILE_PATH, FILE_TYPE) value(null, "' . $bNo . '", "'. $fileSize .'", "'. $target_basename .'", "'. $target_file .'", "'. $imageFileType . '")';
			$result2 = $db->query($sql2);
		}
	} 

	else 
	{
    	echo "Sorry, there was an error uploading your file.";
	}
}

?>
<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL?>");
</script>
