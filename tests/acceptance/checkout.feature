#language: ru

Функционал: авторизация на главной

  @11111 @remneva-mm

  Сценарий: авторизация
    Дано пользователь находится на Главной странице
    И нажимает на кнопку "Вход в систему"
    Тогда открывается модальное окно "Вход в систему"
    И пользователь заполняет поле "//input[@id='f_login']" значением "fabrikant"
    И пользователь заполняет поле "//input[@id='f_password']" значением "123456"
    И нажимает на кнопку "//button[@id='signinButton']"
    И пользователь делает запрос в базу данных "Select * from tasks"
