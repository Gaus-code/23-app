<?php
/**
 * @var mysqli $connection
 */
?>

<main class="main">
	<div class="main__wrapper">
		<div class="main__post">
			<?php echo renderTemplate('components/message-card', [
				'title' => option('TITLE', '23Test'),
				'messages' => getMessageList($connection),
			]);
			?>
		</div>
	</div>
</main>
