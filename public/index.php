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
	if (strlen($title) > 0)
	{
		$message = new Message($title, $description, $sender);
		$repository->add($message);
		redirect('/?saved=true');
	}
	else
	{
		$errors[] = 'Message cannot be empty 🙃';
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
		$title = sprintf('ToDoList : %s', date('j M', $time));
	}
}

echo renderTemplate('layout',[
	'title' => $title,
	'page' => renderTemplate('pages/main',[
		'messages' =>  getMessageList($connection),
		'isHistory' => $isHistory,
		'errors' => $errors,
		'connection' => $connection
	]),
]);