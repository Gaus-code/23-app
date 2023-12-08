<?php
/**
 * @var array $messages
 */
?>

<?php foreach ((array)$messages as $message): ?>
<div class="post__wrapper">
	<div class="post__header">
		<div class="post__header_container">
			<img src="/assets/images/person.svg" alt="#" class="post__person_img">
			<div class="post__personInfo">
				<p class="post__person__name"><?= $message['sender']?></p>
				<p class="post__person__date">Сегодня, 10:58</p>
			</div>
		</div>
		<button class="person__favBtn">В избранное</button>
	</div>
	<div class="post__body">
		<p class="message__adress">
			Кому: Всем сотрудникам
		</p>
		<p class="message__title">
			<?= $message['title']?>
		</p>
		<div class="message__body">
			<p class="post__text"><?= $message['description']?></p>
		</div>
	</div>
	<div class="post__footer">
		<div class="post__reaction">
			<button id="likeButton" class="post__like">
				<img id="emptyHeart" src="/assets/images/emptyHeart.svg" alt="set like">
				<p>Нравится</p>
			</button>
			<button class="post__comment" id="commentButton">
				<img class="comment__img" src="/assets/images/comment.svg" alt="comment post">
				<p class="comment">Комментировать</p>
			</button>
		</div>
		<div class="post__input" id="commentForm">
			<img src="/assets/images/persons/7.svg" alt="#" class="post__person_img">
			<form class="post__form">
				<input type="text">
				<button class="post__sendBtn" type="submit"><img class="sendImg" src="/assets/images/sendBtn.svg" alt="send comment"></button>
			</form>
		</div>
	</div>
</div>
<?php endforeach; ?>
