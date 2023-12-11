<?php
/**
 * @var array $messages
 * @var array $comments
 * @var mysqli $edit
 */
?>

<?php foreach ($messages as $message): ?>
<div class="detail__wrapper">
	<div class="post__header">
		<div class="post__header_container">
			<img src="/assets/images/person.svg" alt="#" class="post__person_img">
			<div class="post__personInfo">
				<p class="post__person__name"><?= $message['senderName'] . ', ' . $message['senderDepartment']?> department</p>
				<p class="post__person__date"><?= convertTime($message['date'])?></p>
			</div>
		</div>
		<div class="saveBlock">
			<button class="edit"><img class="editImage" src="/assets/images/edit.svg" alt="edit message"></button>
			<a href="/404.php"><button class="person__favBtn">В избранное</button></a>
		</div>
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
			<form class="post__form" role="form" action="/" autocomplete="off" method="POST">
				<input type="text" name="comment">
				<button class="post__sendBtn" type="submit"><img class="sendImg" src="/assets/images/sendBtn.svg" alt="send comment"></button>
			</form>
		</div>
		<?php foreach ((array)$comments as $comment):?>
			<?php if ($_GET['ID'] === $comment['message-id']):?>
				<p class="commentText">Комментарии:</p>
				<div class="commentBlock">
					<p class="commentCommenter"><?= $comment['commenter'] . ' (' . convertTime($comment['data']) . ') :'?></p>
					<p class="commentTitle"><?= $comment['title']?></p>
				</div>
			<?php endif;?>
		<?php endforeach; ?>
	</div>
	<div id="editContainer">
		<form class="editForm" action="<?= $edit ?>" method="POST">
			<p>Редактировать сообщение</p>
			<label>Заголовок:</label>
			<input class="editInput" type="text" name="title" value="<?= $message['title'] ?>" required>
			<label>Описание:</label>
			<input class="editInput" type="text" name="description" value="<?= $message['description'] ?>" required>
			<button onclick="showMessage()" type="submit" class="Editbtn">Отправить</button>
		</form>
	</div>
</div>
<?php endforeach; ?>
