<?php

function getMessageList($connection): array
{
	$result = mysqli_query($connection, "
		SELECT m.ID, 
		m.TITLE,
		m.DESCRIPTION,
		d.name AS sender,
		GROUP_CONCAT(a.name) AS employees
		FROM message m
		JOIN message_employee ma ON m.id = ma.MESSAGE_ID
		JOIN employee a ON ma.EMPLOYEE_ID = a.id
		JOIN sender d ON m.SENDER_ID = d.id
		GROUP BY m.ID;
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
			'sender' => $row['sender'],
		];
	}
	return $messages;
}

function addMessageToDatabase($connection, $message): bool
{
	$sql = "INSERT INTO message (id, created_at, updated_at, completed_at, title, description, sender_id) VALUES ('$message')";

	if (mysqli_query($connection, $sql))
	{
		return true;
	}
	else
	{
		return "Ошибка: " . $sql . "<br>" . mysqli_error($connection);
	}
}
