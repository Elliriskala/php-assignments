<?php

global $DBH;
global $SITE_URL;
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../db/dbConnect.php';
?>

<section id="registerForm">
    <h1>Register</h1>
    <form action="<?php echo $SITE_URL . '/operations/insertUser.php'; ?>" method="post">
        <div class="form-control">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username"/>
        </div>
        <div class="form-control">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email"/>
        </div>
        <div class="form-control">
            <label for="password">Password:</label>
            <input type="text" name="password" id="password"/>
        </div>
        <button type="submit">Register</button>
    </form>
</section>