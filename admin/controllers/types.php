<?php
    switch($action) {
        case 'add_type':
            TypeDB::add_type($type_name);
            header("Location: .?action=list_types");
            break;
        case 'delete_type':
            if ($type_id) {
                try {
                    TypeDB::delete_type($type_id);
                } catch (PDOException $e) {
                    $error = "You cannot delete a type if vehicles are assigned to the type ID.";
                    include('view/error.php');
                    exit();
                }
            }
            header("Location: .?action=list_types");
            break;
        case 'list_types':
            include('view/type_list.php');
    }