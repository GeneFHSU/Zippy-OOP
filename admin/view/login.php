<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Admin</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
</head>

<body>
    <main>
        <header>
            <h1>Zippy Admin</h1>
        </header>
        <section class="admin-login">
            <?php if (!empty($login_message)) { ?>
                <h2 style="<?= $login_message_style ?>">
                        <?= $login_message ?>
                </h2>
            <?php } else { ?>
                <h2>Please fill in your credentials to login.</h2>
            <?php } ?>
            <form action="." method="POST" class="admin_login_form">
                <input type="hidden" name="action" value="login">
                
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" autofocus required>
                
                
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>
                
                
                    <input type="submit" class="button blue" value="Sign In">
                
            </form>
        </section>
    </main>
</body>
</html>