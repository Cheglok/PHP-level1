<? if (!$allow): ?>
    <form method="get">
        <p><input type="text" name="login" placeholder="login"/></p>
        <p><input type="password" name="password" placeholder="password"/></p>
        <p><input type="checkbox" name="remember"/>REMEMBER ME</p>
        <p><input type="submit" value="Войти"/></p>
    </form>
<? else: ?>
    Добро пожаловать <?= $login ?> <a href="basket.php?logout">Выход</a>
<? endif; ?><br><br><br>