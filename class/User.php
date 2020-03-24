<?php
    require '../env/Consts.php';
    class User {
        $pdo;

        public __construct() {
            $this -> pdo = new PDO(DBCON, DBUSER, DBPASS);
        }

        public login() {
            
        }
    }