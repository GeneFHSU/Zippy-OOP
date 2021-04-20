<?php

class VehicleDB
{


    public static function get_vehicles_by_class($class_id, $sort)
    {
        $db = Database::getDB();
        if ($sort == 'year') {
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }

        $query = 'SELECT V.ID, V.year, M.Make, V.model, V.price, T.Type, C.Class 
        FROM vehicles V 
        LEFT JOIN makes M ON V.make_id = M.ID 
        LEFT JOIN classes C ON V.class_id = C.ID 
        LEFT JOIN types T ON V.type_id = T.ID 
        WHERE V.class_id = :class_id 
        ORDER BY ' . $orderby . ' DESC';

        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_type($type_id, $sort)
    {
        $db = Database::getDB();
        if ($sort == 'year') {
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }

        $query = 'SELECT V.ID, V.year, M.Make, V.model, V.price, T.Type, C.Class 
        FROM vehicles V 
        LEFT JOIN makes M ON V.make_id = M.ID 
        LEFT JOIN classes C ON V.class_id = C.ID 
        LEFT JOIN types T ON V.type_id = T.ID  
        WHERE V.type_id = :type_id 
        ORDER BY ' . $orderby . ' DESC';

        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_vehicles_by_make($make_id, $sort)
    {
        $db = Database::getDB();
        if ($sort == 'year') {
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }

        $query = 'SELECT V.ID, V.year, M.Make, V.model, V.price, T.Type, C.Class 
        FROM vehicles V 
        LEFT JOIN makes M ON V.make_id = M.ID 
        LEFT JOIN classes C ON V.class_id = C.ID 
        LEFT JOIN types T ON V.type_id = T.ID  
        WHERE V.make_id = :make_id 
        ORDER BY ' . $orderby . ' DESC';

        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_all_vehicles($sort)
    {
        $db = Database::getDB();
        if ($sort == 'year') {
            $orderby = 'V.year';
        } else {
            $orderby = 'V.price';
        }
        $query = 'SELECT V.ID, V.year, M.Make, V.model, V.price, T.Type, C.Class 
            FROM vehicles V 
            LEFT JOIN makes M ON V.make_id = M.ID 
            LEFT JOIN classes C ON V.class_id = C.ID 
            LEFT JOIN types T ON V.type_id = T.ID  
            ORDER BY ' . $orderby . ' DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $vehicles = $statement->fetchAll();
        $statement->closeCursor();
        return $vehicles;
    }

    public static function get_vehicle($vehicle_id)
    {
        $db = Database::getDB();
        $query = 'SELECT * FROM vehicles WHERE ID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $vehicle = $statement->fetch();
        $statement->closeCursor();
        return $vehicle;
    }

    public static function delete_vehicle($vehicle_id)
    {
        $db = Database::getDB();
        $query = 'DELETE FROM vehicles WHERE ID = :vehicle_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':vehicle_id', $vehicle_id);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_vehicle($make_id, $type_id, $class_id, $year, $model, $price)
    {
        $db = Database::getDB();
        $query = 'INSERT INTO vehicles (year, make_id, model, price, type_id, class_id)
              VALUES
                 (:year, :make_id, :model, :price, :type_id, :class_id)';
        $statement = $db->prepare($query);
        $statement->bindValue(':year', $year);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':model', $model);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
        $statement->execute();
        $statement->closeCursor();
    }
}