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
				<img class="message__img" src="/assets/images/persons/<?= $message['id']?>.svg" alt="avatar">
				<a href="#" class="aside__link">
					<p class="aside__title"><?= $message['sender']?></p>
					<p class="aside__text"><?= mb_strimwidth($message['description'], 0, 30, "...")?></p>
				</a>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
</aside>
