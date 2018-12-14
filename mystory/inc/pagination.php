<?php

//PAGINATION

//How many results from db on page
$results_per_page = 5;

//How many pages on the left and right
$left_right_pagination = 3;


$num_of_results = mysqli_num_rows($result);
$num_of_pages = ceil($num_of_results/$results_per_page);

//page
if (!isset($_GET['page'])) {
	$page = 1;
} else {
	$page = $_GET['page'];
}

if ($page < 1) {
	$page = 1;
}

if ($page > $num_of_pages) {
	$page = $num_of_pages;
}

//offset for db
$offset = ($page-1)*$results_per_page;

//Pagination controls
$pagination = '';

//left
if ($page > 1) {

	$previous = $page - 1;
	$pagination = '<a href="index.php?page=' .$previous. '">Prethodna</a> &nbsp';
	for ($i = $page - $left_right_pagination; $i < $page; $i++) {
		if ($i > 0) {
			$pagination.= '<a href="index.php?page=' .$i. '">' .$i. '</a> &nbsp';
		}
	}

} else {

	$pagination .= '<a>Prethodna</a> &nbsp';
}

//active page
$pagination .= '' .$page. '&nbsp&nbsp';

//right
if ($page <= $left_right_pagination) {
	$pagination_count = $left_right_pagination * 2 + 1;
	$left_right_pagination = $pagination_count - $page;
}

for ($i = $page + 1; $i <= $num_of_pages; $i++) {
	$pagination .= '<a href="index.php?page=' .$i. '">' .$i. '</a> &nbsp';
	if ($i >= $page + $left_right_pagination) {
		break;
	}
}

if ($page < $num_of_pages) {
	$next = $page + 1;
	$pagination .= '<a href="index.php?page=' .$next. '">Sljedeća</a>';
}
