<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$comments = json_decode(file_get_contents('./comments.txt'), true);

	$newComment['author'] = $_POST['author'];
    $newComment['text'] = $_POST['text'];
    $newComment['id'] = time();

    array_push($comments, $newComment);

    file_put_contents('./comments.txt', json_encode($comments));

    $commentsRecent = array_slice($comments, -50, 50);
	foreach ($commentsRecent as $key => $row) {
	    $commentTimestamp[$key]  = intval($row['id']);
	}
	array_multisort($commentTimestamp, SORT_DESC, $commentsRecent);

    header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache');
	header('Content-Type: application/json');
    echo json_encode($commentsRecent);

} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$comments = json_decode(file_get_contents('./comments.txt'), true);
	$commentsRecent = array_slice($comments, -50, 50);

	foreach ($commentsRecent as $key => $row) {
	    $commentTimestamp[$key]  = intval($row['id']);
	}

	array_multisort($commentTimestamp, SORT_DESC, $commentsRecent);
	header('Access-Control-Allow-Origin: *');
	header('Cache-Control: no-cache');
	header('Content-Type: application/json');
	echo json_encode($commentsRecent);
}
?>