<h2>Login</h2>

<form action="<?php base_url ?>?controller=Consumer&&action=postLogin" method="POST">
    <label for="email">Email</label>
    <input type="text" name="email" value="<?php $_SESSION['form_email'] ?>"/>
    <label for="email">Password</label>
    <input type="password" name="password" value="<?php $_SESSION['form_password'] ?>"/>
    <input type="submit" />
</form>
<?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'failed'): ?>
<strong>Incorrect data</strong>
<?php endif ?>
