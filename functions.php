<?php

// Conexión con la BD

class Database {
    
    //Creamos cara parte del PDO inicialmente
    private static $dbName = 'dailytrends' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    
    //Creamos una conexion nula para evitar errores
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
    
    //Creamos la conexión a la BD
    public static function connect() {
       if ( null == self::$cont ) {     

            try {

              self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 

            } catch(PDOException $e) {

              die($e->getMessage()); 

            }
       }
        
       return self::$cont;
    }
    
    //Creamos la desconexión para cuando dejemos de necesitar hacer consultas
    public static function disconnect() {
        self::$cont = null;
    }
}

?>