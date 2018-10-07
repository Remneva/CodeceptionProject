#language: ru

Функционал: Авторизация на главной

  @11111 @remneva-mm

  Сценарий: авторизация

    Дано пользователь находится на странице "Главная страница"
    * нажимает на кнопку "Вход в систему"
    * открывается модальное окно "Вход в систему"
    * пользователь заполняет поле "Поле ввода Логин" значением "fabrikant"
    * пользователь заполняет поле "Поле ввода Пароль" значением "Qqqq111!"
    * нажимает на кнопку "Войти"
    * сохраняется сессия
    * восстановлена сессия

    Тогда пользователь перешел на страницу "Личный кабинет"
    * на странице присутствует "кнопка Создать процедуру"
    * на странице присутствует "кнопка Найти"
    * на странице присутствует "кнопка Выбрать тариф"
    * на странице присутствует "иконка Запросы по процедурам"
    * нажимает на кнопку "кнопка Создать процедуру"

    Тогда пользователь находится на странице "Форма создания Процедуры"
    * пользователь заполняет поле "Дата завершения приема заявок" текущей датой плюс "1"
    * пользователь заполняет поле "Дата подведения итогов процедуры" текущей датой плюс "3"
    * нажимает на кнопку "Сохранить"

    Тогда пользователь перешел на страницу "Список лотов"
    * на странице присутствует "Добавить лот"
    * на странице присутствует "Загрузить документацию"
    * нажимает на кнопку "Добавить лот"

    Тогда пользователь перешел на страницу "Создание лота"
    И нажимает на кнопку "Сохранить"
    И пользователь перешел на страницу "Список лотов"
    И нажимает на кнопку "Опубликовать на ЭТП"
    Тогда на странице присутствует "Отказаться от проведения"


 #   И пользователь делает запрос в базу данных accreditations и проверяет значение "test" в колонке name
   # И пользователь выполняет запрос в базу данных accreditations "UPDATE accreditations SET 'name' = 'procrastinating' WHERE 'duration_count' = 5 and 'name' = 'test2')"
#
#    Пусть залогинились под пользователем "49260"
#    И подождали 1 секунду
#    Пусть нажали на элемент через css локатор "div#right-floating-menu a"
#    И нажали на элемент через css локатор "tr:nth-child(1) > td:nth-child(2) > div > a"
#    И подождали 1 секунду
#  Сценарий: 2.2 заполнить заявку и отправить
#    Пусть нажали на элемент через css локатор "tr:nth-child(2) > td:nth-child(3) > div:nth-child(1) > a"
#    Пусть нажали на элемент через css локатор "div.form-group.form-group-element-lot_price > div > div.price-box > div.price-no-nds-box > div > label > input[type=checkbox]:nth-child(2)"
#    Пусть поле через css локатор "form > div > div.form-striped > div.form-group.form-group-element-lot_price > div > div.price-box > div.price-without-nds-box > div > input" заполнено значением "33"
#    Пусть поле через css локатор "form > div > div.form-striped > div.form-group.form-group-element-lot_quantity > div > div.quantity-quantity.row > div > div > input" заполнено значением "1"
#    Пусть поле через css локатор "form > div > div.form-striped > div.form-group.form-group-element-lot_quantity > div > div.quantity-units.row > div:nth-child(3) > input" заполнено значением "шт"
#    Пусть нажали на элемент через css локатор "form > div > div.form-striped > div.form-group.form-group-element-lot_price_per_unit > div > div.price-box > div.price-no-nds-box > div > label > input[type=checkbox]:nth-child(2)"
#    Пусть поле через css локатор "form > div > div.form-striped > div.form-group.form-group-element-lot_price_per_unit > div > div.price-box > div.price-without-nds-box > div > input" заполнено значением "33"
#    Пусть поле через css локатор "form > div > div.form-striped > div.form-group.form-group-element-1_lot_textarea5460598c6c3b3 > div > textarea" заполнено значением "у"
#    Пусть поле через css локатор "form > div > div.form-striped > div.form-group.form-group-element-1_lot_textarea546059513915d > div > textarea" заполнено значением "1"
#    Пусть нажали на элемент через css локатор "form > div > div.form-buttons > button"
#    И подождали 1 секунду
#    Тогда на странице должен быть текст "Отправить заявку"
#    И сохранили url в кеш "proposal_page"