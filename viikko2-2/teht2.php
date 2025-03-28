<?php require_once 'inc/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') :
    if (isset($_POST['remember'])) :
        setcookie('username', $_POST['username']);
    else:
        setcookie('username', '', time() - 3600);
    endif;
    header('Location: ' . $_SERVER['PHP_SELF']);
endif;

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label>
        Username
        <?php
        $value = '';
        if (isset($_COOKIE['username'])) :
            $value = "value=$_COOKIE[username]";
        endif;
        ?>
        <input type="text" name="username" <?php echo $value ?>>
    </label>
    <label>
        Remember me
        <?php
        $checked = '';
        if (isset($_COOKIE['username'])) :
            $checked = "checked";
        endif;
        ?>
        <input type="checkbox" name="remember" <?php echo $checked; ?>
    </label>
    <button type="submit">Submit</button>
</form>

<?php require_once 'inc/footer.php'; ?>
