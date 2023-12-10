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
		e.department,
		c.CREATED_AT as CommentDate,
		c.comment_text,
		c.commenter_employee_id as comment_sender
		FROM message m
		JOIN employee e ON m.employee_id = e.employee_id
		LEFT JOIN comment c ON m.message_id = c.message_id
		LEFT JOIN employee ce ON c.commenter_employee_id = ce.employee_id
		ORDER BY m.CREATED_AT DESC;
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
			'commentDate' => $row['CommentDate'],
			'comment' => $row['comment_text'],
		];
	}
	return $messages;
}
function addMessageToDatabase($connection): bool
{
	try
	{
		$id = random_int(10, 900);
	}
	catch (Exception $e)
	{
		throw new Exception('no random int');
	}
	$senderId = 1;
	$title = $_REQUEST['title'];
	$description = $_REQUEST['description'];

	$sql = "
	INSERT INTO message (message_id, message_title, message_description, employee_id)
	VALUES ('$id', '$title', '$description', '$senderId');
	";

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
		SELECT
		message.message_id AS MessageID,
		employee.employee_name AS Employee,
		comment.comment_id AS CommentID,
		comment.message_id AS CommentMessage,
		comment.comment_text AS Comment,
		commenter.employee_name AS Commenter,
		comment.CREATED_AT AS CommentDate
		FROM message
		JOIN employee ON message.employee_id = employee.employee_id
		JOIN message_comment_link ON message.message_id = message_comment_link.message_id
		JOIN comment ON message_comment_link.comment_id = comment.comment_id
		JOIN employee AS commenter ON comment.commenter_employee_id = commenter.employee_id
		ORDER BY comment.CREATED_AT DESC;
	");
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$comments = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$comments[] = [
			'id' => $row['CommentID'],
			'title' => $row['Comment'],
			'message-id' => $row['MessageID'],
			'data' => $row['CommentDate'],
			'commenter' => $row['Commenter']
		];
	}
	return $comments;
}
function addCommentToDatabase($connection): bool
{
	try
	{
		$id = random_int(9, 900);
	}
	catch (Exception $e)
	{
		throw new Exception('no random int');
	}
	$comment = $_REQUEST['comment'];

	$commenterId = 1;
	$messageId = 1;

	$sql = "INSERT INTO comment (comment_id, comment_text, commenter_employee_id, message_id) VALUES ('$id' , '$comment', '$commenterId', '$messageId');";
	$insert = mysqli_query($connection, $sql);
	if (!$insert)
	{
		throw new Exception(mysqli_error($connection));
	}
	return $insert;
}


