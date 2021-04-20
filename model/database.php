<?php

    //based on p439
    class Database{
        private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
        private static $username = 'root';
        private static $db;

        private static $url;//Heroku

        private function __construct(){
            $url = getenv('JAWSDB_URL');
        }

        public static function getDB(){
            if(!isset(self::$db)){

                //Heorku
                if(!empty(getenv('JAWSDB_URL'))){
                    try {
                        $dbparts = parse_url($url);

                        $hostname = $dbparts['host'];
                        $username = $dbparts['user'];
                        $password = $dbparts['pass'];
                        $database = ltrim($dbparts['path'],'/');
                        $db = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                        // set the PDO error mode to exception
                        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    } catch (PDOException $e) {
                        $error = "Database Error: ";
                        $error .= $e->getMessage();
                        include('../view/error.php');
                        exit();
                    }
                }
                else {
                    try {
                        self::$db = new PDO(self::$dsn,
                            self::$username);
                    } catch (PDOException $e) {
                        $error = "Database Error: ";
                        $error .= $e->getMessage();
                        include('../view/error.php');
                        exit();
                    }
                }



            }
            return self::$db;
        }

    }
?>