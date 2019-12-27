<? if ($auth):?>
    <p>Добро пожаловать, <?= $userName ?>  <a class="logout" href="/user/logout">выход</a></p>
<? else:?>
    <form action="/user/login" method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="pass" placeholder="Пароль">
        Save? <input type='checkbox' name='save'>
        <input type="submit" name="send" value="Войти">
    </form>
<? endif; ?>