<?php
require_once $_TEMPLATES['location'] . 'header.tpl.php';
?>
<h1>Login</h1>

<form method="post">
    <label for="login_username">Username</label>
    <input type="text" name="login_username" />
    
    <label for="login_password">Password</label>
    <input type="password" name="login_password" />
    
    <input type="submit" value="Login" />
</form>    
<?php
require_once $_TEMPLATES['location'] . 'footer.tpl.php';
?>