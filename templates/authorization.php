<? if ($auth):?>
    Добро пожаловать, <?= $userName ?>, <a href="/user/logout">выход</a><br>
<? else:?>
    <form action="/user/login" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" name="send" value="Войти">
    </form>
<? endif; ?>