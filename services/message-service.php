<?php

function getMessageList($connection): array
{
	$result = mysqli_query($connection, "
		SELECT 
		    m.message_id,
		    m.message_title,
		    m.message_description,
		    m.CREATED_AT,
		    e.employee_id,
		    e.employee_name,
		    e.department
		FROM message m
		JOIN employee e ON m.employee_id = e.employee_id
		");
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$messages = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$messages[] = [
			'id' => $row['message_id'],
			'title' => $row['message_title'],
			'description' => $row['message_description'],
			'date' => $row['CREATED_AT'],
			'senderId' => $row['employee_id'],
			'senderName' => $row['employee_name'],
			'senderDepartment' => $row['department'],
		];
	}
	return $messages;
}
function addMessageToDatabase($connection): bool
{
	try
	{
		$id = random_int(31, 20000);
	}
	catch (Exception $e)
	{
		throw new Exception('no random int');
	}
	$title = $_REQUEST['title'];
	$description = $_REQUEST['description'];

	$sql = "INSERT INTO message (message_id, message_title, message_description) VALUES ('$id', '$title', '$description')";

	$insert = mysqli_query($connection, $sql);
	if (!$insert)
	{
		throw new Exception(mysqli_error($connection));
	}
	return $insert;
}
function getCommentList($connection):array
{
	$result = mysqli_query($connection, "
		SELECT comment_id, 
		message_id,
		comment_text
		FROM comment
		ORDER BY CREATED_AT DESC;
	");
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$comments = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$comments[] = [
			'id' => $row['comment_id'],
			'title' => $row['comment_text'],
			'message-id' => $row['message_id']
		];
	}
	return $comments;
}
function addCommentToDatabase($connection): bool
{
	try
	{
		$id = random_int(31, 20000);
	}
	catch (Exception $e)
	{
		throw new Exception('no random int');
	}
	$comment = $_REQUEST['comment'];

	$sql = "INSERT INTO comment (comment_id, comment_text) VALUES ('$id' , '$comment')";

	$insert = mysqli_query($connection, $sql);
	if (!$insert)
	{
		throw new Exception(mysqli_error($connection));
	}
	return $insert;
}
