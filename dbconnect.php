<? php
$mysql_hostname="localhost";
$mysql_user = "root"
$mysql_password="dkgodgod1";
$mysql_database="portflio"

$conn = mysqli_connect( [$mysql_hostname, $mysql_user, $mysql_password) or die("db connet error" . mysqli_error($conn));
//mysqli_select_db($mysql_database, $db) or die("db connect error");
// $data_stream = "'".$_GET['id']."','".$_GET['password']."','".$_GET['name']."','".$_GET['phone']."','".$_GET['email']."'";
// $query = "insert into user(`id`, `password`, `name`, `phone`, `email`) values (".$data_stream.")";
// $result = mysqli_query($conn, $query);
//
// if($result)
//   echo "Connect";
// else
//   echo "Databse Connect Error";
// mysqli_close($conn);
?>
