<?php
    $lifetime = 60 * 60 * 24 * 7; //one week
    session_set_cookie_params($lifetime, '/');
    session_start();

    // Model
    require('../model/database.php');
    require('../model/vehicle_db.php');
    require('../model/type_db.php');
    require('../model/class_db.php');
    require('../model/make_db.php');
    require('../model/admin_db.php');

    // Get required data from Model
    $makes = MakeDB::get_makes();
    $types = TypeDB::get_types();
    $classes = ClassDB::get_classes();

    // Get Parameter data sent to Controller 
    $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $confirm_password = trim(filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING));

    $make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);
    $type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);
    $class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);
    
    $sort = filter_input(INPUT_GET, 'sort', FILTER_SANITIZE_STRING);
    if (!$sort) $sort = 'price';

    $vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
    $make_name = filter_input(INPUT_POST, 'make_name', FILTER_SANITIZE_STRING);
    $type_name = filter_input(INPUT_POST, 'type_name', FILTER_SANITIZE_STRING);
    $class_name = filter_input(INPUT_POST, 'class_name', FILTER_SANITIZE_STRING);

    $year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
    $model = filter_input(INPUT_POST, 'model', FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?: filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ?: 'list_vehicles';

    // Router - take action based on $action parameter received
    if ($action === 'login' || 
        $action === 'show_login' || 
        $action === 'register' ||
        $action === 'show_register' || 
        $action === 'logout') include('controllers/admin.php');

    if ($action === 'add_make' ||
        $action === 'delete_make' ||
        $action === 'list_makes') include('controllers/makes.php');

    if ($action === 'add_type' ||
        $action === 'delete_type' ||
        $action === 'list_types') include('controllers/types.php');

    if ($action === 'add_class' ||
        $action === 'delete_class' ||
        $action === 'list_classes') include('controllers/classes.php');

    if ($action === 'show_add_form' || 
        $action === 'add_vehicle' ||
        $action === 'delete_vehicle' ||
        $action === 'list_vehicles') include('controllers/vehicles.php');