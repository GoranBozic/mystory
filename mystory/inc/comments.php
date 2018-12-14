<?php 

if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['comment']) || empty($_POST['id'])) {
	die();
} 

if (empty($_POST['name'])) {
	$name = 'Anonymous';

}else{
	$name = mysql_real_escape_string($_POST['name']); 
}

$post_id = mysql_real_escape_string($_POST['id']);
$comment = mysql_real_escape_string($_POST['comment']);

date_default_timezone_set('Europe/Zagreb');
$date = date('d.m.y.');


if (empty($comment)) {
	echo 'Polje "Vaš komentar" mora biti popunjeno!';

} else{

	require 'config.php';

	$conn = new mysqli (SERVER_NAME,USERNAME,PASSWORD,DATABASE);

	if ($conn->connect_error) {
		die();
	}

	$stmt = $conn->prepare("INSERT INTO `comments`(`comment`,`user`,`day`,`post_id`) VALUES (?,?,?,?)");
	$stmt -> bind_param("sssi",$comment, $name, $date, $post_id);
	$stmt -> execute();
	$stmt -> close();

	$conn -> close();

	header ('Location:../stories/'.$post_id.'.php');
}

?>