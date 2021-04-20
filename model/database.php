<?php

    //based on p439
    class Database{
        private static $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
        private static $username = 'root';
        private static $db;

        private static $url;//Heroku

        private function __construct(){
            self::$url = getenv('JAWSDB_URL');
        }

        public static function getDB(){
            if(!isset(self::$db)){

                //Heorku
                if(!empty(getenv('JAWSDB_URL'))){
                    echo "HERE";
                    try {
                        $dbparts = parse_url(self::$url);

                        $hostname = $dbparts['host'];
                        echo "host";
                        self::$username = $dbparts['user'];
                        echo "user";
                        $password = $dbparts['pass'];
                        echo "pass";
                        $database = ltrim($dbparts['path'],'/');
                        echo "db";
                        self::$db = new PDO("mysql:host=$hostname;dbname=$database", self::$username, $password);
                        echo "db";
                        // set the PDO error mode to exception
                        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        echo "er";
                    } catch (PDOException $e) {
                        echo "ERROR" . $e->getMessage();
                        $error = "Database Error: ";
                        $error .= $e->getMessage();
                        include('../view/error.php');
                        exit();
                    }
                }
                else {
                    echo "fHERE";
                    try {
                        self::$db = new PDO(self::$dsn,
                            self::$username);
                        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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