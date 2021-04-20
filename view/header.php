<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zippy Used Autos</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" />
</head>

<body>
<main>
    <header>
        <h1>Zippy Used Autos</h1>
        <div class="register">

            <?php if (!isset($_SESSION['userid']) && $action !== 'register') { ?>

                <a href=".?action=register">Register</a>

            <?php } else if (isset($_SESSION['userid']) && $action !== 'register' && $action !== 'logout') { 
                    $userid = $_SESSION['userid'];
            ?>

            <p>
                Welcome <?= $userid ?>! (<a href=".?action=logout">Sign Out</a>)
            </p>

            <?php } ?>
        </div>
    </header>