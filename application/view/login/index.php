<!DOCTYPE html>
<html>
<head>
    <title>Login - Tickify</title>
    <meta charset="utf-8">
    <link rel="icon" href="data:;base64,=">
    <link rel="stylesheet" href="<?php echo Config::get('URL'); ?>css/output.css" />
</head>
<body class="bg-gray-50">
<div class="container">
    <h1>Login</h1>
    <div class="box">
        <?php $this->renderFeedbackMessages(); ?>

        <form action="<?php echo Config::get('URL'); ?>login/login" method="post">
            <label>Username or email</label>
            <input type="text" name="user_name" required />
            <label>Password</label>
            <input type="password" name="user_password" required />
            <label>
                <input type="checkbox" name="set_remember_me_cookie" />
                Remember me for 2 weeks
            </label>
            <input type="hidden" name="csrf_token" value="<?= Csrf::makeToken(); ?>" />
            <input type="submit" value="Log in" />
        </form>

        <div class="link-container">
            <a href="<?php echo Config::get('URL'); ?>register/">Register</a>
            <a href="<?php echo Config::get('URL'); ?>login/requestPasswordReset">Forgot Password?</a>
        </div>
    </div>
</div>

</body>
</html>