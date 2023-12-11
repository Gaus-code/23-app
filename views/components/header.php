<?php ?>

<header class="header">
	<div class="header__wrapper">
		<div class="logo__container">
			<div class="header__logo">
				<a href="/"><img class="header__logo_img" src="/assets/images/logo.svg" alt="logo"></a>
			</div>
			<div class="nav__container">
				<nav class="header__nav">
					<p class="header__liveNet">Живая лента</p>
					<ul class="header__list">
						<li class="header__item active">
							<a href="#" class="header__link active">День</a>
						</li>
						<li class="header__item">
							<a href="#" class="header__link" >Неделя</a>
						</li>
						<li class="header__item">
							<a href="#" class="header__link">Месяц</a>
						</li>
					</ul>
				</nav>
				<button class="writeMessage"><img class="writeIcon" src="/assets/images/write.svg" alt="add message"></button>
				<div id="blablabla">
					<form class="write__form" role="form" action="/" autocomplete="off" method="POST">
						<label>Заголовок:</label>
						<input type="text" name="title" required>
						<label>Описание:</label>
						<input type="text" name="description" required>
						<button type="submit" class="btn btn-success">Отправить</button>
					</form>
				</div>
			</div>
		</div>
		<div class="header__person">
			<img src="/assets/images/person.svg" alt="#" class="person__img">
			<div class="personInfo">
				<p class="personInfo__name">Гаус Юлия</p>
				<p class="personInfo__eMail">pesosssss@yandex.ru</p>
			</div>
			<button class="header__btn">Выйти</button>
		</div>
	</div>
</header>
