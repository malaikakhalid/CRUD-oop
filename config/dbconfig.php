<?php 
    session_start();
    require_once('./config/operations.php');

    class dbconfig
    {
        public  $connection;

        public function __construct()
        {
            $this->db_connect();
        }
       
        public function db_connect()
        {
            $this->connection = mysqli_connect('localhost','root','','crud');
            if(mysqli_connect_error())
            {
                die(" Connect Failed ");
            }
        }

       
    }
?>