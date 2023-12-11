<?php
require_once __DIR__ . '/../boot.php';
/**
 * @throws Exception
 */
$ID = $_GET['ID'] ?? '';
$connection = getDbConnection();
function checkId(string $ID): int
{
	if (($ID ?? '')) {
		$ID = isset($_GET['ID']) ? (string)$ID : $ID;
	}
	if (!is_numeric($ID)) {
		echo nl2br('page not found' . PHP_EOL . 'a ne nado bylo moj url peredelyvat\', he-he =)');
		exit;
	}
	return $ID;
}

/**
 * @param mysqli $connection
 * @param string $ID
 * @return bool
 * @throws Exception
 */
function updateMessage(mysqli $connection, string $ID)
{
	if (isset($_POST['title'], $_POST['description'])) {
		$title = $_POST['title'];
		$description = $_POST['description'];

		$sql = "UPDATE message SET
		message_title='$title', message_description='$description'
		WHERE message_id= '$ID'";

		$result = mysqli_query($connection, $sql);
		if (!$result) {
			throw new Exception(mysqli_error($connection));
		}
	}
	return $result;
}


echo renderTemplate('layout', [
	'title' => option('TITLE', '23-APP :: About'),
	'page' => renderTemplate('pages/detail', [
		'messages' => getMessageById($connection, checkId($ID)),
		'comments' => getCommentList($connection),
		'edit' => updateMessage($connection, $ID),
	]),
]);