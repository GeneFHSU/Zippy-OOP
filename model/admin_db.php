<?php

class AdminDB
{
    public static function add_admin($username, $password)
    {
        $db = Database::getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO administrators (username, password) VALUES (:username, :password)';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $hash);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function is_valid_admin_login($username, $password)
    {
        $db = Database::getDB();
        $query = 'SELECT password FROM administrators WHERE username = :username';
        $statement = $db->prepare($query);
        $statement->bindValue(':username', $username);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        $hash = (!empty($row['password'])) ? $row['password'] : NULL;
        return password_verify($password, $hash);
    }

    public static function username_exists($username)
    {
        $db = Database::getDB();
        // see if the username already exists
        $query = "SELECT COUNT(*) FROM administrators WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindParam(':username', $username);
        $statement->execute();
        // fetchColumn() returns the number of rows from the SELECT COUNT(*) query above. 
        // 0 is falsy. Our if statement below checks IF true.
        $result = $statement->fetchColumn();
        return $result;
    }
}