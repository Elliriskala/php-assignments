<?php

global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
?>

<section id="loginForm">
    <h1>Login</h1>
    <form action="<?php echo $SITE_URL . '/operations/login.php'; ?>" method="post">
        <div class="form-control">
            <label for="login_username">Username:</label>
            <input type="text" name="username" id="login_username"/>
        </div>
        <div class="form-control">
            <label for="login_password">Password:</label>
            <input type="text" name="password" id="login_password"/>
        </div>
        <Button type="submit">Login</Button>
    </form>
</section>