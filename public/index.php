<?php
require_once __DIR__ . '/../boot.php';

$title = option('APP_NAME', '23Test');
$time = null;
$isHistory = false;
$errors = [];
$connection = getDbConnection();



if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	$title = trim($_POST['title']);
	$comment = trim($_POST['comment']);
	if (strlen($title) > 0)
	{
		$message = addMessageToDatabase($connection);
		redirect('/?saved=true');
	}
	else
	{
		$errors[] = 'Message cannot be empty 🙃';
	}

	if (strlen($comment) > 0)
	{
		$comment = addCommentToDatabase($connection);
		redirect('/?saved=true');
	}
}

if(isset($_GET['date']))
{
	$time = strtotime($_GET['date']);

	if ($time === false)
	{
		$time = time();
	}

	$today = date('Y-m-d');
	if ($today !== date('Y-m-d', $time))
	{
		$isHistory = true;
	}
}

echo renderTemplate('layout',[
	'title' => $title,
	'comment' => $comment,
	'page' => renderTemplate('pages/main',[
		'messages' =>  getMessageList($connection),
		'isHistory' => $isHistory,
		'errors' => $errors,
		'connection' => $connection
	]),
]);