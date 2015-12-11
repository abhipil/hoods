<?php

class DB
{

    protected static $db = NULL;

    protected $db_name = 'hoods';
    protected $db_user = 'hoods';
    protected $db_pass = 'cs6083php';
    protected $db_host = 'localhost';

    //open a connection to the database. Make sure this is called
    //on every page that needs to use the database.
    public static function connect()
    {
        if (!isset(self::$db)) {
            try {
                $pdo_options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false);
                self::$db = new PDO("mysql:host=localhost;dbname=hoods;charset=utf8",
                    'hoods',
                    'cs6083php',
                    $pdo_options);
                //echo "connected";        
            } catch (PDOException $ex) {
                //echo $ex;        
                header('Location: /hoods/error/error.php');
            }
        }
        return self::$db;
    }

    public static function select($stmt, $params, $result)
    {
        $prepstmt = self::$db->prepare($stmt);
        $i = 1;
        foreach ($params as $param) {
            $prepstmt->bindParam($i, $param[0], $param[1]);
            $i++;
        }
        $prepstmt->execute();
        $prepstmt->setFetchMode(PDO::FETCH_ASSOC);
        $rows = $prepstmt->fetchAll();
        return $rows;
    }

    //http://www.mysqltutorial.org/php-calling-mysql-stored-procedures/
    public static function callproc($stmt, $in)
    {
        $prepstmt = self::$db->prepare($stmt);
        $i = 1;
        foreach ($in as $param) {
            $prepstmt->bindParam($i, $param[0], $param[1]);
            $i++;
        }
        $prepstmt->execute();
    }

    public static function insert($stmt, $params, $result)
    {

        try {
            $prepstmt = self::$db->prepare($stmt);
            $i = 1;
            while ($i <= count($params)) {
                $prepstmt->bindParam($i, $params[$i - 1]);
                $i = $i + 1;
            }
            $prepstmt->execute();
        } catch (PDOException $ex) {
            //print_r($ex);
            return -1;
        }
        return 0;
    }
}

?>