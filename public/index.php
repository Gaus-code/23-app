<?php
require_once __DIR__ . '/../boot.php';

$title = option('APP_NAME', '23Test');
$time = null;
$isHistory = false;
$errors = [];
$connection = getDbConnection();

$messages = getMessageList($connection);
$comments = getCommentList($connection);

if (!empty($_POST))
{
	switch ($_SERVER['REQUEST_METHOD'] === 'POST')
	{
		case isset($_POST['title']):
			$title = trim($_POST['title']);
			$message = addMessageToDatabase($connection);
			break;
		case isset($_POST['comment']):
			$comment = trim(strlen($_POST['comment']));
			$comments = addCommentToDatabase($connection);
			break;
		default:
			echo 'cannot add smth';
	}
	redirect('?saved=true');
}


echo renderTemplate('layout',[
	'title' => $title,
	'page' => renderTemplate('pages/main',[
		'messages' =>  $messages,
		'comments' => $comments,
		'errors' => $errors,
		'connection' => $connection
	]),
]);