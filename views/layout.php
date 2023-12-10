<?php
/**
 * @var string $title
 * @var array $page
 */

$connection = getDbConnection();
$messages = getMessageList($connection);
$comments = getCommentList($connection);
?>

<!doctype html>
<html lang="<?= option('APP_LANG', 'en'); ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/assets/styles.css">
	<title><?= $title ?></title>
</head>
<body>
<div class="wrapper">
	<?php echo renderTemplate('components/header', []);?>
	<?php echo renderTemplate('components/nav', []);?>
	<?php echo renderTemplate('components/aside', [
		'messages' => $messages,
		'comments' => $comments,
	]);?>
	<?= $page ?>
</div>
</body>
<script src="/assets/scripts/index.js"></script>
</html>
