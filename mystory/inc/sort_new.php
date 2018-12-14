<?php

//require 'config.php';

//Connect to db
$conn = new mysqli (SERVER_NAME,USERNAME,PASSWORD,DATABASE);

if ($conn->connect_error){
	die();
}


require 'pagination.php';


//Fetch results from db
$sql = "SELECT * FROM `posts` ORDER BY `id` DESC LIMIT " .$offset. ',' .$results_per_page;
$result = $conn->query($sql);

//If db not empty
if($result == TRUE){
   
while ($row = mysqli_fetch_array($result)){
//???Like and dislike???
	echo 	'<div class="story">
				<a href="stories/' .$row['id']. '.php">
				<span class="user">' .$row['user']. '  ' .$row['day']. '</span><br>
				<p class="story_text">' .$row['post']. '</p>
				</a>
				<span>

				<a href="inc/like.php"><button>&#128077</button></a>&nbsp<a href="inc/dislike.php"><button>&#128078</button></a>
				
				</span></div>';
	}

	echo $pagination;

//If db empty
}else{
	echo "OBJAVITE PRIČU!!!";
}

$conn -> close();
?>