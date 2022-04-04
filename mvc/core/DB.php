<?php
    class DB{
        public $con;
        public $servername = "localhost";
        public $username = "root";
        public $password = "";
        public $dbname = "project";

        function __construct()
        {
            $this->con = mysqli_connect($this->servername, $this->username, $this->password);
            mysqli_select_db($this->con, $this->dbname);
            mysqli_query($this->con, "set names 'utf8'");
        }
    }
?>