<!DOCTYPE html>
<html>
<head>
	<title>Moja priča</title>
	<meta charset="utf-8">
	<meta name="author" content="Goran Božić">
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>
	<header>
		<h1>Moja priča</h1>
	</header>
		<nav>
			<a href="index.php">Najnovije</a>
			<a href="best.php">Najpopularnije</a>
		</nav>
	<main>
		<article>
			<section>
				<?php include "inc/create_db.php"; ?>
				<?php include "inc/sort_new.php"; ?>
			</section>
			<form method="POST" action="inc/post.php">
				<label>Ime (nije obavezno):</label><br>
				<input type="name" name="name" placeholder="Anonymous"><br>
				<label>Vaša priča:</label><br>
				<input type="text" name="story" required><br>
				<button type="submit">Objavi</button>
			</form>

		</article>
	</main>
	<footer>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
	</footer>
</body>
</html>