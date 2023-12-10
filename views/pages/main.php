<?php
/**
 * @var array $messages
 * @var array $comments
 */
?>

<main class="main">
	<div class="main__wrapper">
		<div class="main__post">
			<?php echo renderTemplate('components/message-card', [
				'title' => option('TITLE', '23Test'),
				'messages' => $messages,
				'comments' => $comments,
			]);
			?>
		</div>
	</div>
</main>
