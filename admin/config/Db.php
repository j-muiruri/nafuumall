<?php
/**
 * Database Class
 *
 * Connects to database
 *
 * @author John Muiruri <jontedev@gmail.com>
 */

class Database
{
    public function getConn()
    {
        $host = "localhost";
        $user = "test";
        $dbsecret = "";
        $db = "nafuumall";
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        try {
           return $pdo = new PDO($dsn, $user, $dbsecret, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
