<?php
/**
 * @var string $title
 * @var array $page
 */
$connection = getDbConnection();
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
		'connection' => $connection,
		'messages' => getMessageList($connection)
	]);?>
	<?= $page ?>
</div>
</body>
<script src="/assets/scripts/index.js"></script>
</html>
