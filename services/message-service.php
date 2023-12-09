<?php

function getMessageList($connection): array
{
	$result = mysqli_query($connection, "
		SELECT m.ID, 
		m.TITLE,
		m.DESCRIPTION,
		m.CREATED_AT,
		GROUP_CONCAT(a.name) AS employees
		FROM message m
		JOIN message_employee ma ON m.id = ma.MESSAGE_ID
		JOIN employee a ON ma.EMPLOYEE_ID = a.id
		GROUP BY m.ID
		ORDER BY CREATED_AT DESC;
	");
	if (!$result)
	{
		throw new Exception(mysqli_error($connection));
	}

	$messages = [];
	while ($row = mysqli_fetch_assoc($result))
	{
		$messages[] = [
			'id' => $row['ID'],
			'title' => $row['TITLE'],
			'description' => $row['DESCRIPTION'],
			'employees' => $row['employees']
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

	$sql = "INSERT INTO message (id, title, description) VALUES ('$id', '$title', '$description')";

	$insert = mysqli_query($connection, $sql);
	if (!$insert)
	{
		throw new Exception(mysqli_error($connection));
	}
	return $insert;
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
	$title = $_REQUEST['comment'];

	$sql = "INSERT INTO message (id, title) VALUES ('$id', '$title')";

	$insert = mysqli_query($connection, $sql);
	if (!$insert)
	{
		throw new Exception(mysqli_error($connection));
	}
	return $insert;
}
