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

        public function search($term, $subject) {
            $db = $this -> pdo;
            $sql = "SELECT * from posts where title like ? and subjects = ?";
            $prepare = $db -> prepare($sql);
            $prepare -> execute(["%$term%", $subject]);
            $count = $prepare -> rowCount();
            if($count != 0)  {
                $data = $prepare -> fetchAll();
                return $data;
            }
            return null;

        }

        public function create($title, $description, $subject, $teacher, $URL, $class) {
            try {
                $db = $this -> pdo;
                $prepare = $db -> prepare("INSERT INTO posts (id, title, description, subjects, teacher, url, class) values (default,?,?,?,?,?,?)");
                $args = [$title, $description, $subject, $teacher, $URL, $class];
                echo "executar a query";
                return $prepare -> execute($args);
            }
            catch(Exception $e) {
                echo $e;
            }
        }

    } 