<?php
class TypeDB
{
    public static function get_types()
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM types ORDER BY ID';
        $statement = $db->prepare($query);
        $statement->execute();
        $types = $statement->fetchAll();
        $statement->closeCursor();
        return $types;
    }

    public static function get_type_name($type_id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM types WHERE ID = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $type = $statement->fetch();
        $statement->closeCursor();
        $type_name = $type['Type'];
        return $type_name;
    }

    public static function delete_type($type_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM types WHERE ID = :type_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_type($type_name)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO types (Type)
              VALUES
                 (:typeName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':typeName', $type_name);
        $statement->execute();
        $statement->closeCursor();
    }
}

