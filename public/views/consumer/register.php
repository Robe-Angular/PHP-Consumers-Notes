<h2> Register customer </h2>
<?php 
function clearSession(){
    $fields_form_array = ['form_name', 'form_lastName', 'form_email', 'form_password'];
    foreach($fields_form_array as $field){
        $_SESSION[$field]='';
    }
}
?>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
<strong>Consumer saved</strong>
<?php
clearSession();
?>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
<strong>Process saving consumer failed</strong>
<?php else: ?>
<?php 
clearSession();
?>
<?php endif; ?>
<?php Utils::deleteSession('register') ?>

<form action="<?php base_url ?>?controller=Consumer&&action=save" method="POST">

    <label for="name">
        Name
    </label>
    <input type="text" name="name" value="<?= $_SESSION['form_name'] ?>" required>
    <label for="lastName">
        Last Name
    </label>
    <input type="text" name="lastName" value="<?= $_SESSION['form_lastName'] ?>" required>
    <label for="email">
        Email
    </label>
    <input type="text" name="email" value="<?= $_SESSION['form_email'] ?>" required>
    <label for="password">
        Password
    </label>
    <input type="password" name="password" value="<?php $_SESSION['form_password'] ?>" required>
    <input type="submit" value="Save consumer">


</form> 