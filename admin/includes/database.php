<?php

require_once("new_config.php");


//Database connection

class Database {


    public $connection; // we put it on public so that we will always have access to this connection even though we are on an other class

    function __construct(){  //construct call the method on each newly object created, it is suitable for any initialisation that the object may need before it is used

        $this->open_db_connection();

    }

    public function open_db_connection(){

        // $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if($this->connection->connect_errno){

            die("Database connection failed badly" . $this->connection->connect_errno);

        }


    }


    public function query($sql){
        
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result){
        if(!$result){
            die("Query Failed" . $this->connection->error);
        }


    }

    public function escape_string($string){
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }


    public function the_insert_db(){
        return $this->connection->insert_id;
    }


} // End of the Database class



    $database = new Database();

    



?>