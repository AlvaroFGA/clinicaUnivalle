<?php
class Database {
   private static $instance;
   private $connection;

   private function __construct() {
       $this->connection = new PDO("mysql:host=localhost;dbname=clinica_odontologica", "root", "");
   }

   public static function getInstance() {
       if (!self::$instance) {
           self::$instance = new self();
       }
       return self::$instance;
   }

   public function getConnection() {
       return $this->connection;
   }
}

?>