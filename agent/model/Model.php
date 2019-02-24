<?php
include_once "../config/config.php";

class Model
{
    public function getDBConnection() {
        try {
            $db = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $db;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getConnectionInstance() {
        $md = new Model();
        return $md->getDBConnection();
    }
}