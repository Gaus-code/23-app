CREATE TABLE IF NOT EXISTS employee (
	employee_id INT PRIMARY KEY,
	employee_name VARCHAR(255),
	department VARCHAR(255),
	position VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS message (
	message_id INT PRIMARY KEY,
	message_title VARCHAR(120) NOT NULL,
	message_description TEXT,
	employee_id INT,
	CREATED_AT DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	UPDATED_AT DATETIME NULL DEFAULT NULL,
	FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
);

CREATE TABLE IF NOT EXISTS comment (
	comment_id INT PRIMARY KEY,
	message_id INT,
	comment_text TEXT,
	commenter_employee_id INT,
	CREATED_AT DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	UPDATED_AT DATETIME NULL DEFAULT NULL,
	FOREIGN KEY (message_id) REFERENCES message(message_id),
	FOREIGN KEY (commenter_employee_id) REFERENCES employee(employee_id)
);

CREATE TABLE IF NOT EXISTS message_employee_link (
	message_id INT,
	employee_id INT,
	FOREIGN KEY (message_id) REFERENCES message(message_id),
	FOREIGN KEY (employee_id) REFERENCES employee(employee_id)
);

CREATE TABLE IF NOT EXISTS message_comment_link (
	message_id INT,
	comment_id INT,
	FOREIGN KEY (message_id) REFERENCES message(message_id),
	FOREIGN KEY (comment_id) REFERENCES comment(comment_id)
);

CREATE TABLE IF NOT EXISTS comment_employee_link (
	comment_id INT,
	commenter_employee_id INT,
	FOREIGN KEY (comment_id) REFERENCES comment(comment_id),
	FOREIGN KEY (commenter_employee_id) REFERENCES employee(employee_id)
);

INSERT INTO employee
VALUES
	(1, 'Гаус Юлия', 'Development', 'Веб-разработчик'),
	(2, 'Кристофер Нолан', 'Managment', 'Администратор'),
	(3, 'Гай Ричи', 'Security', 'Специалист по информационной безопасности'),
	(4, 'Мартин Скорсезе', 'Support service', 'Инженер технической поддержки'),
	(5, 'Квентин Тарантино', 'Staff', 'Уборщик'),
	(6, 'Питер Джексон', 'System administration', 'Администратор баз данных'),
	(7, 'Ли Анкрич', 'Design', 'Дизайнер'),
	(8, 'Дэмьен Шазелл', 'QA', 'Инженер по тестированию');

INSERT INTO message(message_id, message_title, message_description, employee_id)
VALUES
	(1, 'Возьмите на работу пэжэ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio nemo laboriosam tempora accusamus est, quas sapiente. Harum sint, beatae impedit inventore officiis nobis sunt quaerat iste minima, repudiandae dolore aspernatur eum delectus ullam magni sit dolores esse, dolor praesentium. Doloremque aspernatur vel ipsum eveniet. Modi rerum amet pariatur dolorem! Sint ab distinctio corporis facere sunt, repellendus, nemo beatae, assumenda quae sit maxime officiis dolor voluptates eius hic dolorum reprehenderit debitis modi aspernatur eos alias laborum nostrum quo amet! Rerum, excepturi!', 1),
	(2, 'Я быстро учусь', 'Битрикс24 — это онлайн-сервис, в котором собраны все нужные инструменты для работы компании и управления бизнесом. Перенесите в единое пространство и автоматизируйте все рабочие коммуникации, продажи, проекты и бизнес-процессы.', 2),
	(3, 'Сказала бы, что даже очень быстро', 'CRM-система — базовый инструмент для автоматизации продаж и маркетинга. Ведите всю клиентскую базу в одном месте, подключив все каналы продаж: телефон, сайт, почту, соцсети и мессенджеры.', 2),
	(4, 'Начинаем работать с Битрикс!', 'Организуйте эффективную работу над задачами и проектами в удобном таск-трекере. Выбирайте привычную методику планирования для вашей команды или работайте по Скрам.', 3),
	(5, 'Добро пожаловать в мир PHP!', 'Вместо рутинного вывода HTML-кода командами языка (как это происходит, например, в Perl или C), скрипт PHP содержит HTML с встроенным кодом (в нашем случае, это вывод текста "Привет, я - скрипт PHP!").', 4),
	(6, 'Что такое PHP?', 'это распространённый язык программирования общего назначения с открытым исходным кодом. PHP специально сконструирован для веб-разработок и его код может внедряться непосредственно в HTML.', 5),
	(7, 'User Contributed Notes', 'There are no user contributed notes for this page.', 6),
	(8, 'Где и для чего используется PHP', 'Язык программирования PHP спроектировал датский программист Расмус Лердорф в 1995 году как инструмент для создания интерактивных и динамических веб-сайтов. Расшифровывается как «Hypertext Preprocessor» (гипертекстовый предобработчик). Сейчас PHP активно используют веб-разработчики для создания сайтов и веб-приложений. Это наименее конкурентный язык для работы. Его использует большинство сервисов, и, скорее всего, ситуация не изменится в ближайшие 10 лет. Поэтому специалисты очень востребованы. Основная область применения — разработка скриптов, которые работают на стороне сервера.', 7),
	(9, 'PHP.net', 'PHP.net — это официальный веб-сайт языка программирования PHP, который широко используется для создания веб-сайтов и веб-приложений. Этот веб-сайт предоставляет обширную документацию, ресурсы, и информацию о PHP, включая официальную документацию по языку, загрузки последних версий, новости, сообщество пользователей и разработчиков, а также форумы для обсуждения вопросов и проблем, связанных с этим языком программирования.', 8);

INSERT INTO comment(comment_id, message_id, comment_text, commenter_employee_id)
VALUES
	(1, 4, 'все понятно!', 1),
	(2, 5, 'OK', 2),
	(3, 6, 'GOT IT', 3);

INSERT INTO message_employee_link
VALUES
	(1, 1),
	(2, 2),
	(3, 2),
	(4, 3),
	(5, 4),
	(6, 5),
	(7, 6),
	(8, 7),
	(9, 8);

INSERT INTO message_comment_link
VALUES
	(4,1),
	(5, 2),
	(6, 3);

INSERT INTO comment_employee_link
VALUES
	(1, 1),
	(2, 2),
	(3, 3);

