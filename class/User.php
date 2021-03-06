<?php
    class User {
        private $pdo;

        public function __construct() {
            $this -> pdo = new PDO(DBCON, DBUSER, DBPASS);
        }

        public function login($email, $password) {
            $db = $this -> pdo;
            $prepare = $db -> prepare("SELECT * FROM users where email=?");
            $args = [$email];
            $prepare -> execute($args);
            $data = $prepare -> fetch();
            $compare = hash_equals(crypt($password, '$2a$07$usesomesillystringforsalt$'), $data['password']);
            return $compare;
        }
    }