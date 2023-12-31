<?php
/**
 * @var array $messages
 */
?>

<aside class="aside">
	<div class="aside__wrapper">
		<ul class="aside__list">
			<?php foreach ((array)$messages as $message): ?>
			<li class="aside__item">
				<img class="message__img" src="/assets/images/persons/1.svg" alt="avatar">
				<a href="<?='detail.php?ID='. $message['id']?>" class="aside__link">
					<p class="aside__title"><?= $message['senderName']?></p>
					<p class="aside__text"><?= mb_strimwidth($message['description'], 0, 30, "...")?></p>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>
