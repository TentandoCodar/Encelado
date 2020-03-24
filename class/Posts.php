<?php 
    

    class Post {
        private $pdo;

        public function __construct() {
            $this -> pdo = new PDO(DBCON, DBUSER, DBPASS);
        }

        public function index() {
            $db = $this -> pdo;
            $prepare = $db -> prepare('SELECT * from posts');
            $prepare -> execute();
            $count = $prepare -> rowCount();
            if($count != 0)  {
                $data = $prepare -> fetchAll();
                return $data;
            }
            return null;
        }

    } 