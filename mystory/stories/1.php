<!DOCTYPE html>
<html>
<head>
	<title>Moja teorija</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
	<header>
		<a href="../index.php"><h1>Moja priča</h1></a>
	</header>
	<main>
		<article>
			<?php

			$id =1;

			require "../inc/config.php";

			$conn = new mysqli (SERVER_NAME,USERNAME,PASSWORD,DATABASE);

			if ($conn->connect_error){
				die();
			}

			$sql = "SELECT * FROM `posts` WHERE `id`=1";
			$results = $conn -> query($sql);

			while ($row = mysqli_fetch_array($results)) {

				echo "<div class=\"story\">
				<span class=\"user\">" .$row["user"]. "  " .$row["day"]. "</span><br>
				<p class=\"story_text\">" .$row["post"]. "</p>
				<span><button>&#128077</button>&nbsp<button>&#128078</button></span>
			</div>";

			}

			$sql = "SELECT `comment`,`user`,`day` FROM `comments` WHERE `post_id`=".$id;
			$results = $conn -> query($sql);

			while ($row = mysqli_fetch_array($results)) {
			
				echo "<div class=\"comment\">
				<span class=\"user\">" .$row["user"]. "  " .$row["day"]. "</span><br>
				<p class=\"comment_text\">" .$row["comment"]. "</p>
				<span><button>&#128077</button>&nbsp<button>&#128078</button></span>
			</div>";

			}

			$conn -> close();

			?>
			
			<form method="POST" action="../inc/comments.php">
				<input type="hidden" name="id" value="1">
				<label>Ime (nije obavezno):</label><br>
				<input type="name" name="name" placeholder="Anonymous"><br>
				<label>Vaš komentar:</label><br>
				<input type="text" name="comment" required><br>
				<button type="submit">Ostavi komentar</button>
			</form>
		</article>
	</main>