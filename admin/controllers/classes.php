<?php 
    switch($action) {
        case 'add_class':
            ClassDB::add_class($class_name);
            header("Location: .?action=list_classes");
            break;
        case 'delete_class':
            if ($class_id) {
                try {
                    ClassDB::delete_class($class_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a class if vehicles are assigned to the class ID.";
                    include('view/error.php');
                    exit();
                }
            }
            header("Location: .?action=list_classes");
            break;
        case 'list_classes':
            include('view/class_list.php');
    }
    