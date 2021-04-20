<?php 
    switch($action) {
        case 'logout':
            $_SESSION = array(); 
            session_destroy();
            $login_message = "You have been logged out.";
            include('view/login.php');
            break;

        case 'register':
            // Including Utility Functions for Registration
            include('util/valid_register.php');
            $errors = ValidRegister::valid_registration($username, $password, $confirm_password);

            //Put the if statement that calls the username_exists() function in the /admin/controllers/admin.php file
            // inside the register action immediately after the valid_registration() function is called.
            if (self::username_exists($username)) {
                array_push($errors, "The username you entered is already taken.");
            }
            // errors exist or success
            if ($errors) {
                include('view/register.php');
            } else {
                // store new user id and password
                AdminDB::add_admin($username, $password);
                // allow user to view admin area
                $_SESSION['is_valid_admin'] = true;
                header("Location: .?action=list_vehicles");
            }
            break;

        case 'login':
            if (AdminDB::is_valid_admin_login($username, $password)) {
                $_SESSION['is_valid_admin'] = true;
                header("Location: .?action=list_vehicles");
            } else {
                $login_message = 'Incorrect Login / Login Required.';
                $login_message_style = 'color: red;';
                include('view/login.php');
            }
            break;
        case 'show_register':
            include('view/register.php');
            break;
        case 'show_login':
            include('view/login.php');
    }