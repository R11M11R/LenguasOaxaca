<?php
class Database
{
    private static $HOST='localhost';
    private static $DATABASE='lenguas';
    private static $CHARSET='utf8';
    private static $USER='root';
    private static $PASSWORD='';
    
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host='.self::$HOST.';dbname='.self::$DATABASE.';charset='.self::$CHARSET, self::$USER, self::$PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}