<?php
session_start();
require_once __DIR__ . '/inc/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'):
    if (isset($_POST['remember'])):
        $_SESSION['username'] = $_POST['username'];
    else:
        unset($_SESSION['username']);
    endif;
    header('Location: ' . $_SERVER['PHP_SELF']);
endif;
?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>
            Username
            <?php
            $value = '';
            if (isset($_SESSION['username'])):
                $value = "value=$_SESSION[username]";
            endif;
            ?>
            <input type="text" name="username" placeholder="Username" <?php echo $value; ?>>
        </label>
        <label>
            Remember me
            <?php
            $checked = '';
            if (isset($_SESSION['username'])):
                $checked = 'checked';
            endif;
            ?>
            <input type="checkbox" name="remember" <?php echo $checked; ?>>
        </label>
        <button type="submit">Submit</button>
    </form>


<?php
require_once __DIR__ . '/inc/footer.php';