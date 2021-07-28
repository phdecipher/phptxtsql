<?php

    class Queries {

        public function getData(): array {
            require "database/db.php";

            $sql = "SELECT * FROM students";

            $statement = $connection->prepare($sql);
            $statement->execute();

            $data = $statement->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }

        public function create($file) {
            require "database/db.php";
            
            $sql = file_get_contents($file);
            $statement = $connection->prepare($sql);
            $statement->execute();

            header("Location: /phptxtsql");
        }
    }


?>