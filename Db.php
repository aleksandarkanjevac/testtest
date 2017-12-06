<?php
class Db 
{

    private static $conn;

    public static function getConn() 
    {

        if (static::$conn === null) {
            static::$conn = new \PDO('mysql:host=localhost;dbname=vezba', 'root', '');
            static::$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // always disable emulated prepared statement when using the MySQL driver
            static::$conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }

        return static::$conn;
    }
}