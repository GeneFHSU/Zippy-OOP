<?php

//The /admin/util/valid_register.php file should now contain a class named ValidRegister.
//The functions: valid_username, valid_password, and passwords_match should now start with: private static function
//The function valid_registration should start with public static function
class ValidRegister
{
    private static function valid_username($username)
    {
        // Ternary Statement pg.245
        return (!$username || strlen($username) < 6) ? false : true;
    }

    private static function valid_password($password)
    {
        // See Chapter 15: How to Use Regular Expressions
        $pattern = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/';
        return preg_match($pattern, $password);
    }

    private static function passwords_match($password, $confirm_password)
    {
        // Will be true or false
        return $password === $confirm_password;
    }

    public static function valid_registration($username, $password, $confirm_password)
    {
        // Chapter 11 Arrays
        $errors = array();

        // username validation
        if (!self::valid_username($username)) {
            array_push($errors, "Username must be six characters or longer.");
        }
        //Also, remove the if statement that calls the username_exists() function. It should not be part of this class.
        //if (self::username_exists($username)) {
        //    array_push($errors, "The username you entered is already taken.");
        //}

        // password validation
        if (!self::valid_password($password)) {
            array_push($errors, "Your password must contain at least one number, one uppercase letter, one lowercase letter, and total 8 or more characters");
        }
        if (!self::passwords_match($password, $confirm_password)) {
            array_push($errors, "The passwords you entered did not match.");
        }

        return $errors;
    }
}