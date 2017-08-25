<?php
    session_start();
    include_once 'dbconnect.php';
    $Message = '로그인을 다시 해주시기바랍니다.';
    $alert_script;

    if (isset($_SESSION['userSession'])=="") {
        echo "<script> alert('$Message'); </script>";
?>
        <script>
        location.replace("./index.php");
        </script>
<?php
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>leemy - 회원정보 화면</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<?php
    include 'header.php';
 ?>
 <h3>가입되어 있는 회원</h3>
<form method="post" name="frm">
<table width="50%" align="center" border="0">
<tr>
<!--<td colspan="3"><a href="register.php">add new records...</a></td>-->
</tr>
<tr>
<th> USER ID</th>
<th> EMAIL</th>
<th> USER NAME</th>
</tr>
<?php
 $res = $db->query("SELECT * FROM tbl_users");
 $count = $res->num_rows;

 if($count > 0)
 {
  while($row=$res->fetch_array())
  {
   ?>
   <tr>
   <!--<td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['user_id']; ?>"  /></td>-->
   <td><?php echo $row['user_id']; ?></td>
   <td><?php echo $row['email']; ?></td>
   <td><?php echo $row['username']; ?></td>
   </tr>
   <?php
  }
 }
 else
 {
  ?>
        <tr>
        <td colspan="3"> 데이터 없음</td>
        </tr>
        <?php
 }
?>

<!--
<?php
if($count > 0)
{
 ?>
 <tr>
    <td colspan="3">
    <label><input type="checkbox" class="select-all" /> Check / Uncheck All</label><br>
    <label id="actions">
    <span style="word-spacing:normal;"> with selected :</span>
    <span><img src="/images/edit.png" onClick="edit();" alt="edit" />edit</span>
    <span><img src="/images/delete.png" onClick="delete_rec();" alt="delete" />delete</span>
    </label>
    </td>
 </tr>
    <?php
}

?>
-->

</table>
</form>
</body>
</html>