# 23-APP
многостраничный сайт для просмотра коллекции сообщений

## Entry point
скрипты с логикой используют функцию шаблонизатор для отрисовки содержимого
Точка входа находится в директории public, поэтому чтобы зайти с терминала PHPStorm нужно использовать команду:

php -S localhost:(номер хоста) -t public

## Folder Structure
* В директории views содержатся шаблоны всех необходимых страниц. Layout.php - Общий шаблон для всех страниц
* В директории public содержатся скрипты с логикой для отрисовки страниц, а так же все необходимые стили
* В директорию services вынесены функции для работы с данными
* В директории install содержатся файлы для создания и очистки БД со всеми необходимыми вводными
* В корне проекта находятся boot.php(подключение всех необходимых файлов), config.php(файл конфигурации), config.local.php(скрыт)

## Service dir
1. В файле config.php -> функция view() для работы с файлом конфигурации
2. В файле databese.php -> функция getDbConnection() для получения соединения с БД
3. В файле template-service.php ->
	- функция renderTemplate() для отрисовки содержимого
4. В файле movies-service.php ->
	- функция getMessageList() для получения списка сообщений из БД
5. В файле index.php -> подключение всех вышеупомянутых файлов директории service

## Инструкция по использованию
0. Для начала заходим в директорию install, файл install.sql и создаем все необходимые таблицы+добавляем в них данные(все прописано, нужно только запустить файл)
1. Далее заходим через точку входа в приложение. Я использую консольную команду PHPStorm (php -S localhost:8000 -t public).
2. Попадаем на главную страницу с полной коллекцией сообщений, а также aside(справа) для просмотра их укороченной версии(при добавблении сообщения начинется scroll)
3. Чтобы добавить сообщение, неодходимо нажать на кнопку в верхней части экрана для отображение формы создания сообщения. После нажатия на кнопку отправить, страница автоматически перезагружается с новым сообщением.
   ![Create screenshot](https://github.com/Gaus-code/23-app/blob/main/creating.png)
4. Чтобы редактировать сообщение, нужно нажать на него в блоке aaside и перейти на детальную страницу сообщение, где появится кнопка для редактирования:
   ![Edit screenshot](https://github.com/Gaus-code/23-app/blob/main/editing.png)
   Редактирование происходит автоматически, однако, нужно перезагрузить страницу вручную, чтобы увидеть отредактированное сообщение.
6. Т.к. приложение еще в работе и аутентифекации и входа на сайт нет, сообщения и комментарии будут отображаться от моего имени.
7. Фильтрация сообщений по времени публикации на данный момент находится в работе и пользоваться ею пока нельзя.
8. Комментарии, написанные пользователем попадают в базу данных, но их отображение на странице тоже пока находится в работе.
